<?php

require 'lib/casas.php';

$tipo = $_POST['tipo'];
switch ($tipo) {
    case 'casas':
        $rangos = $_POST['rango_sup']; //array
        $superficies = $_POST['superficies']; //array
        $cantidades = $_POST['cantidades']; //array
        $resultado = calculo_casas($rangos,$superficies,$cantidades);
        //header('Location:  resultado.php');
        break;
    
    default:
        # code...
        break;
}



function calculo_departamentos()
{

}


?>