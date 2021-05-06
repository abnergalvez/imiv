$('#tipo').on('change', function() {
    $('#formulario').empty();
    var tipo = $("#tipo option:selected").val();
    switch (tipo) {
        case 'casas':
            $('#formulario').load('formularios/casas.html');
            break;
        case 'departamentos':
            break;
        case 'c_acogida':
            break;
        case 'cientifico':
            break;
        case 'comercio':
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