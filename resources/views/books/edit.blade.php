@extends('layouts.app')

@section('title', 'Редактиране на книга')

@section('content')
<div class="container mt-4">
    <h2>Редактиране на книга</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Заглавие</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>

        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>

        <div class="form-group">
            <label for="genre">Жанр</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Запази промените</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Отказ</a>
    </form>
</div>
@endsection
