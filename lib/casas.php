<?php

session_start();

// Items en Json Casas.
// [0] es PM-L
// [1] es PMd-L
// [2] es PT-L
// [3] es PMd-F
// [4] es PT-F

define('FACTOR_AP',   1.2 );  //Auto Privado

function calculo_casas($rangos,$superficies,$cantidades)
{
    $resultado_entradas = [];
    $resultado_salidas = [];

    //var_dump($rangos);
    foreach ($rangos as $key => $value) {
        switch ($value) {
            case '1_50':
                $PTL_entrada = 1;
                $PML_salida = 1;
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/0-50.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/casas/salida/0-50.json")) , true);
                break;
            case '51_60':
                $PTL_entrada = 1+(0.02*(intval($superficies[$key])-50));
                $PML_salida = 1+(0.02*(intval($superficies[$key])-50));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/50-60.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/casas/salida/50-60.json")) , true);

                break;
            case '61_140':
                $PTL_entrada = 1.2+(0.01*(intval($superficies[$key])-60));
                $PML_salida = 1.2+(0.01*(intval($superficies[$key])-60));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/60-140.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/casas/salida/60-140.json")) , true);

                break;
            case '141_280':
                $PTL_entrada = 2+(0.005*(intval($superficies[$key])-140));
                $PML_salida = 2+(0.005*(intval($superficies[$key])-140));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/140-280.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/casas/salida/140-280.json")) , true);

                break;
            case '281_n':
                $PTL_entrada = 1;
                $PML_salida = 1;
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/280-n.json")) , true);
                $items_salida = json_decode( stripslashes(file_get_contents("tasas/casas/salida/280-n.json")) , true);
    
                break;
        }
        
        $entrada_resultado[$key] = entrada_casas($PTL_entrada,$items_entrada,$rangos[$key],$cantidades[$key]);
        $salida_resultado[$key] = salida_casas($PML_salida,$items_salida,$rangos[$key],$cantidades[$key]);

    }
    print("<pre>".print_r($entrada_resultado,true)."</pre>");
    print("<pre>".print_r($salida_resultado,true)."</pre>");
    //var_dump($entrada_resultado);
   // $_SESSION['resultado_entradas'] = $resultado_entradas;
   // $_SESSION['cantidad'] = $cantidades[0];
   // $_SESSION['superficie'] = $superficies[0];
   // header("Location: resultado.php"); 
}



function entrada_casas($PTL_entrada,$items_entrada,$rango,$cantidad)
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




function salida_casas($PML_salida,$items_salida,$rango,$cantidad)
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