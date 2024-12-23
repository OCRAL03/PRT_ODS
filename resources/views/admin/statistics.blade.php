<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas Globales</title>
    <!-- Importar estilos de Vite -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Estadísticas Globales</h1>

        <!-- Promedio de Edad -->
        <div class="mb-5">
            <h2 class="text-lg font-bold">Promedio de Edad</h2>
            <p class="text-gray-700 text-md">{{ $ageStat->statistic_value }} años</p>
        </div>

        <!-- Gráfico de Porcentaje de Género -->
        <div class="mb-5">
            <h2 class="text-lg font-bold">Porcentaje de Género</h2>
            <canvas id="genderChart" class="w-full h-96"></canvas>
        </div>

        <!-- Gráfico de Consumo de Frutas y Verduras -->
        <div class="mb-5">
            <h2 class="text-lg font-bold">Consumo de Frutas y Verduras</h2>
            <canvas id="fruitsChart" class="w-full h-96"></canvas>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Importar scripts de Vite -->
    @vite('resources/js/app.js')

    <script>
        // Gráfico de Porcentaje de Género
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: @json($genderStats->pluck('statistic_name')->map(fn($name) => str_replace('Porcentaje Género: ', '', $name))),
                datasets: [{
                    label: 'Porcentaje de Género',
                    data: @json($genderStats->pluck('statistic_value')),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], // Colores para cada género
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });

        // Gráfico de Consumo de Frutas y Verduras
        const fruitsCtx = document.getElementById('fruitsChart').getContext('2d');
        new Chart(fruitsCtx, {
            type: 'bar',
            data: {
                labels: @json($fruitsStats->pluck('statistic_name')->map(fn($name) => str_replace('Consumo de Frutas: ', '', $name))),
                datasets: [{
                    label: 'Frecuencia de Consumo',
                    data: @json($fruitsStats->pluck('statistic_value')),
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336', '#2196F3'], // Colores para las barras
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Categorías'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
    </script>
</body>
</html>