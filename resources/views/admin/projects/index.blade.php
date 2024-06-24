@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Project Table</h1>

        <div>
            <form action="">
                <label for="perPage">Select the number of elements in page</label>
                <select name="perPage" id="perPage">
                    <option value="5" @selected($projectsArray->perPage() == 5)>5</option>
                    <option value="10" @selected($projectsArray->perPage() == 10)>10</option>
                    <option value="15" @selected($projectsArray->perPage() == 15)>15</option>
                </select>

                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>

        @include('partials.session_message')

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectsArray as $project)
                    <tr>
                        <th scope="row"> {{ $project->title }} </th>
                        <td> {{ $project->type?->name }} </td>
                        <td> {{ $project->description }} </td>
                        <td> {{ $project->slug }} </td>
                        <td>
                            <div class="d-flex align-item-center">
                                <a class='btn btn-info'
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-circle-info" title="Details"></i></a>
                                <a class='btn btn-warning'
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-pen" title="Modify"></i></a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target='[data-form="{{ $project->slug }}"]'>
                                    <i class="fa-solid fa-trash" title="Delete"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-form="{{ $project->slug }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete {{ $project->title }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form
                                                    action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" id="delete"
                                                        type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $projectsArray->links() }}
    </div>
@endsection
