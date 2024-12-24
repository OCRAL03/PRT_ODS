<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NutriDatos</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

    <!-- Encabezado superior -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#2779bd]">NutriDatos</h1>
            <div class="space-x-4">
                <a href="{{ route('logout') }}" class="text-[#2779bd] hover:underline text-lg">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <!-- Navegación -->
    <nav class="bg-[#2779bd] text-white py-4 shadow-md">
        <div class="mx-auto flex justify-center space-x-16 text-lg">
            <a href="{{ route('user.profile') }}" class="hover:underline">Mi Perfil</a>
            <a href="{{ route('statistics.redirect') }}" class="hover:underline">Gráficos Estadísticos</a>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">

        <!-- Contenido -->
        <div class="mt-6 grid grid-cols-2 gap-6">

            <!-- Panel Izquierdo -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <div class="flex items-center gap-4 mb-4">
                    <a href="{{ route('survey.formulario') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Responde la encuesta
                    </a>
                    <a href="{{ route('survey.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded">
                        Editar
                    </a>
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                </div>
                <div class="border p-4 rounded-md h-80 overflow-y-auto text-gray-500">
                    <!-- Aquí se mostrarán las respuestas de la encuesta -->
                    @foreach($userSurveys as $survey)
                        <p>{{ $survey->question }}: {{ $survey->answer }}</p>
                    @endforeach
                </div>
            </div>

            <!-- Panel Derecho -->
            <div class="bg-white p-6 rounded-md shadow-md">
                <h2 class="text-lg font-semibold mb-4">Gráficos Estadísticos</h2>
                <div>
                    <!-- Gráfico -->
                    <canvas id="activityChart" class="mb-4"></canvas>
                </div>
                <div class="text-gray-700">
                    <p>Promedio de horas de sueño: <strong>7 hrs</strong></p>
                    <p>Nivel de actividad física promedio: <strong>3 sesiones</strong></p>
                    <p>Promedio de hidratación diaria: <strong>8 vasos</strong></p>
                    <p class="text-red-500 mt-2">IMC: 24.8 <span class="text-sm">(Normal)</span></p>
                </div>
            </div>
        </div>

        <!-- Botón de recomendaciones -->
        <div class="mt-6 flex justify-end">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded">
                Recomendaciones
            </button>
        </div>

        <!-- Botón para eliminar cuenta -->
        <div class="mt-6 flex justify-end">
            <form action="{{ route('user.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded">
                    Eliminar Cuenta
                </button>
            </form>
        </div>

    </div>

    <!-- Gráfico con Chart.js -->
    <script>
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lt. Agua', 'Act. Física', 'H. Sueño'],
                datasets: [{
                    label: 'Promedios',
                    data: [8, 3, 7], // Datos dinámicos desde el backend
                    backgroundColor: ['yellow', 'green', 'orange']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
