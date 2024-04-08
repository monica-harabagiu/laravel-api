@extends('layouts.app')

@section('title', 'Single Project')

@section('content')
    <main class="container mt-5">
        <h2>{{ $project->title }}</h2>

        <p>{{ $project->description }}</p>

        @if ($project->img)
            <img src="{{ asset('storage/'.$project->img) }}" alt="">
        @endif
    </main>
@endsection