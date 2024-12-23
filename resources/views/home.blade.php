<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriDatos</title>
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
            <a href="/survey" class="hover:underline">Encuestas</a>
            <a href="/admin/statistics" class="hover:underline">Gráficos Estadísticos</a>
            <a href="/proposals" class="hover:underline">Propuestas</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="bg-cover bg-center bg-fixed" style="background-image: url('/images/nubes.png');">
        <div class="py-16 px-6 text-center max-w-4xl mx-auto">
            <h2 class="text-5xl font-bold text-[#0b3f6a] mb-8">Bienvenido a <span class="text-[#2779bd]">NutriDatos</span></h2>
            <div class="text-gray-700 leading-relaxed text-lg">
                <p class="mb-6">
                    Este sistema está diseñado para mejorar el bienestar de los comensales en establecimientos como cafeterías y comedores.
                </p>
                <p class="mb-6">
                    Aquí podrás participar en encuestas, obtener estadísticas basadas en hábitos diarios y recibir recomendaciones saludables.
                </p>
                <p>
                    Los administradores tendrán acceso a información general del grupo poblacional para gestionar datos y generar menús adaptados
                    a las necesidades de su comunidad. Juntos promovemos hábitos más saludables y una mejor calidad de vida.
                </p>
            </div>
        </div>
    </main>

</body>
</html>
