@extends('layout.app')

@section('title', 'Pengadaan')

@section('content')

<div class="flex flex-col p-8">
    <h1 class="text-3xl font-bold text-center mb-6">Laporan Pengadaan Buku</h1>
    <div class="overflow-x-auto mb-8">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 border">Nama Buku</th>
                    <th class="px-4 py-2 border">Nama Penerbit</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Status</th> <!-- Tambahkan kolom Status -->
                </tr>
            </thead>
            <tbody>
                @foreach ($lowStockBooks as $book)
                <tr class="text-center border hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $book->title }}</td>
                    <td class="px-4 py-2 border">{{ $book->publisher->name }}</td>
                    <td class="px-4 py-2 border">{{ $book->stock }}</td>
                    <td class="px-4 py-2 border">
                        @if ($book->stock <= 20)
                            <span class="text-orange-500 font-semibold">Perlu di Re-stock</span>
                        @else
                            <span class="text-green-500 font-semibold">Aman</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection
