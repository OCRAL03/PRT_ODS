<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas - NutriDatos</title>
    <!-- Importar estilos de Vite -->
    @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('/images/nubes.png');">
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
            <a href="/admin/statistics" class="hover:underline">Gráficos Estadísticos</a>
            <a href="/proposals" class="hover:underline">Propuestas</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container mx-auto text-center py-16 px-6">
        <h2 class="text-4xl font-bold text-[#2779bd] mb-6">¿Te gustaría llenar una encuesta?</h2>
        <p class="text-lg text-gray-700 mb-4">Inicia sesión como usuario o regístrate</p>
        <div class="mb-6">
            <a href="{{ route('login') }}" class="text-[#2779bd] font-semibold hover:underline text-xl mx-4">Inicia sesión</a>
            <a href="{{ route('register') }}" class="text-[#2779bd] font-semibold hover:underline text-xl mx-4">Regístrate</a>
        </div>
        <p class="text-gray-600 text-lg mb-8">Es muy importante marcar en qué establecimiento acudes regularmente.</p>
        <img src="/images/encuestas.jpg" alt="Encuestas" class="mx-auto max-w-xs sm:max-w-md">
    </main>
</body>
</html>

