<?php

namespace App\Http\Controllers;

use App\AnnalLeaveModel;
use App\DepartmentModel;
use App\Http\Requests\AnnualLeaveRequest;
use App\JobModel;
use App\LeaveCarriedOver;
use App\User;
use Illuminate\Http\Request;

class AnnualLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $leave=AnnalLeaveModel::all();
        $users=User::get(['id','name']);
        $jobs=JobModel::get(['id','name']);
        $department=DepartmentModel::get(['id','name']);
        $sign=User::get(['sign_id','name']);
        return  view('annual-leave.index',compact('leave','users','jobs','department','sign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $users=User::get(['id','name']);
        $jobs=JobModel::get(['id','name']);
        $department=DepartmentModel::get(['id','name']);
        $sign=User::get(['sign_id','name']);
        return  view('annual-leave.create',compact('users','jobs','department','sign'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AnnualLeaveRequest $request)
    {
        $post=$request->all();

        AnnalLeaveModel::create($post);

        return  redirect()->back()->with('success','Your Application Has Been Successfully Posted');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
         $id=$request['ids'];




        $input=AnnalLeaveModel::findOrFail($id);

        if ($request['recommendedBy']==0 && $request['approvedBy']==0){

            $input->update($request->all());

        }else{
            $LeaveCarriedOver=new LeaveCarriedOver();

            $LeaveCarriedOver->userId=$request['user_id'];
            $LeaveCarriedOver->year=$request['year'];
            $LeaveCarriedOver->carriedOver=$request['applyfor'];

            $LeaveCarriedOver->save();

            $input->update($request->all());
        }

        return  redirect()->back()->with('success','Successfully Approved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post=AnnalLeaveModel::findOrFail($id);

        $post->delete();

        return  redirect()->back()->with('success','Successfully Remove');
    }
}
