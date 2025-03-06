<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller {
    public function index()
    {
        $books = Book::with('publisher')->get();
        $publishers = Publisher::all();
        return view('public.index', compact('books', 'publishers'));
    }

    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        Book::create([
            'category' => $request->category,
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock,
            'publisher_id' => $request->publisher_id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $publishers = Publisher::all();
        $books = Book::with('publisher')->get();
        return view('admin.admin', compact('book', 'books', 'publishers'));
    }

    public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'category' => 'required|string',
        'title' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'publisher_id' => 'required|exists:publishers,id',
    ]);

    $book->update($validated);

    return redirect()->route('admin.index')->with('success', 'Buku berhasil diperbarui');
}

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.index')->with('success', 'Buku berhasil dihapus!');
    }
}
