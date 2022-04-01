<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PackageTxn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Frontend\PayeerClassController;
use App\Models\User;
use App\Models\PayOff;
use DB;
use Auth;

/**
 * Class PaymentPayeerController
 * @package ZaLaravel\LaravelPayeer\Controllers
 */
class PaymentPayeerController extends PayeerClassController
{
    public function __construct() {
        
    }
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
                $payment->payment_method='P';
                $payment->currency=Auth::user()->currency;
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
        $ursilverblocks = Auth::user()->withdraw;
        $crystal = Auth::user()->crystal;
        $amount = $request->amount;
        $silverblocks = $request->silverblocks;
        $dollars= 1/ 7834 * $silverblocks;
        $amount =number_format((float)$dollars, 2, '.', '');
        if ($silverblocks >  $ursilverblocks && $crystal < $amount) {
            toastError('The amount of Silver block exceeds your account balance You have ' .  $silverblocks . ' Silver Blocks (for withdrawal)');
            return Redirect::back();
        } 
         //payeer payout code here
        $payeer= new PayeerClassController('P1066080920','1624625266','kkxFtKr1Zh2HdMsD');
        if(!$payeer->isAuth()){
             toastError(json_encode($payeer->getErrors()));
             return Redirect::back();
        }
        $initOutput = $payeer->initOutput(array(
                'ps' => '1136053',
                'curIn' => 'USD',
                'sumOut' => $amount,
                'curOut' => 'USD',
                'param_ACCOUNT_NUMBER' =>$request->pp,
            ));
        if(!$initOutput)
        {
            toastError(json_encode($payeer->getErrors()));
            return Redirect::back();
        }
         $historyId = $payeer->output();
        if ($historyId > 0)
        {
            User::find(Auth::user()->id)->update([
             'withdraw'=> DB::raw('withdraw -' .  $request->silverblocks. ''),
             'crystal'=> DB::raw('crystal -' .  $amount. ''),
            ]);
            //save data in payoff table
            PayOff::create([
                'user_id'=>Auth::user()->id,
                'gateway'=>'P',
                'wallet'=>$request->pp,
                'sum'=>$amount,
                'status'=>1,
            ]);
            toastSuccess('Payout is successful');
            return Redirect::back();
        }
        else
        {
            toastError(json_encode($payeer->getErrors()));
            return Redirect::back();
        }
    }
}
