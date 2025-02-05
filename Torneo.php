<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Participantes</title>
  <style>
    /* Estilos generales */
    /*php -S localhost:8000*/

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
      width: 80%;
      margin: 20px auto;
      background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro semitransparente */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    /* Contenedor para los botones */
    .botones {
      display: flex;
      justify-content: center;  /* Centra los botones */
      align-items: center;      /* Centra verticalmente */
      flex-wrap: wrap;          /* Asegura que los botones se ajusten en pantallas más pequeñas */
      gap: 15px;                /* Espaciado entre los botones */
      margin-bottom: 20px;
    }

    .botones a {
      text-decoration: none;
      background-color: #28a745;
      color: white;
      left: 20px;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 20px;
      transition: background-color 0.3s ease, transform 0.2s;
      display: inline-block;
    }

    .botones a:hover {
      background-color: #218838;
      transform: scale(1.05); /* Efecto de agrandamiento al pasar el ratón */
    }

    .botones a:focus {
      outline: 2px solidrgb(0, 89, 255); /* Añadir un borde visible cuando se hace foco en los botones */
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
      background-color:rgb(0, 114, 190);  /* Cambiar a amarillo */
      color: white;
    }

    tr:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    img {
      border-radius: 50%;
      width: 75px;
      height: 75px;
      object-fit: cover;
    }

    /* Estilos para los botones en la tabla */
    .ver-detalle-btn {
      text-decoration: none;
      background-color:#ffcc00;
      color: black;
      padding: 10px 15px;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .ver-detalle-btn:hover {
      background-color: #218838;
      transform: scale(1.05); /* Efecto de agrandamiento */
    }

    .content {
      text-align: center;
      margin-bottom: 20px;
      background-color: rgba(0, 0, 0, 0.7);
      padding: 20px;
      border-radius: 10px;
      width: 80%;
      margin: auto;
    }

    .content h1 {
      font-size: 36px;
      margin-bottom: 10px;
      color:#ffcc00;  /* Color amarillo */
    }

    .content p {
      font-size: 18px;
      color: white;
    }

    /* Media Queries para hacer la página responsive */
    @media screen and (max-width: 768px) {
      .container {
        width: 90%;
      }

      .content h1 {
        font-size: 28px;
      }

      .content p {
        font-size: 16px;
      }
    }

  </style>
</head>
<body>
  <div class="content">
    <h1>Bienvenidos al Sistema de Gestión del Torneo de Guerreros Z</h1>
    <p>¡Regístrate para participar en la competencia más grande de artes marciales!</p>
  </div>

  <div class="container">
    <!-- Contenedor de botones -->
    <div class="botones">
      <a href="Registro.php" title="Registra tu participación en el torneo">Registrar participante</a>
      <a href="panel.php" title="Ver estadísticas del torneo">Panel de estadísticas</a>
    </div>

    <!-- Tabla de participantes -->
    <table>
      <thead>
        <tr>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Edad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
    
      <?php
        // Incluir el archivo donde está definida la función listar_registros()
        include 'componentes.php';
        include 'clases.php';

        // Obtener los datos de los participantes
        $datos = listar_registros(); // Ejecutar la función antes del foreach
      ?>

      <?php 
      foreach($datos as $Peleador) {
          echo "
          <tr>
              <td><img src='{$Peleador->foto}' alt='{$Peleador->nombre}' width='50' height= '50'></td>
              <td>{$Peleador->nombre} {$Peleador->apellido}</td>
              <td>{$Peleador->edad()}</td>
              <td><a href='detalles.php?codigo={$Peleador->identificacion}' class='ver-detalle-btn'>Ver detalles</a></td>
          </tr>";
      }
      ?>

      </tbody>
    </table>
  </div>
</body>
</html>
