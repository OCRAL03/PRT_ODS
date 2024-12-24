<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriDatos - Propuestas</title>
    <!-- Importar estilos de Vite -->
    @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-fixed bg-gray-100" style="background-image: url('/images/nubes.png');">

    <!-- Encabezado superior -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-[#2779bd]">NutriDatos</h1>
            <!-- Botones de usuario -->
            <div class="space-x-4">
                <a href="{{ route('profile') }}" class="text-[#2779bd] hover:underline text-lg">Mi Perfil</a>
                <a href="{{ route('logout') }}" class="text-red-600 hover:underline text-lg">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="bg-[#2779bd] text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-center space-x-16 text-lg">
            <a href="{{ route('survey.index') }}" class="hover:underline">Encuestas</a>
            <a href="/stats" class="hover:underline">Gráficos Estadísticos</a>
            <a href="{{ route('proposals.index') }}" class="hover:underline">Propuestas</a>
        </div>
    </nav>

    <!-- Título de la página -->
    <h1 class="text-3xl font-bold text-center text-[#0b3f6a] my-8">Propuestas</h1>

    <!-- Contenido principal -->
    <main class="py-16 px-6 text-center">
        <p class="mb-6 text-gray-700 leading-relaxed">
            Comparte tus ideas y propuestas para mejorar la experiencia.
        </p>

    <!-- Página de Crear Propuesta -->
    <section class="container mx-auto py-10 max-w-lg">
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
            <div class="flex justify-between">
                <button type="submit" class="bg-[#2779bd] text-white py-2 px-4 rounded-lg hover:bg-[#1c598a]">
                    Enviar Propuesta
                </button>
                <a href="{{ route('proposals.my') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                    Ver Mis Propuestas
                </a>
            </div>
        </form>
    </section>

</body>
</html>
