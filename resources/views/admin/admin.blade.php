    @extends('layout.app')

    @section('title', 'Admin')

    @section('content')
    <div class="flex flex-col p-8">

        <h1 class="text-3xl font-bold text-center mb-6">Penerbit</h1>
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4" id="form-title">Tambah Penerbit</h2>
            <form id="publisher-form" method="POST" action="{{ route('publishers.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                <input type="hidden" name="publisher_id" id="publisher-id" value="">
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="name" id="publisher-name" placeholder="Nama Penerbit" class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="address" id="publisher-address" placeholder="Alamat" class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="city" id="publisher-city" placeholder="Kota" class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="phone" id="publisher-phone" placeholder="Telepon" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <button type="submit" id="submit-button" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg">Tambah</button>
            </form>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-2 border">ID Penerbit</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Alamat</th>
                        <th class="px-4 py-2 border">Kota</th>
                        <th class="px-4 py-2 border">Telepon</th>
                        <th class="px-4 py-2 border">Aksi</th>
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
                        <td class="px-4 py-2 border">
                            <button onclick="editPublisher({{ $publisher }})" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h1 class="mt-10 text-3xl font-bold text-center mb-6">Kelola Data Buku</h1>
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-4" id="form-title-book">Tambah Buku</h2>
            <form id="book-form" method="POST" action="{{ route('books.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method-book" value="POST">
                <input type="hidden" name="book_id" id="book-id" value="">
                <div class="grid grid-cols-2 gap-4">
                    {{-- <input type="text" name="id" id="book-id-input" placeholder="ID Buku" class="w-full px-4 py-2 border rounded-lg"> --}}
                    <input type="text" name="category" id="book-category" placeholder="Kategori" class="w-full px-4 py-2 border rounded-lg">
                    <input type="text" name="title" id="book-title" placeholder="Nama Buku" class="w-full px-4 py-2 border rounded-lg">
                    <input type="number" name="price" id="book-price" placeholder="Harga" class="w-full px-4 py-2 border rounded-lg" min="1">
                    <input type="number" name="stock" id="book-stock" placeholder="Stok" class="w-full px-4 py-2 border rounded-lg" min="1">
                    <select name="publisher_id" id="book-publisher" class="w-full px-4 py-2 border rounded-lg">
                        <option value="">Pilih Penerbit</option>
                        @foreach ($publishers as $publisherBook)
                            <option value="{{ $publisherBook->id }}">{{ $publisherBook->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" id="submit-button-book" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg">Tambah</button>
            </form>
            
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
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr class="text-center border hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $book->id }}</td>
                        <td class="px-4 py-2 border">{{ $book->category }}</td>
                        <td class="px-4 py-2 border">{{ $book->title }}</td>
                        <td class="px-4 py-2 border">Rp. {{ number_format($book->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border">{{ $book->stock }}</td>
                        <td class="px-4 py-2 border">{{ $book->publisher->name }}</td>
                        <td class="px-4 py-2 border">
                            <button onclick="editBook({{ $book }})" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function editBook(book) {
        document.getElementById('form-title-book').innerText = 'Edit Buku';
        document.getElementById('book-form').action = `/books/${book.id}`;
        document.getElementById('form-method-book').value = 'PUT';
        document.getElementById('book-id').value = book.id;
        document.getElementById('book-category').value = book.category;
        document.getElementById('book-title').value = book.title;
        document.getElementById('book-price').value = book.price;
        document.getElementById('book-stock').value = book.stock;
        document.getElementById('book-publisher').value = book.publisher_id;
        document.getElementById('submit-button-book').innerText = 'Update';
        document.getElementById('submit-button-book').classList.remove('bg-blue-600');
        document.getElementById('submit-button-book').classList.add('bg-green-600');
        }
        
        function editPublisher(publisher) {
        document.getElementById('form-title').innerText = 'Edit Publisher';
        document.getElementById('publisher-form').action = `/publishers/${publisher.id}`;
        document.getElementById('form-method').value = 'PUT';
        document.getElementById('publisher-name').value = publisher.name;
        document.getElementById('publisher-address').value = publisher.address;
        document.getElementById('publisher-city').value = publisher.city;
        document.getElementById('publisher-phone').value = publisher.phone;
        document.getElementById('submit-button').innerText = 'Update';
        document.getElementById('submit-button').classList.remove('bg-blue-600');
        document.getElementById('submit-button').classList.add('bg-green-600');
        }

    </script>
    @endsection
