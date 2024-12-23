<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriDatos - Crear Propuesta</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    <!-- Encabezado superior -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-[#2779bd]">NutriDatos</h1>
            <!-- Enlaces de sesión -->
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-[#2779bd] hover:underline text-lg">Inicia sesión</a>
                <a href="{{ route('register') }}" class="text-[#2779bd] hover:underline text-lg">Regístrate</a>
            </div>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="bg-[#2779bd] text-white py-4 shadow-md">
        <div class="mx-auto flex justify-center space-x-16 text-lg">
            <a href="/survey" class="hover:underline">Encuestas</a>
            <a href="/stats" class="hover:underline">Gráficos Estadísticos</a>
            <a href="/proposals" class="hover:underline">Propuestas</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto py-10 max-w-lg">
        <h1 class="text-3xl font-bold text-[#2779bd] mb-6">Crear Propuesta</h1>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('proposals.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-left font-medium text-gray-700">Título</label>
                <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>
            <div>
                <label for="description" class="block text-left font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" class="w-full border-gray-300 rounded-lg shadow-sm" required></textarea>
            </div>
            <button type="submit" class="bg-[#2779bd] text-white py-2 px-4 rounded-lg hover:bg-[#1c598a]">
                Enviar Propuesta
            </button>
        </form>
    </div>

</body>
</html>
