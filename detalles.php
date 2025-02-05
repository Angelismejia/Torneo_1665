<?php 
// Incluir el archivo donde está definida la función cargar_datos()
include 'componentes.php';
include 'clases.php';

// Obtener el código (identificación) desde el parámetro URL
$codigo = $_GET['codigo']; 

// Cargar los datos del peleador con el código proporcionado
$Peleador = cargar_datos($codigo); // Cargar los datos del archivo correspondiente

// Verificar si el peleador existe
if ($Peleador === false) {
    echo "Peleador no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Peleador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://th.bing.com/th/id/R.38453a6d6faf8b4d28add658f4bc3bfb?rik=9bTfIbpmIEqp6w&riu=http%3a%2f%2fwww.relxelf.com%2fcdn%2fshop%2fcollections%2f7ec60b49df8541ebef4266ec4216a397.jpg%3fv%3d1578749113&ehk=RAyCyLoWghmBELEgXAnsl1yCvbqrNGdgUcmAT5Yws%2bg%3d&risl=&pid=ImgRaw&r=0') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .detalles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .detalles .item {
            margin-bottom: 15px;
            font-size: 18px;
            width: 48%; /* Adjust width for better spacing */
            box-sizing: border-box;
        }

        img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .botones a {
            display: inline-block;
            padding: 10px 20px;
            background-color:#ffcc00; 
            color: black;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .botones a:hover {
            background-color: #ffcc00; 
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detalles del Peleador: <?= $Peleador->nombre ?> <?= $Peleador->apellido ?></h1>

    <div class="item">
            <strong>Foto:</strong> <img src="<?= $Peleador->foto ?>" alt="<?= $Peleador->nombre ?>">
        </div>
        
    <div class="detalles">
        <div class="item">
            
            <strong>Nombre:</strong> <?= $Peleador->nombre ?> <?= $Peleador->apellido ?>
        </div>
        <div class="item">
            <strong>Edad:</strong> <?= $Peleador->edad() ?>
        </div>
        <div class="item">
            <strong>Fecha de Nacimiento:</strong> <?= $Peleador->fecha_nacimiento ?>
        </div>
        <div class="item">
            <strong>Habilidades:</strong> <?= $Peleador->habilidades ?>
        </div>
        <div class="item">
            <strong>Tipo:</strong> <?= $Peleador->tipo ?>
        </div>
        <div class="item">
            <strong>Nivel:</strong> <?= $Peleador->nivel ?>
        </div>
        
        
    </div>

    <div class="botones">
        <a href="Torneo.php">Volver a la lista</a>
    </div>
</div>

</body>
</html>
