@extends('layouts.app')

@section('content')
<div class="">
    <section class="content-header">
        <h1>Projects
            <a href="{{ route('projects.create') }}" class="btn btn-success pull-right">Add New Project</a>
        </h1>
    </section>
    <section class="content">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : '-' }}</td>
                            <td>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '-' }}</td>

                            <td>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary btn-xs">Edit</a>
                                 <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-info btn-xs">Tasks</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No projects found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
