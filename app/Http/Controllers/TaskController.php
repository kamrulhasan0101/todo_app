<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('task.list',['tasks'=>Auth::user()->tasks]);
    }



    public function create()
    {
        return view('task.create');
    }



    public function store(StoreTask  $request)
    {
        $data=$request->validated();
        $data['user_id']=Auth::id();
//        dd($data);
        Task::create($data);
        return redirect()->route('task.index')->with('status', 'Operation Successful!');
    }



    public function show(Task $task)
    {
        return view('task.show',['task'=>$task]);
    }


    public function edit(Task $task)
    {
        return view('task.edit',['task'=>$task]);
    }



    public function update(StoreTask $request, Task $task)
    {
        $data=$request->validated();
        $data['deadline_at']=$data['deadline_at'] ?? $task->deadline_at;
        $data['user_id']=Auth::id();
        $task->update($data);
        return redirect()->route('task.show',$task->id)->with('status', 'Operation Successful!');
    }



    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('status','Operation Successful!');
    }


    public function task_done(Task $task)
    {
        $task->update(['status'=>'done']);
        return redirect()->route('task.index')->with('status','Operation Successful!');
    }
}
