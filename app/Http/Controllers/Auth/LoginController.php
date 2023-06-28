<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\member;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    //
    public function Login(){
        return view('login');
    }

    public function LoginNew(Request $req){
        $req ->validate([
            'email'=>'required',
            'password'=>'required|min:8|max:12'
        ]);
      $login= member::where('email','=',$req->email)->first();
        if($login){
           if(Hash::check($req->password,$login->password)){
            $req->session()->put('loginId',$login->uid);
            return view('AdminPanel.admin');
           }else{
            return back()->with('fail','Password not Matched!');
           }
        }else{
            return back()->with('fail','Something Wrong!');
        }

    }

    public function Logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
