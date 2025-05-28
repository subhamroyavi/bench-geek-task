<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {

        $taskData = Task::get();
        // dd($taskData->toArray());
        return view('task', compact('taskData'));
    }

    public function create()
    {
    //    $data = new \App\Models\Task(); 
    return view('task-action');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|unique:task,title|max:50',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'is_completed' => 'required|boolean',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/task', $imageName);
            $data['image'] = $imageName;
        }
        // dd($data['image']);


        Task::create($data);

        return redirect()->route('index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {

        $data = Task::findOrFail($id);
        // dd($data->toArray());
        return view('task-action', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'is_completed' => 'required|boolean',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/task', $imageName);
            $data['image'] = $imageName;
        }
        // dd($data['image']);

        Task::findOrFail($id)->update($data);

        return redirect()->route('index')->with('success', 'Task updated successfully!');
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('index')->with('success', 'Task deleted successfully!');
    }
}
