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
        $m_shop =  '1608608742';
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

        $arParams = array(
            'reference' => array(
                'userid' => $user,
            ),
        );

        // Encrypting additional parameters using AES-256-CBC (for >= PHP 7)
        $iv = substr(hash('sha256',  $m_key), 0, 16);
        $m_params = urlencode(base64_encode(openssl_encrypt(
            json_encode($arParams),
            'AES-256-CBC',
            $m_key,
            OPENSSL_RAW_DATA,
            $iv
        )));

        // Adding parameters to the signature-formation array
        $arHash[] = $m_params;

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
                $PackageTxn->uid = $m_orderid;
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

        $arGetParams = array(
            'm_shop' => $m_shop,
            'm_orderid' => $m_orderid,
            'm_amount' => $m_amount,
            'm_curr' => $m_curr,
            'm_desc' => $m_desc,
            'm_sign' => $sign,
            'm_params' => $m_params,
            //'m_cipher_method' => 'AES-256-CBC-IV',
            //'form[ps]' => '2609',
            //'form[curr[2609]]' => 'USD',
        );

        return redirect()->to("https://payeer.com/merchant/?" . http_build_query($arGetParams) . "&lang=en");
    }

    //user payoff
    public function payoff(Request $request)
    {
        $godbarsum = $request->sum;
        $urgoldbar = Auth::user()->withdraw;
        if ($godbarsum > $urgoldbar) {
            toastError('The amount of gold bars exceeds your account balance You have ' . $urgoldbar . ' gold bars (for withdrawal)');
            return Redirect::back();
        } else {
            toastSuccess('Withdraw code working');
            return Redirect::back();
        }
    }
}
