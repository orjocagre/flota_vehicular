<?php

if ($_GET) {
    include "./conexion.php";

    $sql = "INSERT INTO user(lpn,model,brand,year,idVehicleType) values ('" . $_GET['lpn'] . "','" . $_GET['model'] . "','" . $_GET['brand'] . "'," . $_GET['year'] . "," . $_GET['idVehicleType'] . ")";

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