<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-fixed bg-gray-100" style="background-image: url('/images/nubes.png');">

<!-- Contenedor principal -->
<div class="min-h-screen flex flex-col items-center py-10">

    <!-- Título -->
    <h1 class="text-4xl font-bold text-[#2779bd] mb-8">Encuestas</h1>

    <!-- Formulario -->
    <form action="{{ route('survey.index') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl space-y-6">
        @csrf

        <!-- Datos Personales -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Datos Personales</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Edad:</label>
                    <input type="number" name="age" required class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div>
                    <label class="block text-gray-700">Talla (cm):</label>
                    <input type="number" name="height" required class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div>
                    <label class="block text-gray-700">Peso (kg):</label>
                    <input type="number" name="weight" required class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div>
                    <label class="block text-gray-700">Género:</label>
                    <select name="gender" class="w-full border-gray-300 rounded-lg shadow-sm">
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="other">Prefiero no decirlo</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700">Ocupación:</label>
                    <select name="occupation" class="w-full border-gray-300 rounded-lg shadow-sm">
                        <option value="student">Estudiante</option>
                        <option value="worker">Trabajador</option>
                        <option value="unemployed">Desempleado</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Hábitos Alimenticios -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Hábitos Alimenticios</h2>
            <div class="space-y-4">
                <label class="block text-gray-700">¿Cuántas comidas completas realizas al día?</label>
                <input type="number" name="meals_per_day" required class="w-full border-gray-300 rounded-lg shadow-sm">

                <label class="block text-gray-700">¿Incluyes frutas y verduras?</label>
                <select name="fruits_vegetables" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                    <option value="sometimes">A veces</option>
                </select>

                <label class="block text-gray-700">¿Con qué frecuencia consumes alimentos altos en grasas o azúcares?</label>
                <select name="high_fat_sugar" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="daily">Diariamente</option>
                    <option value="weekly">Varias veces a la semana</option>
                    <option value="occasionally">Ocasionalmente</option>
                    <option value="never">Nunca</option>
                </select>
            </div>
        </div>

        <!-- Hidratación -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Hidratación</h2>
            <label class="block text-gray-700">¿Cuántos vasos de agua consumes al día?</label>
            <select name="water_intake" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="less_4">Menos de 4</option>
                <option value="4_8">Entre 4 y 8</option>
                <option value="more_8">Más de 8</option>
            </select>
        </div>

        <!-- Actividad Física -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Actividad Física</h2>
            <label class="block text-gray-700">¿Realizas actividad física regularmente?</label>
            <select name="exercise_frequency" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="yes">Sí</option>
                <option value="no">No</option>
                <option value="sometimes">A veces</option>
            </select>

            <label class="block text-gray-700 mt-4">¿Cuánto tiempo dedicas a la actividad física cada semana?</label>
            <select name="exercise_time" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="less_30">Menos de 30 minutos</option>
                <option value="30_120">Entre 30 minutos y 2 horas</option>
                <option value="more_120">Más de 2 horas</option>
            </select>
        </div>

        <!-- Sueño -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Sueño</h2>
            <label class="block text-gray-700">¿Cuántas horas duermes en promedio por noche?</label>
            <select name="sleep_hours" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="less_5">Menos de 5</option>
                <option value="5_7">Entre 5 y 7</option>
                <option value="more_7">Más de 7</option>
            </select>
        </div>

        <!-- Preferencias -->
        <div>
            <h2 class="text-xl font-semibold text-[#2779bd] mb-4">Preferencias</h2>
            <label class="block text-gray-700">Aspectos importantes en una comida:</label>
            <select name="important_factors" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="taste">Sabor</option>
                <option value="nutrition">Nutrición</option>
                <option value="price">Precio</option>
                <option value="variety">Variedad</option>
            </select>
        </div>

        <!-- Botón de envío -->
        <div class="text-center">
            <button type="submit" class="bg-[#2779bd] text-white py-2 px-6 rounded-lg hover:bg-[#1c598a]">
                Enviar Encuesta
            </button>
        </div>
    </form>
</div>

</body>
</html>
