<?php

function conectar(){
    $servername = "testbancolombia.cbresbmbbizm.us-east-1.rds.amazonaws.com";
    $database = "bdbancolombia";
    $username = "admin";
    $password = "12345678";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;

}

 

echo "Connected successfully";
 /*
$sql = "INSERT INTO bitacora (descripcion) VALUES ('prueba')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);*/
?>