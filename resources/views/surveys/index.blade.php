<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<body>
    <h1>Survey</h1>
    <form action="{{ route('survey.store') }}" method="POST">
        @csrf
        <!-- Datos Personales -->
        <label>Edad:</label>
        <input type="number" name="age" required>

        <label>Talla (cm):</label>
        <input type="number" name="height" required>

        <label>Peso (kg):</label>
        <input type="number" name="weight" required>

        <label>Género:</label>
        <select name="gender">
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
            <option value="other">Prefiero no decirlo</option>
        </select>

        <label>Ocupación:</label>
        <select name="occupation">
            <option value="student">Estudiante</option>
            <option value="worker">Trabajador</option>
            <option value="unemployed">Desempleado</option>
            <option value="other">Otro</option>
        </select>

        <!-- Hábitos Alimenticios -->
        <label>¿Cuántas comidas completas realizas al día?</label>
        <input type="number" name="meals_per_day" required>

        <label>¿Incluyes frutas y verduras?</label>
        <select name="fruits_vegetables">
            <option value="yes">Sí</option>
            <option value="no">No</option>
            <option value="sometimes">A veces</option>
        </select>

        <label>¿Con qué frecuencia consumes alimentos altos en grasas o azúcares?</label>
        <select name="high_fat_sugar">
            <option value="daily">Diariamente</option>
            <option value="weekly">Varias veces a la semana</option>
            <option value="occasionally">Ocasionalmente</option>
            <option value="never">Nunca</option>
        </select>

        <!-- Hábitos de Hidratación -->
        <label>¿Cuántos vasos de agua consumes al día?</label>
        <select name="water_intake">
            <option value="less_4">Menos de 4</option>
            <option value="4_8">Entre 4 y 8</option>
            <option value="more_8">Más de 8</option>
        </select>

        <!-- Actividad Física -->
        <label>¿Realizas actividad física regularmente?</label>
        <select name="exercise_frequency">
            <option value="yes">Sí</option>
            <option value="no">No</option>
            <option value="sometimes">A veces</option>
        </select>

        <label>Si respondiste "Sí" o "A veces", ¿cuánto tiempo dedicas a la actividad física cada semana?</label>
        <select name="exercise_time">
            <option value="less_30">Menos de 30 minutos</option>
            <option value="30_120">Entre 30 minutos y 2 horas</option>
            <option value="more_120">Más de 2 horas</option>
        </select>

        <!-- Hábitos de Sueño -->
        <label>¿Cuántas horas duermes en promedio por noche?</label>
        <select name="sleep_hours">
            <option value="less_5">Menos de 5</option>
            <option value="5_7">Entre 5 y 7</option>
            <option value="more_7">Más de 7</option>
        </select>

        <label>¿Sientes que la calidad de tu sueño es adecuada?</label>
        <select name="sleep_quality">
            <option value="yes">Sí</option>
            <option value="no">No</option>
            <option value="sometimes">A veces</option>
        </select>

        <!-- Preferencias y Percepción -->
        <label>¿Qué aspectos consideras más importantes en una comida servida en un comedor?</label>
        <select name="important_factors">
            <option value="taste">Sabor</option>
            <option value="nutrition">Nutrición</option>
            <option value="price">Precio</option>
            <option value="variety">Variedad</option>
        </select>

        <label>¿Qué recomendaciones de salud te gustaría recibir?</label>
        <select name="health_recommendations">
            <option value="nutrition">Alimentación</option>
            <option value="physical_activity">Actividad física</option>
            <option value="sleep_habits">Hábitos de sueño</option>
            <option value="other">Otro</option>
        </select>

        <!-- Enviar -->
        <button type="submit">Enviar Encuesta</button>
    </form>
</body>
</html>