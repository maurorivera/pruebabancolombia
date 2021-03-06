<?php
require_once 'conexion.php';

class Datos{

    function insertarlog(){
        $ip_add = $_SERVER['HTTP_USER_AGENT'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $con=new Conexion();
        $conec=$con->conectar();
        $sql = "INSERT INTO bitacorab(ip,navegador) VALUES ('$ip_add','$user_agent')";
        if (mysqli_query($conec, $sql)) {
           // echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conec);
        }
        mysqli_close($conec);

    }
    

    function maxValue($array){
        $a=0;
        $paisesd=array();
        while ($a < 5) {
            $currentMax = NULL;
            for ($i=0; $i <count($array) ; $i++) {
                foreach($array[$i] as $key => $value){
                    if ($key == "densidad" && ($value >= $currentMax)){
                        $currentMax = $value;
                        $indice=$i;
                    }
                }
            }
            array_push($paisesd,$array[$indice]);
            unset($array[$indice]);
            $array=array_values($array);
            $a++;
        }
        return json_encode($paisesd);
    }


    function consumir(){
        $paises= array();
        $datos=json_decode(file_get_contents("https://restcountries.com/v3.1/all"),true);
        for ($i=0; $i <count($datos) ; $i++) { 
            $arreglo= array('spa' =>$datos[$i]["translations"]['spa']['official']);
            $nombre=$arreglo['spa'];
            $poblacion=$datos[$i]["area"];
            $area=$datos[$i]["population"];
            if($area!=0){
                $densidad=$poblacion/$area;
            }
            $pais=array(
                'nombre'=>$nombre,
                'poblacion'=>$poblacion,
                "area"=>$area,
                "densidad"=>$densidad
            );
            array_push($paises,$pais);
        } 

        return $paises;
    }

}

?>