@extends('layouts.app')

@section('content')
<div class="">
    <section class="content-header">
        <h1>Edit Project
            <a href="{{ route('projects.index') }}" class="btn btn-success pull-right">Back</a>
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <form method="POST" action="{{ route('projects.update', $project) }}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label>Name *</label>
                        <input type="text" name="name" value="{{ old('name', $project->name) }}" class="form-control" placeholder="Project Name">
                        @error('name')
                        <span class="help-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group @error('description') has-error @enderror">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Description">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                        <span class="help-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group @error('start_date') has-error @enderror">
                            <label>Start Date</label>
                            @php
                            $startDate = $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : null;
                           @endphp
                            <input type="date" name="start_date" value="{{ old('start_date', $startDate) }}" class="form-control">

                            @error('start_date')
                            <span class="help-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group @error('end_date') has-error @enderror">
                            <label>End Date</label>
                            @php
                            $endDate = $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : null;
                            @endphp

                            <input type="date" name="end_date" value="{{ old('end_date', $endDate) }}" class="form-control">

                            @error('end_date')
                            <span class="help-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
