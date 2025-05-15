@extends('layouts.app')

@section('content')
<div class="">
    <section class="content-header">
        <h1>Create Project
            <a href="{{ route('projects.index') }}" class="btn btn-success pull-right">Back</a>
        </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <form method="POST" action="{{ route('projects.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label>Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Project Name">
                        @error('name')
                        <span class="help-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group @error('description') has-error @enderror">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="help-block"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group @error('start_date') has-error @enderror">
                            <label>Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                            @error('start_date')
                            <span class="help-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group @error('end_date') has-error @enderror">
                            <label>End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control">
                            @error('end_date')
                            <span class="help-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
