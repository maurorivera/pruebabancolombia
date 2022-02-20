<?php
require_once 'conexion.php';


$datos=json_decode(file_get_contents("https://restcountries.com/v3.1/all"),true);
//print_r($datos[1]['translations']['spa']);
$paises= array();


//echo count($datos);

//<count($datos)

for ($i=0; $i <count($datos) ; $i++) { 
    $arreglo= array('spa' =>$datos[$i]["translations"]['spa']['official']);
    $nombre=$arreglo['spa'];
    $poblacion=$datos[$i]["area"];
    $area=$datos[$i]["population"];
    if($area!=0){
        $densidad=$poblacion/$area;
    }
   /*echo "pais: ".$nombre."<br>";
    echo "area: ".$area."<br>";
    echo "poblacion: ".$poblacion."<br>";
    echo "densidad demografica: ".$densidad."<br>";*/
    $pais=array(
        'nombre'=>$nombre,
        'poblacion'=>$poblacion,
        "area"=>$area,
        "densidad"=>$densidad
    );
    array_push($paises,$pais);

} 

function maxValue($array, $keyToSearch)
{
    $a=0;
    $paisesd=array();
    while ($a < 5) {
        $currentMax = NULL;
    for ($i=0; $i <count($array) ; $i++) {

        
         foreach($array[$i] as $key => $value)
        {
            if ($key == $keyToSearch && ($value >= $currentMax))
            {
                $currentMax = $value;
                $indice=$i;
            }
        }

    }
    array_push($paisesd,$array[$indice]);
    unset($array[$indice]);
    $array=array_values($array);
   // print_r($paisesd);
    $a++;

    }
}

$con=new Conexion();
$con->conectar();
//insertarlog();

maxValue($paises, "densidad");

function insertarlog(){
    $conexion=conectar();
$sql = "INSERT INTO bitacora (descripcion) VALUES ('prueba2')";
if (mysqli_query($conexion, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);

}

?>