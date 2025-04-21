@extends('layouts.app')

@section('title', 'Добре дошли')

@section('content')
<div class="welcome-container">
    <h1>Добре дошли в нашето приложение за книги!</h1>
    <p>Прегледайте и добавяйте книги в нашата база данни.</p>
    <a href="{{ route('books.index') }}" class="btn-start">Започнете тук</a>
</div>
@endsection
