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

    public function sendpay(Request $request)
    {
        //dd($request->all());
        $pkgid = $request->package_id;
        $user = Auth::user();
        $user = $user->id;
        $m_amount = number_format($request->purchase_sum, 2, '.', '');
        $m_orderid = mt_rand();
        if ($m_amount != 0) {
            try {
                DB::beginTransaction();
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

                DB::commit();
            } catch (\PDOException $e) {

                print $e->getMessage();
                DB::connection()->getPdo()->rollBack();
            }
        }

        //new obj
        $obj=new FaucetController('efa543728afab33a3ebe8e802d56206b2ba7c74f','BTC','');
        $res=$obj->send('obijanikust@gmail.com',$m_amount,'',false);
        print_r($res);

    }
}
