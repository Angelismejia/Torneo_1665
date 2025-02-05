<?php
include 'componentes.php';
include 'clases.php';

/// http://localhost:8000/panel.php

// Obtener los datos de los participantes
$datos = listar_registros(); // Ejecutar la función antes del foreach

// Función para obtener el signo zodiacal basado en la fecha de nacimiento
function obtener_signo_zodiacal($fecha_nacimiento) {
    $mes = date('m', strtotime($fecha_nacimiento));
    $dia = date('d', strtotime($fecha_nacimiento));

    if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) {
        return 'Aries';
    } elseif (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) {
        return 'Tauro';
    } elseif (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
        return 'Géminis';
    } elseif (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) {
        return 'Cáncer';
    } elseif (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
        return 'Leo';
    } elseif (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
        return 'Virgo';
    } elseif (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) {
        return 'Libra';
    } elseif (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) {
        return 'Escorpio';
    } elseif (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) {
        return 'Sagitario';
    } elseif (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19)) {
        return 'Capricornio';
    } elseif (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) {
        return 'Acuario';
    } elseif (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
        return 'Piscis';
    }
    return '';
}

// Inicializar los contadores para cada signo zodiacal
$signos_zodiacales = [
    'Aries' => 0,
    'Tauro' => 0,
    'Géminis' => 0,
    'Cáncer' => 0,
    'Leo' => 0,
    'Virgo' => 0,
    'Libra' => 0,
    'Escorpio' => 0,
    'Sagitario' => 0,
    'Capricornio' => 0,
    'Acuario' => 0,
    'Piscis' => 0,
];

// Contar los participantes por signo zodiacal
foreach ($datos as $guerrero) {
    // Acceder a las propiedades del objeto usando la sintaxis -> en lugar de []
    $signo = obtener_signo_zodiacal($guerrero->fecha_nacimiento);
    if (array_key_exists($signo, $signos_zodiacales)) {
        $signos_zodiacales[$signo]++;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Estadísticas</title>
  <style>
    /* Estilos generales */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url('https://th.bing.com/th/id/R.38453a6d6faf8b4d28add658f4bc3bfb?rik=9bTfIbpmIEqp6w&riu=http%3a%2f%2fwww.relxelf.com%2fcdn%2fshop%2fcollections%2f7ec60b49df8541ebef4266ec4216a397.jpg%3fv%3d1578749113&ehk=RAyCyLoWghmBELEgXAnsl1yCvbqrNGdgUcmAT5Yws%2bg%3d&risl=&pid=ImgRaw&r=0') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro semitransparente */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    h1 {
      text-align: center;
      color: #ffcc00;
    }

    /* Datos fuera de la tabla */
    .stats, .stats-table {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .stats p {
      font-size: 18px;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      color: white;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: rgb(0, 114, 190); /* Azul */
      color: white;
    }

    tr:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Estilo del botón */
    .volver-btn {
      text-decoration: none;
      background-color: #ffcc00;
      color: black;
      padding: 12px 25px;
      border-radius: 5px;
      font-size: 18px;
      font-weight: bold;
      display: block;
      width: 300px;
      margin: 20px auto;
      text-align: center;
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .volver-btn:hover {
      background-color: #218838;
      transform: scale(1.05); /* Efecto de agrandamiento */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Panel de Estadísticas 📊</h1>

    <!-- Tabla de Datos -->
    <div class="stats-table">
      <table>
        <tr>
          <th>Estadísticas</th>
          <th>Valor</th>
        </tr>
        <tr>
          <td>Cantidad total de guerreros registrados:</td>
          <td><?= count($datos) ?></td>
        </tr>
        <tr>
          <td>Cantidad total de habilidades registradas:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Promedio de habilidades por guerrero:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Edad promedio de los guerreros:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>Nivel de poder promedio de las habilidades:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>La habilidad más poderosa:</td>
          <td>El poder de la amistad</td>
        </tr>
        <tr>
          <td>La habilidad menos poderosa:</td>
          <td>Ninguna</td>
        </tr>
      </table>
    </div>
    

    <!-- Tabla de Guerreros por Signo Zodiacal -->
    <div class="stats-table">
      <table>
        <tr>
          <th>Signo Zodiacal</th>
          <th>Guerreros Registrados</th>
        </tr>
        <?php foreach ($signos_zodiacales as $signo => $cantidad): ?>
        <tr>
          <td><?= $signo ?></td>
          <td><?= $cantidad ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <!-- Botón para volver atrás -->
    <a href="Torneo.php" class="volver-btn">Volver Atrás</a>
  </div>
</body>
</html>
