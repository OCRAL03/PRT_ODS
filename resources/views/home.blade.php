<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriDatos</title>
    @vite('resources/css/app.css') <!-- Enlace a los estilos Tailwind -->
</head>
<body class="bg-cover py-6 bg-center bg-fixed" style="background-image: url('/images/nubes.png');">
    <!-- Navegación -->
    <header class="bg-[#2779bd] text-black py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="font-bold text-xl">NutriDatos</div>
            <nav>
                <ul class="flex space-x-8">
                    <li><a href="/survey" class="hover:underline">Encuestas</a></li>
                    <li><a href="/stats" class="hover:underline">Gráficos Estadísticos</a></li>
                    <li><a href="/proposals" class="hover:underline">Propuestas</a></li>
                </ul>
            </nav>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-black hover:underline">Inicia sesión</a>
                <a href="{{ route('register') }}" class="text-black hover:underline">Regístrate</a>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="relative py-6 px-6 text-center">
        <!-- Encabezado -->
        <h1 class="text-9xl font-bold text-xl text-[#0b3f6a] mb-8">Bienvenido a NutriDatos</h1>

        <!-- Texto descriptivo -->
        <div class="text-gray-700 leading-relaxed max-w-9xl mx-auto">
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
    </main>
</body>
</html>
