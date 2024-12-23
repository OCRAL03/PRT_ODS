<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Propuestas</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-[#2779bd] mb-6">Mis Propuestas</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de propuestas -->
    <ul class="space-y-4">
        @forelse($proposals as $proposal)
            <li class="border p-4 rounded-lg shadow-md">
                <h2 class="font-bold text-lg">{{ $proposal->title }}</h2>
                <p class="text-gray-700 mt-2">{{ $proposal->description }}</p>
            </li>
        @empty
            <p>No tienes propuestas creadas.</p>
        @endforelse
    </ul>

    <!-- Botón para crear nueva propuesta -->
    <div class="mt-8">
        <a href="{{ route('proposals.create') }}" class="bg-[#2779bd] text-white py-2 px-4 rounded-lg hover:bg-[#1c598a]">
            Crear Nueva Propuesta
        </a>
    </div>
</div>

</body>
</html>
