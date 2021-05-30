<?php

function sum_flujos($flujos){
    $final = array();

    foreach ($flujos as $key1 => $values) {
        
        if($key1 == 0){
            foreach ($values as $key2 => $val) {    
                $final[$key2]["viajes_h_por_vivienda"] =  $val["viajes_h_por_vivienda"];
                $final[$key2]["transporte_privado"] = $val["transporte_privado"]  ;
                $final[$key2]["transporte_publico"] = $val["transporte_publico"];
                $final[$key2]["peatones_viajes"] = $val["peatones_viajes"] ;
                $final[$key2]["ciclos_viajes"] = $val["ciclos_viajes"];  
            }
        }else{
            foreach ($values as $key2 => $val) {    
                $final[$key2]["viajes_h_por_vivienda"] = $final[$key2]["viajes_h_por_vivienda"] + $val["viajes_h_por_vivienda"];
                $final[$key2]["transporte_privado"] = $final[$key2]["transporte_privado"] + $val["transporte_privado"]  ;
                $final[$key2]["transporte_publico"] = $final[$key2]["transporte_publico"] + $val["transporte_publico"];
                $final[$key2]["peatones_viajes"] = $final[$key2]["peatones_viajes"] + $val["peatones_viajes"] ;
                $final[$key2]["ciclos_viajes"] = $final[$key2]["ciclos_viajes"] + $val["ciclos_viajes"];  
            }
        }

    }

    return $final;
}



function superficie_rango($superficie)
{
    if($superficie <= 50){
        return '1_50';
    }elseif($superficie >= 51 && $superficie <= 60){
        return '51_60';
    }elseif($superficie >= 61 && $superficie <= 140){
        return '61_140';
    }elseif($superficie >= 141 && $superficie <= 280){
        return '141_280';
    }elseif($superficie >= 281){
        return '281_n';
    }
}

?>