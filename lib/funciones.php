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

function sum_total_flujos($entradas,$salidas)
{
    //print("<pre>".print_r($salidas,true)."</pre>");
    //die;
    $final = array();

    foreach ($entradas as $key => $val) {

        $final[$key]["viajes_h_por_vivienda"] =  $val["viajes_h_por_vivienda"] + $salidas[$key]["viajes_h_por_vivienda"];
        $final[$key]["transporte_privado"] = $val["transporte_privado"] + $salidas[$key]["transporte_privado"] ;
        $final[$key]["transporte_publico"] = $val["transporte_publico"] + $salidas[$key]["transporte_publico"];
        $final[$key]["peatones_viajes"] = $val["peatones_viajes"] + $salidas[$key]["peatones_viajes"];
        $final[$key]["ciclos_viajes"] = $val["ciclos_viajes"] + $salidas[$key]["ciclos_viajes"];  
        
    }

    return $final;

}

function buscar_mayor_columna($array,$nombre_columna)
{
    $mayor = 0;
    foreach ($array as $key => $val) {
        if( $mayor == 0){
            $mayor = $val[$nombre_columna];    
        }elseif($mayor < $val[$nombre_columna]){
            $mayor = $val[$nombre_columna];
        }
    }
    return $mayor;
}

function busca_mayor_otras_columnas($array)
{
    $mayor_t_publico = buscar_mayor_columna($array,"transporte_publico");
    $mayor_peatones = buscar_mayor_columna($array,"peatones_viajes");
    $mayor_ciclos = buscar_mayor_columna($array,"ciclos_viajes");
    $mayores = array($mayor_t_publico,$mayor_peatones, $mayor_ciclos);   
    return max ($mayores);
}

function categoria_imiv_t_privado($n_viajes)
{
    if($n_viajes < 20){
        return "No requiere estudio";
    }
    if($n_viajes >= 20 && $n_viajes <= 80){
        return "Básico";
    }
    if($n_viajes > 80 && $n_viajes <= 250){
        return "Intermedio";
    }
    if($n_viajes > 250){
        return "Mayor";
    }

}

function categoria_imiv_t_otros($n_viajes)
{
    if($n_viajes < 40){
        return "No requiere estudio";
    }
    if($n_viajes >= 40 && $n_viajes <= 160){
        return "Básico";
    }
    if($n_viajes > 160 && $n_viajes <= 500){
        return "Intermedio";
    }
    if($n_viajes > 500){
        return "Mayor";
    }
}



?>