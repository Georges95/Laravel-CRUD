<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks-view.index', compact('tasks'));
    }

    public function create(){

        return view('tasks-view.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'string|max:250|required',
            'description'=>'string|max:1000|required'
        ]);

        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('success', 'Tache enregitrée avec succès');
    }

    public function edit(int $id){
        $task = Task::where('id', $id)->first();

        return view('tasks-view.create', compact('task'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title'=> 'string|max:250|required',
            'description'=>'string|max:1000|required'
        ]);


        $task = Task::where('id', $id)->first();

        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('success', 'Tache modifiée avec succès');

    }

    public function destroy(int $id){
        Task::where('id', $id)->delete();

        return redirect()->route('index')->with('success', 'Tache a été supprimée avec succès');
    }
}