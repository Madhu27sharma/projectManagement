@extends('layouts.app')

@section('content')
<div class="">
    <section class="content-header">
        <h1>Edit Task: {{ $task->title }}</h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <form method="POST" action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Task Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }}> Completed
                        </label>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update Task</button>
                    <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
