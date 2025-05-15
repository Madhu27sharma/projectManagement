@extends('layouts.app')

@section('content')
<div class="">
    <section class="content-header">
        <h1>Create Task
            <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-success pull-right">Back</a>
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <form id="addTaskForm">
                @csrf
                <div class="box-body">

                    <div class="form-group" id="titleGroup">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control" placeholder="Task Title" required>
                        <span class="help-block text-danger" id="titleError"></span>
                    </div>

                    <div class="form-group" id="descriptionGroup">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Task Description"></textarea>
                        <span class="help-block text-danger" id="descriptionError"></span>
                    </div>

                    <div class="form-group" id="dueDateGroup">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control">
                        <span class="help-block text-danger" id="dueDateError"></span>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_completed" class="form-control">
                            <option value="0">Pending</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $('#addTaskForm').on('submit', function(e){
        e.preventDefault();

        // Clear previous errors
        $('#titleError, #descriptionError, #dueDateError').text('');
        $('#titleGroup, #descriptionGroup, #dueDateGroup').removeClass('has-error');

        $.ajax({
            url: "{{ route('projects.tasks.store', $project->id) }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert('Task created successfully!');
                // Optionally reset the form
                $('#addTaskForm')[0].reset();
            },
            error: function(xhr) {
                if(xhr.status === 422) {  // Validation error
                    var errors = xhr.responseJSON.errors;
                    if(errors.title) {
                        $('#titleGroup').addClass('has-error');
                        $('#titleError').text(errors.title[0]);
                    }
                    if(errors.description) {
                        $('#descriptionGroup').addClass('has-error');
                        $('#descriptionError').text(errors.description[0]);
                    }
                    if(errors.due_date) {
                        $('#dueDateGroup').addClass('has-error');
                        $('#dueDateError').text(errors.due_date[0]);
                    }
                } else {
                    alert('Something went wrong! Please try again.');
                }
            }
        });
    });
});
</script>
@endsection
