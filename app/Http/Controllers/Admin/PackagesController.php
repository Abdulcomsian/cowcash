<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\PackageTxn;
use App\Utils\Validations;


class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $packages = Packages::get();
            return view('backend.Admin.Packages.index', compact('packages'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Admin.Packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Validations::storePackages($request);
            $input = $request->except('_token');
            Packages::create($input);
            toastSuccess('Package Created!');
            return redirect()->route('packages.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $pkg = Packages::find($id);
            return view('backend.Admin.Packages.edit', compact('pkg'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $all_inputs = $request->except('_token', '_method');
            Packages::find($id)->update($all_inputs);
            toastSuccess('Package successfully updated!');
            return redirect()->route('packages.index');
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Packages::find($id)->delete();
            toastSuccess('Package deleted successfully!');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return back();
        }
    }

    //all trannsactions here
    public function pkg_Transactions()
    {
        try {
            $allpkgtrans = PackageTxn::with('package', 'user')->paginate(100);
            return view('backend.Admin.Packages.all_transac', compact('allpkgtrans'));
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return back();
        }
    }
    //transaction delete
    public function pkg_Transactions_delete($id)
    {
        try {
            PackageTxn::find($id)->delete();
            toastSuccess('Transaction deleted successfully!');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again');
            return back();
        }
    }
}
