<?php
    require_once './src/datos.php';
    use PHPUnit\Framework\TestCase;

    class datosTest extends TestCase{

        public function  testconsumir(){
            $datos= new Datos();
            $valor=$datos->consumir();
            $this->assertIsArray($valor);
        }

        public function  testmaxValue(){
            $datos= new Datos();
            $paises=$datos->consumir();
            $jsonprueba='[
                {
                    "nombre": "Antártida",
                    "poblacion": 14000000,
                    "area": 1000,
                    "densidad": 14000
                },
                {
                    "nombre": "Georgia del Sur y las Islas Sandwich del Sur",
                    "poblacion": 3903,
                    "area": 30,
                    "densidad": 130.1
                },
                {
                    "nombre": "Groenlandia",
                    "poblacion": 2166086,
                    "area": 56367,
                    "densidad": 38.42826476484468
                },
                {
                    "nombre": "Territorio del Francés Tierras australes y antárticas",
                    "poblacion": 7747,
                    "area": 400,
                    "densidad": 19.3675
                },
                {
                    "nombre": "islas Malvinas",
                    "poblacion": 12173,
                    "area": 2563,
                    "densidad": 4.749512290284822
                }

            ]';

            $infol=json_decode($jsonprueba);
            $info=json_decode($datos->maxValue($paises));

            $this->assertIsArray($info);
            $this->assertEquals($infol[0]->nombre, $info[0]->nombre);

        }
        
        

    }
?>