<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Http\Resources\Task\TaskResource;
use App\Http\Resources\Task\TaskCollection;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return new TaskCollection(Auth::user()->tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $task= new Task;
        $task->title=$request->title;
        $task->description=$request->description;
        $task->deadline_at=$request->deadline_at;
        $task->status=$request->status;
        $task->remarks=$request->remarks;
        $task->user_id=$request->user_id;
        $task->category_id=$request->category_id;
        $task->save();
        return response([
            'data'=> new TaskResource($task)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
    
    if(Auth::user()->id==$task->user_id){
            return new TaskResource($task);
        }

        return response()->json([
               'error'=>'Task Not Belongs To User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, Task $task)
    {
        if(Auth::user()->id==$task->user_id){
             $task-> update($request->all());
      return response([
        'data' => new TaskResource($task)
      ]);}
      throw new TaskNotBelongsToUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if(Auth::user()->id==$task->user_id){
            $task->delete();
        return response([
        'data' => "Data Deleted Successfilly!"
      ]);
        }
         return response()->json([
               'error'=>'Task is Not Belongs To User'
        ]);

    }
}
