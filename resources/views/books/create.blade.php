@extends('layouts.app')

@section('title', 'Добавяне на книга')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Добавяне на книга</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Заглавие</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="genre">Жанр</label>
            <input type="text" class="form-control @error('genre') is-invalid @enderror"
                   id="genre" name="genre" value="{{ old('genre') }}" required>
            @error('genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="author">Автор</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror"
                   id="author" name="author" value="{{ old('author') }}" required>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Добави</button>
    </form>
</div>
@endsection
