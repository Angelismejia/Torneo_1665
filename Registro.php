<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Participantes</title>
  <style>
    /* Estilos generales */
    /* http://localhost:8000/panel.php */

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
    }

    h2 {
      text-align: center;
      color: #ffcc00;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      font-size: 16px;
    }

    .botones {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .boton {
      padding: 10px;
      width: 48%;
      text-align: center;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
    }

    .guardar {
      background-color: #28a745;
      color: white;
    }

    .guardar:hover {
      background-color: #218838;
    }

    .atras {
      background-color: #dc3545;
      color: white;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      line-height: 40px;
    }

    .atras:hover {
      background-color: #c82333;
    }

  </style>
</head>
<body>

<div class="container">
  <h2>Registro de Participantes</h2>
  <form method="post" action="guardar.php">
    <?php
      echo my_input("identificacion", "Identificación", "", ["required" => true]);
      echo my_input("nombre", "Nombre", "", ["required" => true]);
      echo my_input("apellido", "Apellido", "", ["required" => true]);
      echo my_input("fecha_nacimiento", "Fecha de nacimiento", "", ["type" => "date", "required" => true]);
      echo my_input("foto", "Foto (URL)", "", ["type" => "url", "required" => true]);
    ?>

 <h2>Registro de Habilidades</h2>
    <?php
     echo my_input("habilidades", "Habilidades", "", ["required" => true]);
     echo my_input("tipo", "Tipo", "", ["required" => true]);
     echo my_input("nivel", "Nivel", "", ["required" => true]);
    ?>
    <div class="botones">
      <button type="submit" class="boton guardar">Guardar</button>
      <a href="Torneo.php" class="boton atras">Atrás</a>
    </div>
  </form>
</div>

<?php
function my_input($nombre, $label, $valor = "", $opciones = []) {
    $tipo = isset($opciones["type"]) ? $opciones["type"] : "text";
    $required = isset($opciones["required"]) && $opciones["required"] ? "required" : "";
    ?>
    <div class="form-group">
        <label for="<?= htmlspecialchars($nombre) ?>"><?= htmlspecialchars($label) ?>:</label>
        <input type="<?= $tipo ?>" value="<?= htmlspecialchars($valor) ?>" name="<?= htmlspecialchars($nombre) ?>" id="<?= htmlspecialchars($nombre) ?>" <?= $required ?>>
    </div>
    <?php
}
?>

</body>
</html>
