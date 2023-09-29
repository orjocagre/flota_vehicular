<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fleet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/newVehicle.css">
    <link rel="stylesheet" href="./css/newVehicletablet.css" media="(min-width: 500px)">
    <link rel="stylesheet" href="./css/newVehicledesktop.css" media="(min-width: 1000px)">
</head>

<body>
    <?php include "./header.php" ?>
    <?php include "./sidebar.php" ?>

    <main class="main">
        <form action="./fleet.php" method="get" class="vehicle_form form">

            <div class="form_header">
                <h1 class="form_title">nuevo vehiculo</h1>
            </div>
            <div class="form_body">
                <label class="form_label" for="brand">Marca</label>
                <input class="form_text" type="text" name="brand">

                <label class="form_label" for="model">Modelo</label>
                <input class="form_text" type="text" name="model">

                <label class="form_label" for="Year">Año</label>
                <input class="form_text" type="text" name="year">

                <label class="form_label" for="lpn">Placa</label>
                <input class="form_text" type="text" name="lpn">

                <label class="form_label" for="idVehicleType">Tipo</label>
                <select name="idVehicleType" id="type" class="form_select">
                    <option class="form_option" value="1">Motocicleta</option>
                    <option class="form_option" value="2">Ciclomotor</option>
                    <option class="form_option" value="3">Turismo Pequeño</option>
                    <option class="form_option" value="4">Turismo Grande</option>
                    <option class="form_option" value="5">Turismo Pickup</option>
                    <option class="form_option" value="6">Microbus</option>
                    <option class="form_option" value="7">Autobus</option>
                    <option class="form_option" value="8">Camión</option>
                </select>


            </div>
            <div class="form_footer">
                <a href="./fleet.php" class="button">Cancelar</a>
                <input class="button button-special" type="submit" value="Guardar">

            </div>
        </form>
    </main>
    <script src="./headerSidebar.js"></script>
</body>

</html>