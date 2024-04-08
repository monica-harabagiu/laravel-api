@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

<main class="container mt-5">

    <h2>Edit your project</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input value="{{ old('title', $project->title) }}" name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            @if ($project->img)
                <img src="{{ asset('storage/'.$project->img) }}" alt="">
            @endif
        </div>

        <div class="mb-3">
          <label for="img" class="form-label">Image</label>
          <input value="{{ old('img', $project->img) }}" name="img" type="file" class="form-control" id="img">
        </div>

        <div class="mb-3">
            <label for="type_id">Types</label>
            <select class="
            form-select 
            @error('category_id')
                is_invalid
            @enderror
            " 
            aria-label="Default select example" name="type_id" id="type_id">
                <option value="">Select one</option>
                
                @foreach ($types as $item)
                    <option 
                        value="{{ $item->id }}"
                        {{ $item->id == old('type_id', $project->type ? $project->type->id : '' ) ? 'selected' : '' }}
                        >{{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label">Technologies</label>
            <select multiple name="technologies[]" class="form-select @error('technology_id') is_invalid @enderror" id="technlogies">

              <option disabled value="">Select all relevant technologies</option>

              @forelse ($technologies as $technology)
              
                @if ($errors->any())
                    <option value="{{ $technology->id }}"
                        {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>{{ $technology->name }}</option>
                @else
                    <option value="{{ $technology->id }}"
                        {{ $project->technology->contains($technology->id) ? 'selected' : '' }}>{{ $technology->name }}</option>
                @endif                

              @empty

                <option value="">No technologies available</option>
              @endforelse

            </select>
        </div>

        <div class="mb-3">
            <label for="software" class="form-label">Softwares</label>
            <input value="{{ old('software', $project->software) }}" name="software" type="text" class="form-control" id="software">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</main>

@endsection