<?php

session_start();

// Items en Json Casas.
// [0] es PM-L
// [1] es PMd-L
// [2] es PT-L
// [3] es PMd-F
// [4] es PT-F

define('FACTOR_AP',   1.2 );  //Auto Privado

function calculo_deptos($superficies,$cantidades)
{
    $entrada_resultado = [];
    $salida_resultado = [];

    //var_dump($rangos);
    foreach ($superficies as $key => $value) {
        $rango = superficie_rango($value);
        switch ($rango) {
            case '1_50':
                $PTL_entrada = 1;
                $PML_salida = 1;
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/departamentos/entrada/0-50.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/departamentos/salida/0-50.json")) , true);
                break;
            case '51_60':
                $PTL_entrada = 1+(0.02*(intval($value)-50));
                $PML_salida = 1+(0.02*(intval($value)-50));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/departamentos/entrada/50-60.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/departamentos/salida/50-60.json")) , true);

                break;
            case '61_140':
                $PTL_entrada = 1.2+(0.01*(intval($value)-60));
                $PML_salida = 1.2+(0.01*(intval($value)-60));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/departamentos/entrada/60-140.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/departamentos/salida/60-140.json")) , true);

                break;
            case '141_280':
                $PTL_entrada = 2+(0.005*(intval($value)-140));
                $PML_salida = 2+(0.005*(intval($value)-140));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/departamentos/entrada/140-280.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/departamentos/salida/140-280.json")) , true);

                break;
            case '281_n':
                $PTL_entrada = 1;
                $PML_salida = 1;
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/departamentos/entrada/280-n.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/departamentos/salida/280-n.json")) , true);
    
                break;
        }
        
        $entrada_resultado[$key] = entrada_deptos($PTL_entrada,$items_entrada,$rango,$cantidades[$key]);
        $salida_resultado[$key] = salida_deptos($PML_salida,$items_salida,$rango,$cantidades[$key]);

    }
    //print("<pre>".print_r(sum_entradas($entrada_resultado),true)."</pre>");
    //print("<pre>".print_r($salida_resultado,true)."</pre>");
    
    $_SESSION['resultado_entradas'] = sum_flujos($entrada_resultado);
    $_SESSION['resultado_salidas'] = sum_flujos($salida_resultado);
    $_SESSION['cantidades'] = $cantidades;
    $_SESSION['superficies'] = $superficies;
    header("Location: resultados/departamentos.php"); 
}




function entrada_deptos($PTL_entrada,$items_entrada,$rango,$cantidad)
{
    if($rango == '1_50' || $rango == '281_n'){  
        foreach ($items_entrada as $key => $value) {
        
            $resultado_entradas[$key]["viajes_h_por_vivienda"] = $value["viajes_h_por_vivienda"] * $cantidad;
            $resultado_entradas[$key]["transporte_privado"] = $value["transporte_privado"] * $cantidad;
            $resultado_entradas[$key]["transporte_publico"] = $value["transporte_publico"] * $cantidad;
            $resultado_entradas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $cantidad;
            $resultado_entradas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $cantidad;
        }
    }else{
        $viajes_h_por_vivienda = [];
        foreach ($items_entrada as $key => $value) {
            $viajes_h_por_vivienda[$key] = $value["viajes_h_por_vivienda"]*$PTL_entrada;  
        }

        foreach ($items_entrada as $key => $value) {
        
            $resultado_entradas[$key]["viajes_h_por_vivienda"] = $viajes_h_por_vivienda[$key] * $cantidad;
            
            $resultado_entradas[$key]["transporte_privado"] = $value["transporte_privado"] * $viajes_h_por_vivienda[$key] * FACTOR_AP * $cantidad;
            $resultado_entradas[$key]["transporte_publico"] = $value["transporte_publico"] * $viajes_h_por_vivienda[$key] * $cantidad;
            $resultado_entradas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $viajes_h_por_vivienda[$key] * $cantidad;
            $resultado_entradas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $viajes_h_por_vivienda[$key] * $cantidad;
        }
    }
    return $resultado_entradas;
}




function salida_deptos($PML_salida,$items_salida,$rango,$cantidad)
{
    
    if($rango == '1_50' || $rango == '281_n'){  
        foreach ($items_salida as $key => $value) {
        
            $resultado_salidas[$key]["viajes_h_por_vivienda"] = $value["viajes_h_por_vivienda"] * $cantidad;
            $resultado_salidas[$key]["transporte_privado"] = $value["transporte_privado"] * $cantidad;
            $resultado_salidas[$key]["transporte_publico"] = $value["transporte_publico"] * $cantidad;
            $resultado_salidas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $cantidad;
            $resultado_salidas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $cantidad;
        }
    }else{
        $viajes_h_por_vivienda = [];
        foreach ($items_salida as $key => $value) {
            $viajes_h_por_vivienda[$key] = $value["viajes_h_por_vivienda"]*$PML_salida;  
        }

        foreach ($items_salida as $key => $value) {
        
            $resultado_salidas[$key]["viajes_h_por_vivienda"] = $viajes_h_por_vivienda[$key] * $cantidad;
            
            $resultado_salidas[$key]["transporte_privado"] = $value["transporte_privado"] * $viajes_h_por_vivienda[$key] * FACTOR_AP * $cantidad;
            $resultado_salidas[$key]["transporte_publico"] = $value["transporte_publico"] * $viajes_h_por_vivienda[$key] * $cantidad;
            $resultado_salidas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $viajes_h_por_vivienda[$key] * $cantidad;
            $resultado_salidas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $viajes_h_por_vivienda[$key] * $cantidad;
        }
    }
    return $resultado_salidas;
}





    



?>