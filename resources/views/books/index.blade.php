@extends('layouts.app')

@section('title', 'Списък с книги')

@section('content')
<h1>Списък с книги</h1>
<table>
    <thead>
        <tr>
            <th class="cell">Заглавие</th>
            <th class="cell">Автор</th>
            <th class="cell">Жанр</th>
            <th class="cell">Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td class="cell">{{ $book->title }}</td>
                <td class="cell">{{ $book->author }}</td>
                <td class="cell">{{ $book->genre }}</td>
                <td class="cell">
                    <a href="{{ route('books.show', $book->id) }}" class="btn-view">Преглед</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Редактиране</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Сигурни ли сте, че искате да изтриете тази книга?')">Изтриване</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
