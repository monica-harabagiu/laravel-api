@extends('layouts.app')

@section('content')
<main class="p-5">
    <h1>My projects</h1>

    <div class="table-responsive">

        <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">Add project</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col">image</th>
                    <th scope="col">description</th>
                    <th scope="col">software</th>
                    <th scope="col">types</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>
                            <a href="{{ route('dashboard.projects.show', $project->id) }}">
                                {{ $project->title }}
                            </a>
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->img }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->software }}</td>
                        <td>
                            <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection