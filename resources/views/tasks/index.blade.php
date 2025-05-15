@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content-header mb-3">
        <h1>
            Tasks for Project: {{ $project->name }}
        </h1>
    </section>

    <section class="content">
        <!-- Add New Task -->
        <div class="card card-primary mb-4">
            <div class="card-header">
                <h3 class="card-title">Add New Task</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.tasks.store', $project->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Task Title *</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Task Title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" id="due_date" name="due_date" class="form-control">
                        @error('due_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>

        <!-- Existing Tasks -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Existing Tasks</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '-' }}</td>
                            <td>{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                            <td>
                            <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" class="deleteTaskForm" data-id="{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($project->tasks->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">No tasks found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

