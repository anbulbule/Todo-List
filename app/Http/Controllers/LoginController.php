<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Note;

class LoginController extends Controller
{
    public function index(){
        if(session('email')){
            return redirect('dashboard');
        }
        return view('login');
    }
    public function signIn(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$req->email)->first();
        
        if($user && Hash::check($req->password,$user->password)){
            $sessionData = session(['email'=> $user->email]);
            $sessionData = session(['user_id'=> $user->id]);
            return redirect('dashboard');
        }else{
            $req->session()->flash('fail','Please Enter Valid Credential');
            return redirect('/');
        }
    }

    public function editNote($id){
        $note = Note::where('user_id',session('user_id'))->find($id);
        if($note){
            return view('editModal',['note'=>$note]);
        }else{
            return redirect('dashboard');
        }
    }
    public function update(Request $req, $id){
        $note = Note::where([['id',$id],['user_id',session('user_id')]]);
        if($note){
            $note->update([
                'title'=>$req->title,
                'description'=>$req->description,
            ]);
            $req->session()->flash('success','Notes Updated successfully');
            return redirect('dashboard');
        }
    }

    public function dashboard(){
        $notes = Note::where('user_id',session('user_id'))->get();
        return view('dashboard',['notes'=>$notes]);
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }

    public function profile($id){
        $user = User::where('id',session('user_id'))->find($id);
        if($user){
            return view('profile',['profile'=>$user]);
        }else{
            return redirect('dashboard');
        }
    }

    public function profileUpdate(Request $req,$id){
        $user = User::where([['id',$id],['id',session('user_id')]]);
        if($user){
            $user->update([
                'name'=> $req->username,
            ]);
            $req->session()->flash('success','Profile Updated successfully');
            return redirect('logout');
        }else{
            return redirect('dashboard');
        }
    }
}
