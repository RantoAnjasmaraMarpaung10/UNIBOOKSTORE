<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />


    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#f8f9fa] ">
    <div class="flex">
 
        <div class="w-64 min-h-screen bg-gray-800 text-white p-4">
            <h2 class="mt-8 text-2xl font-bold mb-4">UNIBOOKSTRORE</h2>
            <ul class="mt-10">
                <li class="mb-2"><a href="\" class="block p-2 rounded hover:bg-gray-700">Home</a></li>
                <li class="mb-2"><a href="\admin" class="block p-2 rounded hover:bg-gray-700">Admin</a></li>
                <li class="mb-2"><a href="\pengadaan" class="block p-2 rounded hover:bg-gray-700">Pengadaan</a></li>
            </ul>
        </div>


        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>
</body>