<?php
namespace App\Http\Controllers;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        return view('tasks.index', compact('project'));
    }

    public function store(TaskStoreRequest $request, Project $project)
    {
        $task = $project->tasks()->create($request->validated());

       
    return back()->with('success', 'Task added successfully!');
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(TaskUpdateRequest $request, Project $project, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task updated!');
    }

    public function destroy(Project $project, Task $task,Request $request)
    {
        $task->delete();
     
        if (request()->ajax()) {
           
            return response()->json(['success' => true]);
        }
        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task deleted!');
    }
    
}
