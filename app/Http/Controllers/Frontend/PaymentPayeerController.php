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
        $m_shop =  '75722594';
        $m_orderid = mt_rand();
        $m_amount = number_format($request->purchase_sum, 2, '.', '');
        $m_curr = 'RUB';
        $m_desc = base64_encode('Пополнение баланса');
        $m_key = 'halyava';

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
                $PackageTxn = new PackageTxn();
                $PackageTxn->user_id = $user;
                $PackageTxn->package_id = $pkgid;
                $PackageTxn->payment_method = 'Payeer';
                $PackageTxn->payment_status = 0;
                $PackageTxn->save();

                DB::commit();
            } catch (\PDOException $e) {

                print $e->getMessage();
                DB::connection()->getPdo()->rollBack();
            }
        }
        return redirect()->to("https://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign");
    }

    //user payoff
    public function payoff(Request $request)
    {
        $godbarsum = $request->sum;
        $urgoldbar = Auth::user()->withdraw;
        if ($godbarsum > $urgoldbar) {
            toastError('The amount of gold bars exceeds your account balance You have ' . $urgoldbar . ' gold bars (for withdrawal)');
            return Redirect::back();
        }
    }
}
