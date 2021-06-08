$('#tipo').on('change', function() {
    $('#formulario').empty();
    $('#sub_proyecto').css('display', 'none');
    ocultar_subproyectos();
    var tipo = $("#tipo option:selected").val();
    switch (tipo) {
        case 'casas':
            $('#formulario').load('formularios/casas.html');
            break;
        case 'departamentos':
            $('#formulario').load('formularios/departamentos.html');
            break;
        case 'c_acogida':
            break;
        case 'cientifico':
            break;
        case 'comercio':
            $('#sub_proyecto').css('display', 'block');
            $('#sub_proyecto').load('formularios/subproyectos/comercio.html');
            $('#comercio_tipos').css('display', 'block');
            $('#tipo_comercio').on('change', function() {
                $('#formulario').empty();
                var tipo_comercio = $("#tipo_comercio option:selected").val();
                switch (tipo_comercio) {
                    case 'centro_automotor':
                        $('#formulario').load('formularios/comercio/centro_automotor.html');
                        break;
                    case 'estacion_servicio_dispensador':
                        $('#formulario').load('formularios/comercio/estacion_servicio_dispensador.html');
                        break;
                }

            });

            break;
        case 'culto_y_cultura':
            break;
        case 'deporte':
            break;
        case 'educacion':
            break;
        case 'esparcimiento':
            break;
        case 'hospedaje':
            break;
        case 'infraestructura':
            break;
        case 'salud':
            break;
        case 'servicios':
            break;
        case 'social':
            break;
        case '':
            break;

    }

});




// COMERCIO ONCHANGE


function ocultar_subproyectos() {
    $('#comercio_tipos').css('display', 'none');
}