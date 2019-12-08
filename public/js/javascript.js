
function cargarFormularioPerfil(id_usuario){
//funcion para cargar la vista de editar perfil de usuario
	$("#capa_modal").show();
	$("#capa_para_edicion").show();
	var url = "formEditPerfil/"+id_usuario+"";
	$("#capa_para_edicion").html($("#cargador_empresa").html());
	$.get(url,function(resul){
		$("#capa_para_edicion").html(resul);
	})
        

}

function VistaGrupo(id_usuario){
//funcion para mostrar vista de cargar documento
    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "mostrarFormDocGrupo/"+id_usuario+"";
    $("#capa_para_edicion").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })
        

}

function mostrarFormularioDoc(id_usuario){
//funcion para mostrar vista de cargar documento
    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "mostrarFormVista/"+id_usuario+"";
    $("#capa_para_edicion").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        console.log("resul", resul);
        $("#capa_para_edicion").html(resul);
    })
        

}

function borrarDocumento1(arg){
  var url="borrar_Documento/"+arg+"" ;
  var divresul="notificacion_resul_fapu";
  $("#"+divresul+"").html($("#cargador_empresa").html());

  $.get(url,function(resul){
    $("#"+divresul+"").html(resul);
    
  })


}



//atrapando los la imagen y el documento de un formulario
  $(document).on("submit",".formarchivo",function(e){

        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");

        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci"}
        if(nombreform=="f_agregar_documento"){ var miurl="subir_archivo_usuario"; var divresul="notificacion_resul_fap"}
        if(nombreform=="f_agregar_documento_grupo"){ var miurl="subir_archivo_grupo"; var divresul="notificacion_resul_fg"}
        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);
        //hacemos la petición ajax   
        $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );               
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
    });

//atrapando los datos de entrada de editar perfil
 $(document).on("submit",".form_entrada",function(e){

       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        if(quien=="f_editar_usuario"){ var varurl="editar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp"; }
     
        $("#"+divresul+"").html($("#cargador_empresa").html());

        $.ajax({

            type: "POST",
            url : varurl,
            datatype:'json',
            data : formu.serialize(),
            success : function(resul){

                $("#"+divresul+"").html(resul);
                $('#'+quien+'').trigger("reset");
                
            }
        });

});