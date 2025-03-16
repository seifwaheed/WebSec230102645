<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Show all books (only for authenticated users)
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show form to create a book
    public function create()
    {
        return view('books.create');
    }

    // Store a new book in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // Show a single book
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Show form to edit a book
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update book details
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4'
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
