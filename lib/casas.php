<?php

session_start();

// Items en Json Casas.
// [0] es PM-L
// [1] es PMd-L
// [2] es PT-L
// [3] es PMd-F
// [4] es PT-F


function calculo_casas($rangos,$superficies,$cantidades)
{
    $resultado_entradas = [];
    $resultado_salidas = [];

    //var_dump($rangos);
    foreach ($rangos as $key => $value) {
        switch ($value) {
            case '1_50':

                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/0-50.json")) , true);
                //Faltan salidas
                break;
            case '51_60':
                $PTL_entrada = 0.5+(0.05*(intval($superficies[$key])-50));
                $PML_salida = 1+(0.02*(intval($superficies[$key])-50));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/50-60.json")) , true);
                break;
            case '61_140':
                $PTL_entrada = 1+(0.0125*(intval($superficies[$key])-60));
                $PML_salida = 1.2+(0.01*(intval($superficies[$key])-60));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/60-140.json")) , true);

                break;
            case '141_280':
                $PTL_entrada = 2+(0.01*(intval($superficies[$key])-140));
                $PML_salida = 2+(0.005*(intval($superficies[$key])-140));
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/140-280.json")) , true);

                break;
            case '281_n':
                $items_entrada = json_decode( stripslashes(file_get_contents("tasas/casas/entrada/280-n.json")) , true);

                break;
        }    
    }

 
    //falta Salidas
    //var_dump( $items_entrada );
    if($rangos[0] == '1_50' || $rangos[0] == '281_n'){  
        foreach ($items_entrada as $key => $value) {
        
            $resultado_entradas[$key]["viajes_h_por_vivienda"] = $value["viajes_h_por_vivienda"] * $cantidades[0];
            $resultado_entradas[$key]["transporte_privado"] = $value["transporte_privado"] * $cantidades[0];
            $resultado_entradas[$key]["transporte_publico"] = $value["transporte_publico"] * $cantidades[0];
            $resultado_entradas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $cantidades[0];
            $resultado_entradas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $cantidades[0];
        }
    }else{
        $viajes_h_por_vivienda = [];
        foreach ($items_entrada as $key => $value) {
            $viajes_h_por_vivienda[$key] = $value["viajes_h_por_vivienda"]*$PTL_entrada;  
        }

        foreach ($items_entrada as $key => $value) {
        
            $resultado_entradas[$key]["viajes_h_por_vivienda"] = $viajes_h_por_vivienda[$key] * $cantidades[0];
            
            $resultado_entradas[$key]["transporte_privado"] = $value["transporte_privado"] * $viajes_h_por_vivienda[$key] *1.2* $cantidades[0];
            $resultado_entradas[$key]["transporte_publico"] = $value["transporte_publico"] * $viajes_h_por_vivienda[$key] * $cantidades[0];
            $resultado_entradas[$key]["peatones_viajes"] = $value["peatones_viajes"] * $viajes_h_por_vivienda[$key] * $cantidades[0];
            $resultado_entradas[$key]["ciclos_viajes"] = $value["ciclos_viajes"] * $viajes_h_por_vivienda[$key] * $cantidades[0];
        }
    }


    $_SESSION['resultado_entradas'] = $resultado_entradas;
    $_SESSION['cantidad'] = $cantidades[0];
    $_SESSION['superficie'] = $superficies[0];
    header("Location: resultado.php"); 
    
}


?>