<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
    <!-- Importar estilos de Vite -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1>¿Te gustaría llenar una encuesta?</h1>
        <p>Inicia sesión para comenzar.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
    </div>
    <!-- Importar scripts de Vite -->
    @vite('resources/js/app.js')
</body>
</html>