<?php
    require_once 'datos.php';
    use PHPUnit\Framework\TestCase;

    class DatosTest extends TestCase{

        private $datos;
        public function  testsuma(){
            $datos= new Datos();
            $res=4;
            $this->assertEquals(5, $datos->suma(3,2));
        }   

    }
?>