<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;



class TaskSecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks-view.index', ['tasks'=> Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks-view.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $request->validated($request->all());

        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('success', 'Tache enregitrée avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks-view.create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {

        $request->validated($request->all);

        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == "on" ? 1 : 0
        ]);


        return redirect()->route('index')->with('success', 'Tache modifiée avec succès');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('index')->with('success', 'Tache a été supprimée avec succès');
    }


}
