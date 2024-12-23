<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Importar estilos de Vite -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1>Panel de Administración</h1>
        <a href="{{ route('admin.statistics') }}" class="btn btn-primary">Ver Estadísticas</a>
    </div>
    <!-- Importar scripts de Vite -->
    @vite('resources/js/app.js')
</body>
</html>