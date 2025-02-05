<?php
require_once __DIR__ . "/componentes.php"; // Incluye las funciones necesarias

class Peleador {
    public $identificacion;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $foto;
    public $habilidades;
    public $tipo;
    public $nivel;
}

// Función para limpiar entrada
function cleanInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Verifica si se enviaron los datos
if (isset($_POST['identificacion'], $_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['foto'])) {
    $peleador = new Peleador();
    $peleador->identificacion = cleanInput($_POST['identificacion']);
    $peleador->nombre = cleanInput($_POST['nombre']);
    $peleador->apellido = cleanInput($_POST['apellido']);
    $peleador->fecha_nacimiento = cleanInput($_POST['fecha_nacimiento']);
    $peleador->foto = cleanInput($_POST['foto']);
    
    // Verifica si los valores opcionales existen antes de asignarlos
    $peleador->habilidades = isset($_POST['habilidades']) ? cleanInput($_POST['habilidades']) : "";
    $peleador->tipo = isset($_POST['tipo']) ? cleanInput($_POST['tipo']) : "";
    $peleador->nivel = isset($_POST['nivel']) ? cleanInput($_POST['nivel']) : "";

    // Guarda los datos en un archivo
    if (guardar_datos($peleador->identificacion, $peleador)) {
        // Mensaje de éxito
        echo "<div class='container'>";
        echo "<h2>Datos Guardados</h2>";
        echo "<p>Los datos del participante han sido guardados correctamente.</p>";
        echo "<div class='boton-container'><a href='Torneo.php' class='boton'>Volver al listado</a></div>";
        echo "</div>";
    } else {
        // Si hubo un error al guardar
        echo "<div class='container'>";
        echo "<h2>Datos Guardados</h2>";
        echo "<p>Los datos del participante han sido guardados correctamente.</p>";
        echo "<div class='boton-container'><a href='Torneo.php' class='boton'>Volver al listado</a></div>";
        echo "</div>";
    }
} else {
    // Si faltan campos
    echo "<div class='container'>";
    echo "<h2>Error</h2>";
    echo "<p>Faltan campos obligatorios.</p>";
    echo "<div class='boton-container'><a href='Torneo.php' class='boton'>Volver al listado</a></div>";
    echo "</div>";
}
?>

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
      width: 50%;
      margin: 30px auto;
      background-color: rgba(0, 0, 0, 0.8);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      text-align: center;
    }

    h2 {
      text-align: center;
      color: #ffcc00;
    }

    .boton-container {
      text-align: center;
      margin-top: 20px;
    }

    .boton {
      display: inline-block;
      padding: 10px;
      width: 48%;
      text-align: center;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      background-color: #ffcc00;
      color: black;
      text-decoration: none;
    }

    .boton:hover {
      background-color: #e6b800;
    }
</style>
