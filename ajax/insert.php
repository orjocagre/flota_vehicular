<?php
include_once("../conexion.php");

$name = $_POST["name"];
$password = $_POST["password"];

$query = "INSERT INTO users(name, password) VALUES ('$name','$password')";


$response = array();


if(mysqli_query($conn, $query)) {
    $response["status"] = "success";
    $response["message"] = "Se inserto correctamente";
}
else {
    $response["status"] = "error";
    $response["message"] = "Hubo un error en la insercion";
}
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);

?>