<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index()
    {
       
        $lowStockBooks = Book::with('publisher')
            ->orderBy('stock', 'asc')
            ->get();

        return view('public.pengadaan', compact('lowStockBooks'));
    }
}
