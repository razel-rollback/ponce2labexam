<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()

  {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));

  }



  /**

   * Show the form for creating a new resource.

   */

  public function create()

  {

    return view('tasks.create');

  }



  /**

   * Store a newly created resource in storage.

   */

  public function store(Request $request)

  {

    $request->validate([

      'title' => 'required|string|max:255',

      'description' => 'nullable|string',

    ]);



    Task::create($request->all());



    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');

  }



  /**

   * Display the specified resource.

   */

  public function show(task $task)

  {

   

  }



  /**

   * Show the form for editing the specified resource.

   */

  public function edit(task $task)

  {

    return view('tasks.edit', compact('task'));

  }



  /**

   * Update the specified resource in storage.

   */

  public function update(Request $request, task $task)

  {

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_completed' => 'boolean',
    ]);

    $task->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'is_completed' => $request->has('is_completed') ? true : false,
    ]);


    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');

  }



  /**

   * Remove the specified resource from storage.

   */

  public function destroy(task $task)

  {

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');

  }
}