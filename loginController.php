<?php

if ($_GET) {
    include "./conexion.php";

    $userName = $_GET['userName'];
    $password = $_GET['password'];


    $sql = "SELECT COUNT(*) AS VALID FROM user WHERE user.userName = '$userName' AND user.password = '$password';";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo mysqli_error($conn);
    } else {

        if ($result->fetch_row()[0]) {
            header("Location: ./mainpage.php");
        } else {
            header("Location: ./login.php?userName=".$userName);
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
