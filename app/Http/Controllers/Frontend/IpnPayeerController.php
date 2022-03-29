<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PackageTxn;
use DB;
use Carbon\Carbon;
use App\Models\Packages;

/**
 * Class IpnPayeerController
 * @package ZaLaravel\LaravelPayeer\Controllers
 */
class IpnPayeerController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function Payment_Success(Request $request)
    {
        //if ($_SERVER['REMOTE_ADDR'] != '37.59.221.230') return;
        $m_key = '123';
        $m_shop = $request->get('m_shop');
        $m_orderid = $request->get('m_orderid');
        $m_amount = $request->get('m_amount');
        $m_curr = $request->get('m_curr');
        $m_desc = $request->get('m_desc');
        $checksum = $request->get('m_sign');
        $user = Payment::select('user_id')->where('uid', '=', $m_orderid)->first();

        if ($request->get('m_operation_id') && isset($checksum)) {
            $arHash = array($m_shop, $m_orderid, $m_amount, $m_curr, $m_desc, $m_key);
            $sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));
            
            if ($request->get('m_status') == 'success') {
                if (Payment::where('uid', '=', $m_orderid) && Payment::where('balance', '=', $m_amount)) {
                    try {
                        DB::beginTransaction();
                        $payment = Payment::where('uid', '=', $m_orderid)->first();
                        if ($payment->payment_status == 0) {
                            $payment->payment_status = 1;
                            $payment->update();

                            //pkg status
                            $packageinsertdata = PackageTxn::where(['user_id' => $user->user_id, 'uid' => $m_orderid])->update(['payment_status' => 1]);
                            $Packagedata='';
                            if($packageinsertdata)
                            {
                                $Packagedata = Packages::where('id', $packageinsertdata->package_id)->first();
                                if($Packagedata)
                                {
                                //covert 40 percent of coinst to crystal 
                                $crystals = $Packagedata->amount / 100 * 40;
                                $addBalanceToUser = User::find($user->user_id);
                                $addBalanceToUser->silver_coins += $Packagedata->coins_to_get;
                                $addBalanceToUser->crystal += $crystals;
                                $addBalanceToUser->update();
                                }
                            }
                            else{
                                
                                 //covert 40 percent of coinst to crystal 
                                $crystals = $m_amount / 100 * 40;
                                $addBalanceToUser = User::find($user->user_id);
                                $addBalanceToUser->silver_coins += $m_amount*8244 ;
                                $addBalanceToUser->crystal += $crystals;
                                $addBalanceToUser->update();
                            }
                            //working for referal
                         $user = Payment::select('user_id')->where('uid', '=',$m_orderid)->first();
                         $user=User::find($user->user_id);
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
                                    $firstlevel=($amount*8244)/ 100 * 20;
                                    $firstlevelcrys=$amount/ 100 * 20;
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
                                            $secondlevel=($amount*8244)/ 100 * 10; 
                                           $secondlevelcrystal=$amount / 100 * 5;
                                        }
                                       
                                         
                                        User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins+'.$secondlevel), 'referal_coins' => DB::raw('referal_coins+'.$secondlevel),'crystal'=>DB::raw('crystal+'.$secondlevelcrystal)]);
                                        $userlevel3parent = User::where(['affiliate_id' => $userlevel2parent->referred_by])->first();
                                        if ($userlevel3parent) {
                                            if($Packagedata)
                                            {
                                              $thirdlevel=$Packagedata->coins_to_get / 100 * 5; 
                                            }
                                            else{
                                                $thirdlevel=($amount*8244) / 100 * 5;
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
                                                 $secondlevel=($amount*8244) / 100 * 10;
                                                $secondlevelcrystal=$amount / 100 * 5;
                                            }
                                      
                                        User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins+'.$secondlevel), 'referal_coins' => DB::raw('referal_coins+'.$secondlevel),'crystal'=>DB::raw('crystal+'.$secondlevelcrystal)]);
                                    }
                                }
                            }
                        }
                                return $user;
                        }
                        
                        DB::commit();
                    } catch (\PDOException $e) {
                        \Session::flash('message', "$e->getMessage()");
                        DB::connection()->getPdo()->rollBack();
                    }
                }
            }
        }
         toastSuccess('Payment Success');
        return redirect()->to('/home');
    }

    public function Payment_Fail(Request $request)
    {
        $m_key = '123';
        $m_shop = $request->get('m_shop');
        $m_orderid = $request->get('m_orderid');
        $m_amount = $request->get('m_amount');
        $m_curr = $request->get('m_curr');
        $m_desc = $request->get('m_desc');
        $checksum = $request->get('m_sign');
        $user = Payment::select('user_id')->where('uid', '=', $m_orderid)->first();
        Payment::where('uid', '=', $m_orderid)->delete();
        PackageTxn::where(['user_id' => $user->user_id, 'uid' => $m_orderid])->delete();
        toastError('Payment Failed');
       return redirect()->to('/home');
    }

    public function Payment_Status(Request $request)
    {
         echo  $_POST['m_status'];
    }
}
