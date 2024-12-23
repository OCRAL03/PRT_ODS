<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - NutriDatos</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Contenedor principal -->
    <div class="container mx-auto p-6">
        
        <!-- Barra de navegación -->
        <div class="bg-blue-700 text-white flex justify-between p-4 rounded-md">
            <h1 class="text-xl font-bold">NutriDatos <span class="text-sm">&#x1F4CA;</span></h1>
            <div class="space-x-4">
                <a href="{{ route('logout') }}" class="text-white hover:underline text-lg">Cerrar sesión</a>
            </div>
            <div class="flex gap-6">
                <a href="{{ route('user.index') }}" class="font-semibold hover:underline">Dashboard</a>
                <a href="{{ route('statistics.redirect') }}" class="font-semibold hover:underline">Gráficos Estadísticos</a>
            </div>
        </div>

        <!-- Contenido -->
        <div class="bg-white p-6 rounded-md shadow-md mt-6">
            <h2 class="text-2xl font-bold mb-4">Perfil de Usuario</h2>
            
            <!-- Información del usuario -->
            <div class="mb-4">
                <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Rol:</strong> {{ Auth::user()->role }}</p>
            </div>

            <!-- Formulario para actualizar el perfil -->
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="w-full p-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="w-full p-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Nueva Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full p-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Actualizar Perfil</button>
            </form>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>