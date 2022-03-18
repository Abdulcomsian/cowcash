<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\FaucetController;
use App\Models\Payment;
use App\Models\PackageTxn;
use DB;
use Auth;

class FaucetPayController extends FaucetController
{
    
    public function __construct() {
        
    }

    //this is without merchant api integration which is not for my working
    public function sendpay(Request $request)
    {
         try 
         {
            $pkgid = $request->package_id;
            $user = Auth::user();
            $user = $user->id;
            $m_amount = number_format($request->purchase_sum, 2, '.', '');
            $m_orderid = mt_rand();
            if ($m_amount != 0) {
                 $obj=new FaucetController('efa543728afab33a3ebe8e802d56206b2ba7c74f','BTC','');
                 $res=$obj->send('obijanikust@gmail.com',$m_amount,'',false);
                 $result=json_decode($res['response']);
                 if($result->status==200)
                    {
                        $payment = new Payment();
                        $payment->uid = $m_orderid;
                        $payment->user_id = $user;
                        $payment->balance = $m_amount;
                        $payment->description ='test payment';
                        $payment->operation = '+';
                        $payment->save();
                        //
                        $PackageTxn = new PackageTxn();
                        $PackageTxn->user_id = $user;
                        $PackageTxn->uid = $m_orderid;
                        $PackageTxn->package_id = $pkgid;
                        $PackageTxn->payment_method = 'Faucet';
                        $PackageTxn->payment_status = 0;
                        $PackageTxn->save();
                        toastSuccess($result->message);
                        return back();
                    }
                    else{
                        toastError($result->message);
                        return back();
                    }
            }
        } catch (\PDOException $e) {
            toastError('something went wrong');
           return back();  
        }

       
    }

    //this si merchant side payment call back 
    public function callback(Request $request)
    {
        $token = $_POST['token'];
        $payment_info = file_get_contents("https://faucetpay.io/merchant/get-payment/" . $token);
        $payment_info = json_decode($payment_info, true);
        $token_status = $payment_info['valid'];
        $merchant_username = $payment_info['merchant_username'];
        $amount1 = $payment_info['amount1'];
        $currency1 = $payment_info['currency1'];
        $amount2 = $payment_info['amount2'];
        $currency2 = $payment_info['currency2'];
        $custom = $payment_info['custom'];

        $my_username = "obijani";
        $m_orderid = mt_rand();
        if ($my_username == $merchant_username && $token_status == true) {

            $payment = new Payment();
            $payment->uid = $m_orderid;
            $payment->user_id = Auth::user()->id;
            $payment->balance = $amount1;
            $payment->description ='test payment';
            $payment->payment_method='F';
            $payment->payment_status=1;
            $payment->operation = '+';
            $payment->save();
            //
            $PackageTxn = new PackageTxn();
            $PackageTxn->user_id = Auth::user()->id;
            $PackageTxn->uid = $m_orderid;
            $PackageTxn->package_id = $custom;
            $PackageTxn->payment_method = 'Faucet';
            $PackageTxn->payment_status = 1;
            $PackageTxn->save();

            //giv crsystal and silver coins to user

            if($custom)
            {
                $Packagedata = Package::where('id',$custom)->first();
            //covert 40 percent of coinst to crystal 
            $crystals = $Packagedata->amount / 100 * 40;
            $addBalanceToUser = User::find(Auth::user()->id);
            $addBalanceToUser->silver_coins += $Packagedata->coins_to_get;
            $addBalanceToUser->crystal += $crystals;
            $addBalanceToUser->update();
            }
            else{
                
                 //covert 40 percent of coinst to crystal 
                $crystals = $m_amount / 100 * 40;
                $addBalanceToUser = User::find(Auth::user()->id);
                $addBalanceToUser->silver_coins += $amount1*8244 ;
                $addBalanceToUser->crystal += $crystals;
                $addBalanceToUser->update();
            }
            toastSuccess("Pyment Successfully");
            return back();
        } else {
            toastSuccess("someone is trying to hack you");
            return back();
        }
    }

    public function success(Request $request)
    {

    }
}
