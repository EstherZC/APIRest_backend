<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get(); 
        return response()->json([
            'status'=> 200,
            'tasks'=> $tasks
        ]);
    }

    public function token(){
        $token = request()->session()->token();
        return response()->json([
            'status'=> 200,
            'token'=> $token
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * Task default status=1 => not completed
     */
    public function create()
    {
        $name = request()->get('name');
        if(isset($name) ){
            $fields = (['name'=>$name, 'status'=>1]);
            Task::create($fields);
            $tasks = Task::get(); 
            return response()->json([
                'status'=> 200,
                'tasks' => $tasks
            ]);
        }else{
            return response()->json([
                'status'=> -1,
                'tasks'=> []
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $status = request()->get('status');
        $idTask = request()->get('id');
        $name = request()->get('name');
        if(isset($status) && isset($idTask)&& isset($name))
        {
            Task::where('id', $idTask)
            ->update(['status'=>$status]);
            $tasks = Task::get(); 
            return response()->json([
                'status'=> 200,
                'tasks' => $tasks
            ]);
            
        }else{
            return response()->json([
                'status'=> -1,
                'tasks'=> []
            ]);
        }
    }

}
