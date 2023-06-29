<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Session;


class AdminController extends Controller
{
    //
    public function Admin(){
        return view('AdminPanel.admin');
    }
    public function DataFetch(){
        $data = array();
        if(Session::has('loginId')){
            $data = member::where('uid','=',Session::get('loginId'))->first();

        }
        return view('adminpanel.admin',['data'=>$data]);
    }
}
