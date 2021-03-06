<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    
    
    return view('tasks',["tasks"=>$tasks]);
});

/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'descripcion' => 'required|max:255',
        'calorias' => 'required|max:255',
        'fecha' => 'required',



    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->descripcion = $request->descripcion;
    $task->calorias = $request->calorias;
    $task->fecha = $request->fecha;



    $task->save();

    return redirect('/');});

/**
 * Delete An Existing Task
 */
    Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});

