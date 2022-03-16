<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PackageTxn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

/**
 * Class PaymentPayeerController
 * @package ZaLaravel\LaravelPayeer\Controllers
 */
class PaymentPayeerController extends Controller
{
    public function createPayment(Request $request)
    {
        $pkgid = $request->package_id;
        $user = Auth::user();
        $user = $user->id;
        $m_shop =  '1614478614';
        $m_orderid = mt_rand();
        $m_amount = number_format($request->purchase_sum, 2, '.', '');
        $m_curr = 'USD';
        $m_desc = 'VGVzdCBwYXltZW50IOKEljEyMzQ1';
        $m_key = '123';

        $arHash = array(
            $m_shop,
            $m_orderid,
            $m_amount,
            $m_curr,
            $m_desc,
            $m_key
        );
        $sign = strtoupper(hash('sha256', implode(':', $arHash)));

        if ($m_amount != 0) {
            try {
                DB::beginTransaction();
                $payment = new Payment();
                $payment->uid = $m_orderid;
                $payment->user_id = $user;
                $payment->balance = $m_amount;
                $payment->description = base64_decode($m_desc);
                $payment->operation = '+';
                $payment->save();
                //
                if($pkgid)
                {
                    $PackageTxn = new PackageTxn();
                    $PackageTxn->user_id = $user;
                    $PackageTxn->uid = $m_orderid;
                    $PackageTxn->package_id = $pkgid;
                    $PackageTxn->payment_method = 'Payeer';
                    $PackageTxn->payment_status = 0;
                    $PackageTxn->save();
                }

                DB::commit();
            } catch (\PDOException $e) {

                print $e->getMessage();
                DB::connection()->getPdo()->rollBack();
            }
        }


        return redirect()->to("https://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign&lang=en");
    }

    //user payoff
    public function payoff(Request $request)
    {
        $silverblocks = $request->silverblocks;
        $ursilverblocks = Auth::user()->withdraw;
        $crystal = Auth::user()->crystal;
        $amount = $request->amount;
        if ($silverblocks >  $ursilverblocks) {
            toastError('The amount of Silver block exceeds your account balance You have ' .  $silverblocks . ' Silver Blocks (for withdrawal)');
            return Redirect::back();
        } elseif ($crystal < $amount) {
            toastError('The amount of Silver block exceeds your account balance You have ' . $urgoldbar . ' Silver Blocks (for withdrawal)');
            return Redirect::back();
        } else {
            toastSuccess('Withdraw code working');
            return Redirect::back();
        }
    }
}
