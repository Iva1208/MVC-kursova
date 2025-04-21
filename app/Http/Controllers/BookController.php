<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Показване на всички книги
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Показване на формата за добавяне на книга
    public function create()
    {
        return view('books.create');
    }

    public function edit($id)
{
    $book = \App\Models\Book::findOrFail($id);
    return view('books.edit', compact('book'));
}

    public function show($id)
{
    $book = \App\Models\Book::findOrFail($id);
    return view('books.show', compact('book'));
}


    public function destroy($id)
{
    $book = \App\Models\Book::findOrFail($id);
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Книгата беше изтрита успешно!');
}

    // Запазване на нова книга
    public function store(Request $request)
    {
        // Валидация
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'author' => 'required|string|max:255',
        ]);

        // Създаване
        Book::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'author' => $request->author,
        ]);

        return redirect()->route('books.create')->with('success', 'Книгата беше добавена успешно!');
    }
}
