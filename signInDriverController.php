<?php

if ($_GET) {
    include "./conexion.php";

    $sql = "SELECT signInDriverUser('" . $_GET['firstName'] . "', '" . $_GET['secondName'] . "', '" . $_GET['firstSurname'] . "', '" . $_GET['secondSurname'] . "', '" . $_GET['id'] . "', '" . $_GET['birthDate'] . "', " . $_GET['sex'] . ", " . $_GET['phone'] . ", '" . $_GET['mail'] . "', '" . $_GET['userName'] . "', '" . $_GET['password'] . "');";

    // echo mysqli_query($conn,$sql);

    $result = mysqli_query($conn, $sql);

    if(!$result) {
        echo mysqli_error($conn);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
        }
    }
    mysqli_close($conn);
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

// 
