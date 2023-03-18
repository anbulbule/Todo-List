<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    public function create(Request $req){
        $note = Note::create([
            'title'=> $req->title,
            'description'=> $req->description,
            'user_id' => session('user_id')
        ]);
            
        if($note){
            $req->session()->flash('success','Notes added successfully');
            return redirect('dashboard');
        }
    }

    public function deleteNote($id){
        $note = Note::where([['user_id',session('user_id')],['id',$id]]);
        if($note){
            $note->delete();
            return redirect('dashboard');
        }else{
            return redirect('dashboard');
        }
    }
}
