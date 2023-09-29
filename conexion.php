<?php
$server = "localhost";
$database = "flotadb";
$user = "root";
$password = "root";

$conn = mysqli_connect($server, $user, $password, $database);
if(!$conn) {
    die("Algun error");
}
echo("Conectado");



// $sql = "INSERT INTO vehiculo(placa,modelo,marca,agno) values ('TE-12356F','Hilux','Toyota',1999)";

// if(mysqli_query($conn,$sql)) {
//     $lastId = mysqli_insert_id($conn);
//     echo "Registro insertado";
//     echo $lastId;
// }
// else {
//     echo "Error";
// }
// mysqli_close($conn);




?>