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
    public function update(Request $request, $task)
    {
       
    }

}
