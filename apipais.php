<?php
require_once 'datos.php';
if ($_SERVER['REQUEST_METHOD']== 'GET') {
    $datos= new Datos();
    $paises=$datos->consumir();
    $datos->maxValue($paises);
    $datos->insertarlog();
}
?>