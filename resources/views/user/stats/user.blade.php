<canvas id="activityChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('activityChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Agua', 'Actividad Física', 'Sueño'],
            datasets: [{
                label: 'Promedios',
                data: [7, 3, 8], // Datos dinámicos desde el backend
                backgroundColor: ['blue', 'green', 'orange']
            }]
        }
    });
</script>