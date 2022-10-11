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
use App\Models\Packages;
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
        $pkgqty=$request->pkgqty;
        $user = Auth::user();
        $user = $user->id;
        $m_shop = '1672659702';
        $m_orderid = mt_rand();
        $m_amount = number_format($request->purchase_sum, 2, '.', '');
        $m_curr = 'USD';
        $m_desc = base64_encode('comments');
        $m_key = '123';

        $arHash = array(
        $m_shop,
        $m_orderid,
        $m_amount,
        $m_curr,
        $m_desc
        );

        $arHash[] = $m_key;

        $sign = strtoupper(hash('sha256', implode(':',$arHash)));
        if($pkgid)
        {
            $packagedata=Packages::find($pkgid);
            $packamount=$packagedata->amount;
            $totalpkgamount=$packamount*$pkgqty;
            if($totalpkgamount!=$m_amount)
            {
                 toastError('Something heppening wrong your package amount with respect to quantity not matching with originol package price');
                return Redirect::back();
            }
        }
        if ($m_amount >= 1) {
            try {
                DB::beginTransaction();
                $payment = new Payment();
                $payment->uid = $m_orderid;
                $payment->user_id = $user;
                $payment->balance = $m_amount;
                $payment->description = base64_decode($m_desc);
                $payment->operation = '+';
                $payment->payment_method='P';
                $payment->currency= $m_curr;
                $payment->save();
                //
                if($pkgid)
                {
                    $PackageTxn = new PackageTxn();
                    $PackageTxn->user_id = $user;
                    $PackageTxn->uid = $m_orderid;
                    $PackageTxn->package_id = $pkgid;
                    $PackageTxn->qty=$pkgqty;
                    $PackageTxn->payment_method = 'Payeer';
                    $PackageTxn->payment_status = 0;
                    $PackageTxn->save();
                }

                DB::commit();
            } catch (\PDOException $e) {

                print $e->getMessage();
                DB::connection()->getPdo()->rollBack();
            }
             return redirect()->to("https://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign&lang=en");
       }
        else{
            toastError('Amount is less then $1');
            return Redirect::back();
        }
    }
    // public function createPayment(Request $request)
    // {
    //     $pkgid = $request->package_id;
    //     $pkgqty=$request->pkgqty;
    //     $user = Auth::user();
    //     $user = $user->id;
    //     $m_shop =  '1672659702';
    //     $m_orderid = mt_rand();
    //     $m_amount = number_format($request->purchase_sum, 2, '.', '');
    //     $m_curr = 'USD';
    //     $m_desc = 'hello';
    //     $m_key = 'obaid123';
    //     $m_amount=(float)$m_amount;


    //     $arHash = array(
    //         $m_shop,
    //         $m_orderid,
    //         $m_amount,
    //         $m_curr,
    //         $m_desc,
    //         $m_key='obaid123',
           
    //     );

    //     $sign = strtoupper(hash('sha256', implode(':', $arHash)));
    //     if($pkgid)
    //     {
    //         $packagedata=Packages::find($pkgid);
    //         $packamount=$packagedata->amount;
    //         $totalpkgamount=$packamount*$pkgqty;
    //         if($totalpkgamount!=$m_amount)
    //         {
    //              toastError('Something heppening wrong your package amount with respect to quantity not matching with originol package price');
    //             return Redirect::back();
    //         }
    //     }
    //     if ($m_amount >= 1) {
    //         try {
    //             DB::beginTransaction();
    //             $payment = new Payment();
    //             $payment->uid = $m_orderid;
    //             $payment->user_id = $user;
    //             $payment->balance = $m_amount;
    //             $payment->description = base64_decode($m_desc);
    //             $payment->operation = '+';
    //             $payment->payment_method='P';
    //             $payment->currency= $m_curr;
    //             $payment->save();
    //             //
    //             if($pkgid)
    //             {
    //                 $PackageTxn = new PackageTxn();
    //                 $PackageTxn->user_id = $user;
    //                 $PackageTxn->uid = $m_orderid;
    //                 $PackageTxn->package_id = $pkgid;
    //                 $PackageTxn->qty=$pkgqty;
    //                 $PackageTxn->payment_method = 'Payeer';
    //                 $PackageTxn->payment_status = 0;
    //                 $PackageTxn->save();
    //             }

    //             DB::commit();
    //         } catch (\PDOException $e) {

    //             print $e->getMessage();
    //             DB::connection()->getPdo()->rollBack();
    //         }
    //         echo "https://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign&lang=en";exit;

    //         return redirect()->to("https://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign&lang=en");
    //     }
    //     else{
    //         toastError('Amount is less then $1');
    //         return Redirect::back();
    //     }



        
    // }

    //user payoff
    public function payoff(Request $request)
    {   
        $request->validate([
            'wallet' => ['required'],
            'amount' => ['required'],
            'silverblocks'=>['required'],
            'g-recaptcha-response' => 'required|captcha',
        ],[
            'wallet' => 'Please Enter Wallet',
        ]);

        $fee = 0.95;
        $silverblocks = $request->silverblocks;
        $ursilverblocks = Auth::user()->withdraw;
        $crystal = Auth::user()->crystal;
        $amount = $request->amount;
        $serebro_usd_1 = $silverblocks / 7387;
        $amount=bcdiv($serebro_usd_1, 1, 2);
        $amount=$amount*$fee;
        $amount=bcdiv($amount, 1, 2);
      
        if ($silverblocks > $ursilverblocks) {
            toastError('The amount of Silver block exceeds your account balance You have ' .  $silverblocks . ' Silver Blocks (for withdrawal)');
            return Redirect::back();
        }
         if ($amount > $crystal) {
            toastError('The amount of Silver block exceeds your account balance You have ' .  $silverblocks . ' Silver Blocks (for withdrawal)');
            return Redirect::back();
        }
        if($amount < 0.03){
               toastError('Minuminum 0.04 dollar can be withdrawl');
                return Redirect::back();
            }
         //payeer payout code here
        $payeer= new PayeerClassController('P1066080920','1721205312','j5I09GDP@5264');
        if(!$payeer->isAuth()){
             toastError(json_encode($payeer->getErrors()));
             return Redirect::back();
        }
        $initOutput = $payeer->initOutput(array(
                'ps' => '1136053',
                'curIn' => 'USD',
                'sumOut' => $amount,
                'curOut' => 'USD',
                'param_ACCOUNT_NUMBER' =>$request->wallet,
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
                'wallet'=>$request->wallet,
                'sum'=>$amount,
                'status'=>1,
                'currency'=>'USD',
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
