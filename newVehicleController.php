<?php
if ($_GET) {
    session_start();
    include "./conexion.php";

    $lpn = $_GET['lpn'];
    $brand = $_GET['brand'];
    $model = $_GET['model'];
    $year = $_GET['year'];
    $tankCapacity = $_GET['tankCapacity'];
    $idVehicleType = $_GET['idVehicleType'];
    $userName = $_SESSION['userName'];


    $sql = "SELECT insertVehicle('$lpn', '$brand', '$model', '$year', $tankCapacity, $idVehicleType, '$userName')";

    if (mysqli_query($conn, $sql)) {
        $lastId = mysqli_insert_id($conn);
        header("Location: ./fleet.php");
    } else {
        echo "Error";
    }
}


// include "./conexion.php";

// $sql = "SELECT * FROM vehicle WHERE lpn = 'TU-4324F'";

// $result = mysqli_query($conn, $sql);

// $row = mysqli_fetch_assoc($result);

// echo $row['model'];
// echo $row['brand'];

// mysqli_free_result($result);



// $sql = "SELECT * FROM vehicle";
// $result = mysqli_query($conn, $sql);

// if(mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//         echo $row['model'];
//         echo $row['brand'];
//     }
// }



// mysqli_close($conn);



?>