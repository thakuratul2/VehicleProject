<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\member;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function Register(){
        return view('register');
    }
    public function NewMember(Request $req){

        $req->validate([
            
            'email'=> 'required|email|unique:members',
            'password'=>'required|min:8|max:12',
            'cpassword'=>'required|min:8|max:12'
        ]);

        $memberdata = new member;

        $memberdata->email = $req->email;
        $memberdata->password = Hash::make($req->password);
        $memberdata->cpassword = Hash::make($req->cpassword);

       $res =  $memberdata->save();

       if($res){
        return redirect('login')->with('success','You are registered successfully!');
    }else{
        return back()->with('fail','Something Wrong!');
    }
    }
}
