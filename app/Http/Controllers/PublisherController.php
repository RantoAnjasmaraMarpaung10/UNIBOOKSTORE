<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        $publishers = Publisher::all();
        $books = Book::all();
        return view('admin.admin', compact('publishers' , 'books'));
    }

    // Menyimpan penerbit baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Publisher::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $publishers = Publisher::all(); 
        $publisher = Publisher::findOrFail($id);
        $books = Book::all();

        return view('admin.admin', compact('publishers', 'publisher', 'books')); 
    }

    public function update(Request $request, Publisher $publisher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $publisher->update($validated);

        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil diperbarui.');
    }


    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('admin.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}
