<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\FaucetController;
use App\Models\Payment;
use App\Models\PackageTxn;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;

class FaucetPayController extends FaucetController
{
    
    public function __construct() {
        
    }

    //marchant can send pay to faucet user (Payout withdrawl)
    public function sendpay(Request $request)
    {
         try 
         {
            $silverblocks = $request->silverblocks;
            $ursilverblocks = Auth::user()->withdraw;
            $crystal = Auth::user()->crystal;
            $amount = $request->amount;
            if ($silverblocks >  $ursilverblocks) {
                toastError('The amount of Silver block exceeds your account balance You have ' .  $silverblocks . ' Silver Blocks (for withdrawal)');
                return Redirect::back();
            } elseif ($crystal < $amount) {
                toastError('The amount of Silver block exceeds your account balance You have  Silver Blocks (for withdrawal)');
                return Redirect::back();
            } elseif($amount<5){
                toastError('Minuminum 5 dolar can be withdrawl');
                return Redirect::back();
            }else {
                 //Faucet payout code here
                 $obj=new FaucetController('efa543728afab33a3ebe8e802d56206b2ba7c74f','BTC','');
                 $res=$obj->send('obijanikust@gmail.com',$amount,'',false);
                 $result=json_decode($res['response']);
                if($result->status==200)
                 {
                    User::find(Auth::user()->id)->update([
                         'withdraw'=> DB::raw('withdraw -' .  $request->silverblocks. ''),
                         'crystal'=> DB::raw('crystal -' .  $request->crystal. ''),
                        ]);
                    //save data in payoff table
                    PayOff::create([
                        'user_id'=>Auth::user()->id,
                        'gateway'=>'F',
                        'wallet'=>$request->pp,
                        'sum'=>$amount,
                        'status'=>1,
                    ]);
                    toastError('Payout is successful');
                    return Redirect::back();
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
            $Packagedata = Package::where('id',$custom)->first();
            $payment = new Payment();
            $payment->uid = $m_orderid;
            $payment->user_id = Auth::user()->id;
            $payment->balance = $amount1;
            $payment->description ='Purchase coins and crystals';
            $payment->payment_method='F';
            $payment->operation = '+';
            $payment->save();
            //
            $PackageTxn = new PackageTxn();
            $PackageTxn->user_id = Auth::user()->id;
            $PackageTxn->uid = $m_orderid;
            $PackageTxn->package_id = $custom;
            $PackageTxn->payment_method = 'Faucet';
           if($Packagedata)
            {
                 if($Packagedata->amount==$amount1)
                 {
                    $PackageTxn->payment_status = 1;
                    //covert 40 percent of coinst to crystal 
                    $crystals = $Packagedata->amount / 100 * 40;
                    $addBalanceToUser = User::find(Auth::user()->id);
                    $addBalanceToUser->silver_coins += $Packagedata->coins_to_get;
                    $addBalanceToUser->crystal += $crystals;
                    $addBalanceToUser->update();
                 }
                 else{
                    $PackageTxn->payment_status = 0;
                 }   
            }
            else{
                 $PackageTxn->payment_status = 1;
                 //covert 40 percent of coinst to crystal 
                $crystals = $amount1 / 100 * 40;
                $addBalanceToUser = User::find(Auth::user()->id);
                $addBalanceToUser->silver_coins += $amount1*8244 ;
                $addBalanceToUser->crystal += $crystals;
                $addBalanceToUser->update();
            }
               
                $PackageTxn->save();
                toastSuccess("Pyment Successfully");
                return Redirect::to('/home');
        } else {
            toastSuccess("Pyment cancel unknown error");
            return Redirect::back();
        }
    }

    public function success(Request $request)
    {
        toastSuccess("Pyment Successfully");
        return Redirect::to('/home');
    }
    public function cancel()
    {
         toastSuccess("Pyment cancel unknown error");
         return Redirect::to('/home');
    }
}
