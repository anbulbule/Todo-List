<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        if(session('email')){
            return redirect('dashboard');
        }
        return view('/register');
    }
    public function create(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|min:5|confirmed',
        ]);
    
        $userData = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        if($userData){
        $req->session()->flash('success','Successfully Register, Please Login here');
        return redirect()->route('login');
    }else{
        $req->session()->flash('fail','Successfully Register, Please Login here');
        return redirect('register');
    }


    }
}
