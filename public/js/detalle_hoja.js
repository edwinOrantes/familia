// Gestion datos de paciente en hoja de cobro
    $(document).on("click", "#user-flotante", function(event) {
    event.preventDefault();
    var paciente = $("#idPaciente").val();

    var datos = {
        id : paciente
    }    
    $.ajax({
        url: "../../../Paciente/obtener_detalle",
        type: "POST",
        data: datos,
        success:function(respuesta){
            var registro = eval(respuesta);
                if (registro.length > 0){
                    for (let i = 0; i < registro.length; i++) {
                        $("#idPacienteU").val(registro[i]["idPaciente"]);
                        $("#nombrePaciente").val(registro[i]["nombrePaciente"]);
                        $("#edadPaciente").val(registro[i]["edadPaciente"]);
                        $("#telefonoPaciente").val(registro[i]["telefonoPaciente"]);
                        $("#duiPaciente").val(registro[i]["duiPaciente"]);
                        $("#nacimientoPaciente").val(registro[i]["nacimientoPaciente"]);
                        $("#direccionPaciente").val(registro[i]["direccionPaciente"]);
                        
                    }
                }
            }
        });
        
    });
// Fin gestion

/* Off canvas */
    jQuery(document).ready(function($){
        $(document).on('click', '.pull-bs-canvas-right', function(){
            $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
            if($(this).hasClass('pull-bs-canvas-right')){
                $('.bs-canvas-right').addClass('mr-0');
            }
            
            
            return false;
        });
        
        $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
            var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $('.bs-canvas');
            elm.removeClass('mr-0 ml-0');
            $('.bs-canvas-overlay').remove();
            return false;
        });
    });
/* Off canvas */
