<?php
if ($_GET) {
    include "./conexion.php";

    $sql = "INSERT INTO vehicle(lpn,model,brand,year,idVehicleType) values ('" . $_GET['lpn'] . "','" . $_GET['model'] . "','" . $_GET['brand'] . "'," . $_GET['year'] . "," . $_GET['idVehicleType'] . ")";

    if (mysqli_query($conn, $sql)) {
        $lastId = mysqli_insert_id($conn);
    } else {
        echo "Error";
    }
}


include "./conexion.php";

$sql = "SELECT * FROM vehicle WHERE lpn = 'TU-4324F'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo $row['model'];
echo $row['brand'];

mysqli_free_result($result);



$sql = "SELECT * FROM vehicle";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['model'];
        echo $row['brand'];
    }
}



mysqli_close($conn);



?>


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
        <a class="button" href="./newVehicle.php">Agregar Vehiculo</a>
        <!-- <p class="res"><?php echo $row['model']; ?></p>
        <p class="res"><?php echo $row['brand']; ?></p> -->
    </main>

    <script src="./headerSidebar.js"></script>
</body>

</html>