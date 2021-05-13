<?php
session_start();

require 'lib/funciones.php';

$tipo = $_POST['tipo'];


switch ($tipo) {
    case 'casas':
        require 'lib/casas.php';
        $superficies = $_POST['superficies']; //array
        $cantidades = $_POST['cantidades']; //array
        $resultado = calculo_casas($superficies,$cantidades);
        
        //header('Location:  resultado.php');
        break;
    case 'departamentos':
        require 'lib/departamentos.php';
        $superficies = $_POST['superficies']; //array
        $cantidades = $_POST['cantidades']; //array
        $resultado = calculo_deptos($superficies,$cantidades);
        
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