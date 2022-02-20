<?php
class Conexion{

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
      //  echo "Connected successfully";
        return $conn;
    
    }
}
?>