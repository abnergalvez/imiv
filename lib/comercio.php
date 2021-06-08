<?php

// Items en Json Comercio.
// [0] es PM-L
// [1] es PMd-L
// [2] es PT-L
// [3] es PMd-F
// [4] es PT-F

define('FACTOR_AP',   1.2 );  //Auto Privado

function calculo_comercio($superficie,$cantidad,$comercio_tipo)
{
    if($comercio_tipo == "dispensador"){
        $resultado = calculo_unitario($cantidad,$comercio_tipo);

    }else{
        $resultado = calculo_por_cada100($superficie, $cantidad, $comercio_tipo);
    }
}

function calculo_unitario($cantidad,$comercio_tipo)
{
    
    $items_entrada = json_decode( stripslashes(file_get_contents("tasas/comercios/estacion_servicio_dispensador/entradas.json")) , true);
    $items_salida = json_decode( stripslashes(file_get_contents("tasas/comercios/estacion_servicio_dispensador/salidas.json")) , true);
    $entrada_resultado = calcular_unitario($items_entrada,$cantidad);
    $salida_resultado = calcular_unitario($items_salida,$cantidad);

    echo('<pre>');
    var_dump($entrada_resultado);
    echo('</pre>');
}


function calculo_por_cada100($superficie, $cantidad, $comercio_tipo)
{
    print_r($cantidad);
}

function calcular_unitario($items,$cantidad)
{

    foreach ($items as $key => $value) {
        
        $resultado[$key]["transporte_privado"] = $value["transporte_privado"]  * $cantidad;
        $resultado[$key]["transporte_publico"] = $value["transporte_publico"] * $cantidad;
        $resultado[$key]["peatones_viajes"] = $value["peatones_viajes"] * $cantidad;
        $resultado[$key]["ciclos_viajes"] = $value["ciclos_viajes"]  * $cantidad;
    }
    
    return $resultado;
}

function salida_calculo($items_salida,$cantidad)
{
    

}





    



?>