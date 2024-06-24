@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-5">Details Page</h1>

    @include('partials.session_message')

    <div class="container card">
        <dl>
            <dt class="fs-1">Title:</dt>
            <dd class="fw-semibold"> {{ $project->title }} </dd>

            <dt class="fs-1">Type:</dt>
            <dd class="fw-semibold"> {{ $project->type?->name }} </dd>

            <dt class="fs-3">Description:</dt>
            <dd class="fw-semibold">{{ $project->description }}</dd>

            <dt class="fs-3">Slug:</dt>
            <dd class="fw-semibold">{{ $project->slug }}</dd>
        </dl>
    </div>

    <div class="container py-5">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary" title="Indietro"><i
                class="fa-solid fa-square-caret-left"></i></a>
    </div>
    
@endsection
