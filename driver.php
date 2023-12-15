<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fleet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fleet.css">


    <style>
        .res {
            font-size: 60px;
            color: white;
        }
    </style>

</head>

<body>
    <?php include "./header.php" ?>
    <?php include "./sidebar.php" ?>

    <main class="main">
        <button id="btnGenerateCode" class="button">Generar Codigo Invitado</button>
        <button class="button">Asignar vehiculo</button>
        <button class="button">Agregar conductor</button>
        <button class="button">Eliminar conductor</button>
    </main>

    <script src="./headerSidebar.js"></script>
</body>

</html>