@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1 class="my-5">New Project</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action=" {{ route('admin.projects.store') }} " method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value=" {{ old('title') }}">
                @error('title')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <select name="type_id" class="form-select" aria-label="Default select example">
                    <option value="">Seleziona un tipo</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}" @if (old('type_id') === $type->id) selected @endif>{{$type->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"> {{ old('description') }} </textarea>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Data di Inizio</label>
                <input name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" value=" {{ old('start_date') }}">
                @error('start_date')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Data di Fine</label>
                <input name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" value=" {{ old('end_date') }}">
                @error('end_date')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Stato</label>
                <input name="status" type="text" class="form-control @error('status') is-invalid @enderror" id="status" value=" {{ old('status') }}">
                @error('status')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_url" class="form-label">URL Progetto</label>
                <input name="project_url" type="text" class="form-control @error('project_url') is-invalid @enderror" id="project_url" value=" {{ old('project_url') }}">
                @error('project_url')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="technologies" class="form-label">Tecnologie</label>
                <input name="technologies" type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" value=" {{ old('technologies') }}">
                @error('technologies')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection



