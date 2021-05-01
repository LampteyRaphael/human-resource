<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public  function  index(){

        $a=12;
        $b=2;
        $c=$a+$b;
        return view('students.index',compact('c'));
    }


    public function show($id,$name){

        return  view('students.show',compact('id','name'));
    }





}
