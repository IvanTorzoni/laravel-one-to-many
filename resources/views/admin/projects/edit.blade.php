@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center py-5">Edit Project</h1>

        @include('partials.errors')

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary" title="Indietro"><i
                        class="fa-solid fa-square-caret-left"></i></a>
            </div>

        </form>
    </div>
@endsection
