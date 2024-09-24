@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if (session('created'))
            <div class="alert alert-success" role="alert">
                {{ session('created') }}
            </div>
        @endif
        @if (session('edited'))
            <div class="alert alert-success" role="alert">
                {{ session('edited') }}
            </div>
        @endif
        <h1>
            {{ $project->title }}
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare {{$project->title}}?')">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </h1>

        @if ($project->technologies)
            <h5 class="mx-4"> {{ $project->technologies }} </h5>
        @endif

        <ul class="list-group list-group-flush m-3">
            @if ($project->type)
                <li class="list-group-item">
                    <strong>Categoria: </strong>
                    <span> {{ $project->type->name }} </span>
                </li>
            @endif
            <li class="list-group-item">
                <strong>Data di Inizio: </strong>
                <span> {{ ($project->start_date)->format('d/m/Y') }} </span>
            </li>
            @if ($project->end_date)
                <li class="list-group-item">
                    <strong>Data di Fine: </strong>
                    <span> {{ ($project->end_date)->format('d/m/Y') }} </span>
                </li>
            @endif
            <li class="list-group-item">
                <strong>Stato: </strong>
                <span> {{ $project->status }} </span>
            </li>
            @if ($project->project_url)
                <li class="list-group-item">
                    <a href="{{ $project->project_url }}">Link Progetto</a>
                </li>
            @endif
        </ul>

        <h3>Descrizione</h3>
        <p class="m-4">
            {{ $project->description }}
        </p>

        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
            Tutti i Progetti
        </a>
    </div>
@endsection
