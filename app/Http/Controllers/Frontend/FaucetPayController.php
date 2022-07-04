<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\FaucetController;
use App\Models\Payment;
use App\Models\PackageTxn;
use App\Models\User;
use App\Models\PayOff;
use App\Models\Packages;
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
        $request->validate([
            'wallet' => ['required'],
            'amount' => ['required'],
            'silverblocks'=>['required'],
        ],[
            'wallet' => 'Please Enter Wallet',
        ]);
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
                toastError('You have not enough Crystals');
                return Redirect::back();
            } elseif($amount < 5.3){
                toastError('Minuminum 5 dolar can be withdrawl');
                return Redirect::back();
            }else {
                 //Faucet payout code here
                //convert amount to btc
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=" . $amount,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "postman-token: fc62ebce-6d0b-ef4f-ba02-fcb05e284a02"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $btc = json_decode($response);
                //convert btc to satoshi
                $satoshi= ($btc)*(pow(10, 8));
                 $obj=new FaucetController('c6e89256a4fb1eaa9d989d87c2ff88484a9c54c3','BTC','');
                 $res=$obj->send($request->wallet,$satoshi,'',false);
                 $result=json_decode($res['response']);
                if($result->status==200)
                 {
                    User::find(Auth::user()->id)->update([
                         'withdraw'=> DB::raw('withdraw -' .  $request->silverblocks),
                         'crystal'=> DB::raw('crystal -' .  $amount),
                        ]);
                    //save data in payoff table
                    PayOff::create([
                        'user_id'=>Auth::user()->id,
                        'gateway'=>'F',
                        'wallet'=>$request->wallet,
                        'sum'=>$amount,
                        'status'=>1,
                        'currency'=>'USD',
                    ]);
                    toastSuccess('Payout is successful');
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


    public function sendpaybtc(Request $request)
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
                toastError('You have not enough Crystals');
                return Redirect::back();
            } elseif($amount<150){
                toastError('Minuminum 150 dolar can be withdrawl For BTC');
                return Redirect::back();
            }else {
                 //Faucet payout code here
                //convert amount to btc
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=" . $amount,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "postman-token: fc62ebce-6d0b-ef4f-ba02-fcb05e284a02"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $btc = json_decode($response);
                //convert btc to satoshi
                $satoshi= ($btc)*(pow(10, 8));
                 $obj=new FaucetController('c6e89256a4fb1eaa9d989d87c2ff88484a9c54c3','BTC','');
                 $res=$obj->send($request->wallet,$satoshi,'',false);
                 $result=json_decode($res['response']);
                if($result->status==200)
                 {
                    User::find(Auth::user()->id)->update([
                         'withdraw'=> DB::raw('withdraw -' .  $request->silverblocks. ''),
                         'crystal'=> DB::raw('crystal -' .  $amount. ''),
                        ]);
                    //save data in payoff table
                    PayOff::create([
                        'user_id'=>Auth::user()->id,
                        'gateway'=>'F',
                        'wallet'=>$request->wallet,
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
        //User::find(2)->update(['name'=>$token]);
        $payment_info = file_get_contents("https://faucetpay.io/merchant/get-payment/" . $token);
        $payment_info = json_decode($payment_info, true);

        // $payment_info='{"valid":true,"transaction_id":"c5c34307bdb4520179956549022a2ccee2debca4","merchant_username":"obaidjani","amount1":"1.00000000","currency1":"USD","amount2":"0.00002603","currency2":"BTC","custom":"0,2"}';
        // $payment_info = json_decode($payment_info, true);
        $token_status = $payment_info['valid'];
        $merchant_username = $payment_info['merchant_username'];
        $m_amount = $payment_info['amount1'];
        $currency1 = $payment_info['currency1'];
        $amount2 = $payment_info['amount2'];
        $currency2 = $payment_info['currency2'];
        $custom = $payment_info['custom'];
        $customarray=explode(',',$custom);
        $custom=$customarray[0];
        $userid=$customarray[1];
        $pkgqty=$customarray[2];
        $my_username = "cowcashbtc";
        $m_orderid = mt_rand();
        $Packagedata='';
        if ($my_username == $merchant_username && $token_status == true) {

            if($custom)
            {
                $Packagedata = Packages::where('id',$custom)->first();
            }
            $payment = new Payment();
            $payment->uid = $m_orderid;
            $payment->user_id = $userid;
            $payment->balance = $m_amount;
            $payment->description ='Purchase coins and crystals';
            $payment->payment_method='F';
            $payment->operation = '+';
            $payment->currency= $currency1;
            $payment->save();
            //
            if($custom)
            {
                $PackageTxn = new PackageTxn();
                $PackageTxn->user_id = $userid;
                $PackageTxn->uid = $m_orderid;
                $PackageTxn->package_id = $custom;
                $PackageTxn->qty=$pkgqty;
                $PackageTxn->payment_method = 'Faucet';

            }
           if($Packagedata)
            {
                 if($Packagedata->amount==$m_amount)
                 {
                    $PackageTxn->payment_status = 1;
                    $PackageTxn->save();
                    //covert 40 percent of coinst to crystal 
                     $discountcoins=$Packagedata->coins_to_get/100*$Packagedata->discount;
                    $crystals = $Packagedata->amount*$pkgqty / 100 * 40;
                    $addBalanceToUser = User::find($userid);
                    $addBalanceToUser->silver_coins += $Packagedata->coins_to_get*$pkgqty+$discountcoins;
                    $addBalanceToUser->crystal += $crystals;
                    $addBalanceToUser->update();
                 }
                   
            }
            else{
                
                 //covert 40 percent of coinst to crystal 
                $crystals = $m_amount / 100 * 40;
                $addBalanceToUser = User::find($userid);
                $addBalanceToUser->silver_coins += $m_amount*8244 ;
                $addBalanceToUser->crystal += $crystals;
                $addBalanceToUser->update();
            }

            //work for referal earnings
            $user=User::find($userid);
             if ($user) {
                    //check parent
                if ($user->referred_by != NULL) {
                    if($Packagedata)
                    {
                      //parent have got 30 coins
                     $firstlevel=$Packagedata->coins_to_get / 100 * 20;
                     $firstlevelcrys=$Packagedata->amount / 100 * 20;
                    }
                    else{
                        $firstlevel=($m_amount*8244)/ 100 * 20;
                        $firstlevelcrys=$m_amount/ 100 * 20;
                    }
                    
                    User::where('affiliate_id', $user->referred_by)->update(['silver_coins' => DB::raw('silver_coins+'. $firstlevel), 'referal_coins' => DB::raw('referal_coins+'. $firstlevel),'crystal'=> DB::raw('crystal+'. $firstlevelcrys)]);
                    $userlevel1parent = User::where(['affiliate_id' => $user->referred_by])->first();
                    
                    if ($userlevel1parent->referred_by != NULL) {
                        
                        $userlevel2parent = User::where(['affiliate_id' => $userlevel1parent->referred_by])->first();
            
                        if ($userlevel2parent->referred_by != NULL) {
                            if($Packagedata)
                            {
                              //parent have got 30 coins
                            $secondlevel=$Packagedata->coins_to_get / 100 * 10; 
                             $secondlevelcrystal=$Packagedata->amount / 100 * 5; 
                            }
                            else{
                                $secondlevel=($m_amount*8244)/ 100 * 10; 
                               $secondlevelcrystal=$m_amount / 100 * 5;
                            }
                           
                             
                            User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins+'.$secondlevel), 'referal_coins' => DB::raw('referal_coins+'.$secondlevel),'crystal'=>DB::raw('crystal+'.$secondlevelcrystal)]);
                            $userlevel3parent = User::where(['affiliate_id' => $userlevel2parent->referred_by])->first();
                            if ($userlevel3parent) {
                                if($Packagedata)
                                {
                                  $thirdlevel=$Packagedata->coins_to_get / 100 * 5; 
                                }
                                else{
                                    $thirdlevel=($m_amount*8244) / 100 * 5;
                                }
                               
                                 
                                User::where('id', $userlevel3parent->id)->update(['silver_coins' => DB::raw('silver_coins+'.$thirdlevel), 'referal_coins' => DB::raw('referal_coins+'.$thirdlevel)]);
                            }
                        } else {
                            if($Packagedata)
                                {
                                  $secondlevel=$Packagedata->amount / 100 * 10;
                                  $secondlevelcrystal=$Packagedata->amount / 100 * 5;
                                }
                                else{
                                     $secondlevel=($m_amount*8244) / 100 * 10;
                                    $secondlevelcrystal=$m_amount / 100 * 5;
                                }
                          
                            User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins+'.$secondlevel), 'referal_coins' => DB::raw('referal_coins+'.$secondlevel),'crystal'=>DB::raw('crystal+'.$secondlevelcrystal)]);
                        }
                    }
                }

                //cows work here
                if($Packagedata)
                {
                    if($Packagedata->amount==10)
                    {
                        $qty=1;
                    }elseif($Packagedata->amount==50)
                    {
                        $qty=3;
                    }elseif($Packagedata->amount==100)
                    {
                        $qty=10;
                    }
                    elseif($Packagedata->amount==150)
                    {
                        $qty=10;
                    }
                    elseif($Packagedata->amount==200)
                    {
                        $qty=10;
                    }
                    $usercoworder = UserOrder::create([
                        'user_id' => $user->id,
                        'cow_id' => 1,
                        'coins_to_pay' => $qty*150,
                        'qty' => $qty,
                        'status' => 1,
                    ]);
                    if ($usercoworder) {
                        UserCows::create([
                            'user_id' => $user->id,
                            'cow_id' => 1,
                            'qty' => $qty,
                            'per_hours_litters' => 5,
                            'total_milk' => 0,
                            'available_milk' => 0,
                            'sold_milk' => 0,
                            'collect_per_hour_milk' => 0,
                            'cronjobtime'=>date('Y-m-d H:i:s'),
                            'status' => 1,
                        ]);
                    }
                }
            }
            
            toastSuccess("Pyment Successfully");
            return Redirect::to('/home');
        } 
    }

    public function sucess(Request $request)
    {
            toastSuccess("Pyment Successfully");
            return Redirect::to('/home');
        
    }
    public function cancel()
    {
         toastSuccess("Pyment cancel");
         return Redirect::to('/home');
    }
}
