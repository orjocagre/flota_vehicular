<?php

if ($_GET) {
    include "./conexion.php";


    $firstName = $_GET['firstName'];
    $secondName = $_GET['secondName'];
    $firstSurname = $_GET['firstSurname'];
    $secondSurname = $_GET['secondSurname'];
    $id = $_GET['id'];
    $birthDate = $_GET['birthDate'];
    $sex = $_GET['sex'];
    $phone = $_GET['phone'];
    $mail = $_GET['mail'];
    $userName = $_GET['userName'];
    $password = $_GET['password'];
    $licenseType[] = $_GET['licenseType'];


    $sql = "SELECT signInDriverUser('$firstName', '$secondName', '$firstSurname', '$secondSurname', '$id', '$birthDate', $sex, $phone, '$mail', '$userName', '$password');";
    
    $result = mysqli_query($conn, $sql);

    for ($i = 1; $i < count($licenseType); $i++) {
        $sql2 = "SELECT insertCategory(" . $licenseType[0] . ");";
        $result2 = mysqli_query($conn, $sql2);
    }

    if(!$result) {
        echo mysqli_error($conn);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
        }
        header("Location: ./location.php");
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
