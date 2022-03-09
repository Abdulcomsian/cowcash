<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cows;
use App\Utils\HelperFunctions;

class CowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cowslist = Cows::get();
            return view('backend.Admin.Cow.index', compact('cowslist'));
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
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
        return view('backend.Admin.Cow.create');
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
            $all_inputs  = $request->except('_token', 'image');
            if ($request->file('image')) {
                $filePath = HelperFunctions::CowsImagePath();
                $all_inputs['image'] = HelperFunctions::saveFile(null, $request->file('image'), $filePath);
            }
            Cows::create($all_inputs);
            toastr()->success('Cow Save Successfully!');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
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
            $cow = Cows::find($id);
            return view('backend.Admin.Cow.edit', compact('cow'));
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
            $cowoldimage = Cows::find($id);
            $all_inputs = $request->except('_token', '_method', 'image');
            if ($request->file('image')) {
                $filePath = HelperFunctions::profileImagePath();
                $all_inputs['image'] = HelperFunctions::saveFile($cowoldimage->image ?? null, $request->file('image'), $filePath);
            }
            $cowoldimage->update($all_inputs);
            toastSuccess('Cow successfully updated!');
            return redirect()->route('cow.index');
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
            Cows::find($id)->delete();
            toastSuccess('Cow deleted successfully!');
            return back();
        } catch (\Exception $exception) {
            if($exception->getCode=="23000")
            {
                 toastError('You can not Delete cow have child relation');
            }
            else{
            toastError('Something went wrong, try again');
            }
            return back();
        }
    }
}
