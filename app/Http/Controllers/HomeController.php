<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCows;
use App\Models\User;
use App\Models\Cows;
use DB;
use Carbon\Carbon;
use Auth;
// use Spatie\SimpleExcel\SimpleExcelWriter;
use DataTables;
use Excel;
use App\Exports\UserExport;
class HomeController extends Controller
{
    //front end page page hoeme page
    public function index()
    {
        try {
        
            $allusers = User::where('role', 'farmer')->count();
            $newuser = User::where('role', 'farmer')->where('created_at', '>', Carbon::now()->subDays(1))->count();
            $todayActive = User::where('role', 'farmer')->whereDate('created_at', Carbon::today())->count();
            return view('Frontend.home', compact('allusers', 'newuser', 'todayActive'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    

    public function servey(Request $request)
    {
        User::find(Auth::user()->id)->update(['is_servey'=>1]);
        return redirect('/home');
    }


    //cron job for calculating per hour milk cow and user should be active
    public function calculate_milk_per_hour()
    {
        UserCows::with('user')->where('status', 1)->chunk(100, function ($users) {
            foreach ($users as $user) {
                if ($user->user->status == 1) {
                    $total_milk = $user->per_hours_litters * $user->qty;
                    DB::table('user_cows')
                        ->where('id', $user->id)
                        ->update([
                            'cronjobtime' => date('Y-m-d H:i:s'),
                            'collect_per_hour_milk' => DB::raw('collect_per_hour_milk +' .  $total_milk . ''),
                        ]);
                }
            }
        });
    }


    public function ExportUser()
    {
        try {
            $users = User::with('totalaffiliate')->where('role', 'farmer')->paginate(100);
            return view('backend.Admin.exportuser', compact('users'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    public function UserData(Request $request)
    {
        
        $fromDate = $request->fromDate;
        
        $toDate = $request->toDate;

        $userList = DB::table('users');
        $userList->when(isset($fromDate) && !empty($fromDate) , function($q) use ($fromDate){
            $q->where(\DB::raw('Date(created_at)') , '>=' , $fromDate );
        });

        $userList->when(isset($toDate) && !empty($toDate) , function($q) use ($toDate){
            $q->where(\DB::raw('Date(created_at)') , '<=' , $toDate );
        });
        
        $users = $userList->where('role' , 'farmer')->orderBy('id' , 'asc');
        
        return DataTables::queryBuilder($users)->toJson();
        

    }

    public function FilterUser(Request $request)
    {
        $fromDate = $request->fromDate;
        
        $toDate = $request->toDate;

        $userList = User::query();

        $userList->when(isset($fromDate) && !empty($fromDate) , function($q) use ($fromDate){
            $q->where(\DB::raw('Date(created_at)') , '>=' , $fromDate );
        });

        $userList->when(isset($toDate) && !empty($toDate) , function($q) use ($toDate){
            $q->where(\DB::raw('Date(created_at)') , '<=' , $toDate );
        });
        
        $users  = $userList->where('role' , 'farmer')->get();
        
        return view('backend.Admin.components.export-table')->with(['users' => $users]);
    

    }

    public function ExportSheet(Request $request)
    {  
        ini_set('memory_limit', '-1');
        try{
        
        $fromDate = $request->fromDate;
        
        $toDate = $request->toDate;

        $userList = User::query();

        $userList->when(isset($fromDate) && !empty($fromDate) , function($q) use ($fromDate){
            $q->where(\DB::raw('Date(created_at)') , '>=' , $fromDate );
        });

        $userList->when(isset($toDate) && !empty($toDate) , function($q) use ($toDate){
            $q->where(\DB::raw('Date(created_at)') , '<=' , $toDate );
        });
        
        $userList  = $userList->select('name' , 'email')->where('role' , 'farmer')->get();
        // $userSheet = SimpleExcelWriter::streamDownload('users.csv');
        // // dd('here here now00');
        // // $userSheet->addHeader(['Name', 'Email']);
        // $i=0;
        // foreach($userList->lazy(1000) as $user)
        // {
        //     $userSheet->addRow($user->toArray());
        //     if ($i % 1000 === 0) {
        //         flush(); // Flush the buffer every 1000 rows
        //     }
        //     $i++;
        // }

        // return $userSheet->toBrowser();




        // $users = [];

        // foreach($userList as $user )
        // {
        //     $users[] = ['name' => $user->name , 'email'=> $user->email];
        // }

        // dd($request->all() ,'herenow'); 
         return Excel::download(new UserExport($userList) , 'user.xlsx' , null ,[
            'chunkSize' => 500,
         ]);
        }catch(Exception $e){
            dd($e->getMessage());
        }


    }
}
