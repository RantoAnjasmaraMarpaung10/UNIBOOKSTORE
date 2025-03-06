<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index() {
        $books = Book::all();
        $publishers = Publisher::all();
        return view('admin.admin', compact('books', 'publishers'));
    }

    public function store(Request $request) {
        Book::create($request->all());
        return redirect()->route('admin.index');
    }

    public function update(Request $request, Book $book) {
        $book->update($request->all());
        return redirect()->route('admin.index');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('admin.index');
    }
}
