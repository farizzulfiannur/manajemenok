<?php

namespace App\Http\Controllers;

use App\Models\note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{
    public function addNotes(){
        $user = Auth::user();
        return view('addNotes',compact('user'));
    }

    public function storeNotes(Request $request){
        // dd($request);
        $user = Auth::user()->id;
        $notes = note::create([
            'user_id' => $user,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        $notes->save();

        if ($notes) {
            Session::flash('success', 'Note added successfully.');
            return redirect()->route('homePM');
        } else {
            Session::flash('fail', 'Note failed to add.');
            return redirect()->route('homePM');
        }
    }

    public function showNotes($id){
        $user = Auth::user();
        $note = note::findOrFail($id);
        return view('showNotes',compact('user','note'));
    }

    public function deleteNotes($id){
        $deleteNotes = note::destroy($id);
        if($deleteNotes){
            Session::flash('success', 'The note has been deleted');
            return redirect()->route('homePM');
        }else{
            Session::flash('fail', 'Failed to delete note');
            return redirect()->route('homePM');
        }
        return redirect()->route('homePM');
    }

    public function editNotes($id){
        $user = Auth::user();
        $note = note::findOrFail($id);
        return view('editNotes',compact('note','user'));
    }

    public function updateNotes(Request $request, $id){
        $user = Auth::user();
        $note = note::findOrFail($id);
        $note->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        $note->save();
        if($note){
            Session::flash('success', 'The note has been updated');
            return redirect()->route('homePM');
        }else{
            Session::flash('fail', 'Failed to update note');
            return redirect()->route('homePM');
        }
    }
}
