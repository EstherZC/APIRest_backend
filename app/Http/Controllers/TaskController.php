<?php

namespace App\Http\Controllers;

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
        return Task::get(); 
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
        $validate = request()->validate([
            'name'=>'required',
        ]);
        $fields = (['name'=>$validate['name'], 'status'=>1]);
        Task::create($fields);
        return index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $fields = request()->validate([
            'name'=>'required',
            'status'=>'required'
        ]);
        $task->update($fields);
        return index();
    }

}
