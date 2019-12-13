<div class="row"> <!---->
    <div class="col-md-6">
      <div class="box box-primary">
          <h1> cargar documentos</h1>
          <!--Notificacion del resultado-->
          <div id="notificacion_resul_fg"></div>

          <form id="f_agregar_documento_grupo" method="post" action="agregar_documento" class="formarchivo"> 
            <!-- token de seguridad--> 
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
              <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>"> 
              <input type="hidden" name="empleado" value="<?= $persona->peopleable_id; ?>"> 
                   <div>
                      <label>Agregar al grupo:</label>
                        <select id="grupo" name="grupo" class="form-control"  >
                            <?php foreach($grupos as $grupo){  ?>

                               <option value="<?= $grupo->id; ?>" ><?= $grupo->nombre; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div>
                 <div>
                      <label>paciente</label>
                        <select id="paciente" name="paciente" class="form-control"  >
                            <?php foreach($pacientes as $paciente){  ?>

                               <option value="<?= $paciente->id; ?>" ><?= $paciente->nro_seguro; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div> 

                  <div>
                      <label>Descripcion</label> <br>
                      <textarea  name="descripcion" id="descripcion" rows="5" cols="30" value="" required=>
                        
                      </textarea>
                  </div>
                  <div>
                      <label>Observacion</label> <br>
                      <textarea  name="observacion" id="observacion" rows="3" cols="30" value="">
                    </textarea>
                  </div>


                  <div class=" col-xs-12" style="background-color:rgb(229, 245, 253);" >
                      <label >Archivo a subir (Formato: All) </label>
                      <input type="file" class="form-control" id="file" name="file" required >
                  </div>

                  <div>
                      <button type="submit"> Agregar documento</button>
                </div>
          </form>
      </div>

    </div>

     <div   class="col-md-6">

        <div id="seccion_recarga" class="box box-primary">
          <h1> Grupos</h1>
            <div id="notificacion_resul_fapu"></div>       

        </div>
  </div>
  <script type="text/javascript">
        $(document).ready(function(){
         setInternal(function(){$('#seccion_recarga').load()},2000);
});
  </script>
  
</div>