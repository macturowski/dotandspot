<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks_todo = Task::where('is_done', false)
            ->where('user_id', Auth::user()->id)
            ->get();

        $tasks_done = Task::where('is_done', true)
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('task.index', compact('tasks_todo', 'tasks_done'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('task.index')->with('message', 'New task has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize('edit', $task);
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);   
        $task->fill($request->validated())->save();
        return redirect()->route('task.index')->with('message', 'Successfuly updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('task.index')->with('message', 'Successfuly deleted!');
    }

    public function status(Task $task, Request $request)
    {
        $task->is_done = $request->is_done;
        $task->save();
        return redirect()->route('task.index')->with('message', 'Successfuly updated!');
    }
}
