<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriDatos - Propuestas</title>
    <!-- Importar estilos de Vite -->
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
            <a href="{{ route('survey.index') }}" class="hover:underline">Encuestas</a>
            <a href="/stats" class="hover:underline">Gráficos Estadísticos</a>
            <a href="{{ route('proposals.index') }}" class="hover:underline">Propuestas</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="py-16 px-6 text-center">
        <h1 class="text-3xl font-bold text-[#2779bd] mb-8">Propuestas</h1>
        <p class="mb-6 text-gray-700 leading-relaxed">
            Comparte tus ideas y propuestas para mejorar la experiencia.
        </p>

        <!-- Botón para crear propuesta -->
        <a href="{{ route('proposals.create') }}" class="bg-[#2779bd] text-white py-2 px-4 rounded-lg hover:bg-[#1c598a]">
            Crear Propuesta
        </a>
    </main>

</body>
</html>
