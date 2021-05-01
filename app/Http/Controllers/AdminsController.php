<?php

namespace App\Http\Controllers;

use App\DepartmentModel;
use App\Photo;
use App\RankModel;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admins=User::all();
        $rank=RankModel::all();

        return  view('admins.index',compact('admins','rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        try{
            $id=$request['ids'];
            $user=User::where('id',$id)->firstOrFail();
            $input=$request->all();

            if ($file = $request->file('photo_id')) {

                $name = time().$file->getClientOriginalName();

                $file->move('images/', $name);

                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;
            }

            $user->update($input);

        }catch (ModelNotFoundException $exception){

            return back()->withError('User not found by ID ' . $id)->withInput();
        }
//        try{
//            $id=$request['ids'];
//
//            $user=User::findOrFail($id);
//
//            if (($request['password']=="")){
//
//                if (trim($request->password) ==null){
//
//                    $input = $request->except('password');
//
//                }else{
//                      $input = $request->all();
//                    }
//                if ($file = $request->file('photo_id')) {
//                    $name = time() . $file->getClientOriginalName();
//                    $file->move('images', $name);
//                    $photo = Photo::create(['file' => $name]);
//                    $input['photo_id'] = $photo->id;
//                }
//                $user->update($input);
//
//            }elseif ($request['password'] !=""){
//                $input = $request->all();
//                if ($file = $request->file('photo_id')){
//                    $name = time() . $file->getClientOriginalName();
//                    $file->move("images", $name);
//                    $photo = Photo::create(['file' => $name]);
//                    $input['photo_id'] = $photo->id;
//                }
//                $input['password'] = bcrypt($request->password);
//                $user->update($input);
//            }
//
//        }catch (ModelNotFoundException $exception){
//
//            return back()->withError('User not found by ID ' . $id)->withInput();
//        }

        return  redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post=User::findOrFail($id);
        $post->delete();
        return  redirect()->back()->with('success','Successfully Deleted');
    }
}
