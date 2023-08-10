<?php

namespace App\Http\Controllers;
use App\Models\role;
use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function homeTask(){
        $user = Auth::user();


        // $task = $user->tasks[1];
        // dd($task);
        return view('task',compact('user'));


        // $task2 = task::findOrFail(4);
        // $task = task::all();
        // $user_task = $user2->tasks;
        // $task = $task2->Users->get(1);
        // $role = $task->pivot->role;
        // $role = $task2->Users->pivot;
        // $task = $task2->Users->pivot->role;
        // dd($role);
        // return view('task',compact('user'));
    }

    public function addTask(){
        $user = Auth::user();
        $member = User::all();
        // $role = role::all();
        return view('addTask',compact('user','member'));
    }

    public function cobakTask(){
        // $user = new User();
        $task = new task();
        $task->name = 'Task 4 ';
        $task->desc = 'TEST X';
        $task->link = 'www';
        $task->status = 'open';

        $task->save();
        // $task2 = [1, 2];
        $task2 = [
            1 => ['role' => 'Project Manager'],
            2 => ['role' => 'Member'],
        ];
        $task->Users()->sync($task2);

        return redirect()->route('task');
    }

    public function storeTask(Request $req){
        
        // dd($req);

        // $members =[];
        // foreach($req->member as $key=>$member){
        //     $dataObj = new \stdClass();
        //     $dataObj->id = $member;
        //     $dataObj->name = $req->role[$key];
        //     array_push($members,$dataObj);
        // }
        // dd($members);
        // return $members;
        // $task = new task();

        $task2 = task::create([
            'name' => $req->name,
            'desc' => $req->desc,
            'link' => $req->link,
            'status' => 'pending',
        ]);
        $task2->save();
        $member = [];
        $member = $req->input('member');
        $role = [];
        $role = $req->input('role');
        foreach($role as $key => $roles){
            if($roles == '1'){
                $task2->Users()->attach($member[$key],['is_roles' => 1 ]); 
            }
            if($roles == '2'){
                $task2->Users()->attach($member[$key],['is_roles' => 2 ]); 
            }
        }
        return redirect()->route('task');
    }

    public function showTask($id){
        $user = Auth::user();
        $task = task::findOrFail($id);
        return view('showTask',compact('user','task'));
    }
}