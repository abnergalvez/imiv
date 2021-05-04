<?php

// Items en Json Casas.
// [0] es PM-L
// [1] es PMd-L
// [2] es PT-L
// [3] es PMd-F
// [4] es PT-F


function calculo_casas($rangos,$superficies,$cantidades)
{
    $resultado = [];
    $PTL_entradas = [];
    $PML_salidas = [];
    
    foreach ($rangos as $key => $value) {
        switch ($value) {
            case '1_50':
                $PTL_entradas[] = 1.00;
                $PML_salidas[] = 1.00;
                break;
            case '51_60':
                $PTL_entradas[] = 1+(0.02*(intval($superficies[$key])-50));
                $PML_salidas[] = 1+(0.02*(intval($superficies[$key])-50));
                break;
            case '61_140':
                $PTL_entradas[] = 1.2+(0.01*(intval($superficies[$key])-60));
                $PML_salidas[] = 1.2+(0.01*(intval($superficies[$key])-60));
                break;
            case '141_280':
                $PTL_entradas[] = 2+(0.005*(intval($superficies[$key])-140));
                $PML_salidas[] = 2+(0.005*(intval($superficies[$key])-140));
                break;
            case '281_n':
                $PTL_entradas[] = 2.7;
                $PML_salidas[] = 2.7;
                break;
        }
    }

    $entrada_0_50 = file_get_contents("tasas/casas/entrada/0-50.json");
    $items = json_decode( stripslashes($entrada_0_50) , true); 
    
    var_dump( $items[0]['viajes_h_por_vivienda']*$PTL_entradas[0]*$cantidades[0] );
    var_dump( $items[1]['viajes_h_por_vivienda']*$PTL_entradas[1]*$cantidades[1] );
    var_dump( $items[2]['viajes_h_por_vivienda']*$PTL_entradas[2]*$cantidades[2] );
    var_dump( $items[3]['viajes_h_por_vivienda']*$PTL_entradas[3]*$cantidades[3] );
    var_dump( $items[4]['viajes_h_por_vivienda']*$PTL_entradas[4]*$cantidades[4] );
    
}


?>