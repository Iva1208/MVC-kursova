@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<div class="container">
    <h2>Вход</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Имейл</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Парола</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Запомни ме</label>
        </div>

        <button type="submit" class="btn btn-primary">Вход</button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">Забравена парола?</a>
        @endif
    </form>
</div>
@endsection
