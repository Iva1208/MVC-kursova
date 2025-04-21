@extends('layouts.app')

@section('title', 'Преглед на книга')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>{{ $book->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Автор:</strong> {{ $book->author }}</p>
            <p><strong>Жанр:</strong> {{ $book->genre }}</p>
            <p>{{ $book->description }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Назад към списъка с книги</a>
        </div>
    </div>
</div>
@endsection
