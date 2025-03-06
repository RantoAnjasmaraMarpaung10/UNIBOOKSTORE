@extends('layout.app')

@section('title', 'Home')

@section('content')

<div class="flex flex-col p-8">
    <h1 class="text-3xl font-bold text-center mb-6">Daftar Buku</h1>
    
    <div class="mb-4">
        <input type="text" id="search" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200" placeholder="Cari Nama Buku...">
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 border">ID Buku</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Nama Buku</th>
                    <th class="px-4 py-2 border">Harga</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Penerbit</th>
                </tr>
            </thead>
            <tbody id="bookTable">
                @foreach ($books as $book)
                <tr class="text-center border hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $book->id }}</td>
                    <td class="px-4 py-2 border">{{ $book->category }}</td>
                    <td class="px-4 py-2 border">{{ $book->title }}</td>
                    <td class="px-4 py-2 border">Rp. {{ number_format($book->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">{{ $book->stock }}</td>
                    <td class="px-4 py-2 border">{{ $book->publisher->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h1 class="mt-10 text-3xl font-bold text-center mb-6">Penerbit</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 border">ID Penerbit</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Kota</th>
                    <th class="px-4 py-2 border">Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                <tr class="text-center border hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $publisher->id }}</td>
                    <td class="px-4 py-2 border">{{ $publisher->name }}</td>
                    <td class="px-4 py-2 border">{{ $publisher->address }}</td>
                    <td class="px-4 py-2 border">{{ $publisher->city }}</td>
                    <td class="px-4 py-2 border">{{ $publisher->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        let searchValue = this.value.toLowerCase();
        let rows = document.querySelectorAll('#bookTable tr');
        
        rows.forEach(row => {
            let title = row.children[2].innerText.toLowerCase();
            if (title.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
