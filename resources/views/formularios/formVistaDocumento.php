<div class="row"> <!---->
    <div class="col-md-6">
      <div class="box box-primary">
          <h1> cargar documentos</h1>
          <!--Notificacion del resultado-->
          <div id="notificacion_resul_fap"></div>

          <form id="f_agregar_documento" method="post" action="agregar_documento" class="formarchivo"> 
            <!-- token de seguridad--> 
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
              <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>"> 

                  <div>
                      <label>paciente</label>
                        <select id="paciente" name="paciente" class="form-control"  >
                            <?php foreach($pacientes as $paciente){  ?>

                               <option value="<?= $paciente->id; ?>" ><?= $paciente->nro_seguro; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div> 

                   <div>
                      <label>Servicio:</label>
                        <select id="servicio" name="servicio" class="form-control"  >
                            <?php foreach($servicios as $servicio){  ?>

                               <option value="<?= $servicio->id; ?>" ><?= $servicio->nombre; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div>
                  <div>
                      <label>Descripcion</label> <br>
                      <textarea  name="descripcion" id="descripcion" rows="5" cols="30" value="" required=>
                        
                      </textarea>
                  </div>
                  <div>
                      <label>Observaciones</label> <br>
                      <textarea  name="observacion" id="observacion" rows="3" cols="30" value="" required=>
                        
                      </textarea>
                  </div>
                  <div class=" col-xs-12" style="background-color:rgb(229, 245, 253);" >
                      <label >Archivo a subir (Formato: PDF) </label>
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
          <h1> Documentos</h1>
            <div id="notificacion_resul_fapu"></div>


          <ul class="list-group list-group-unbordered">
          <?php
           foreach ($documentos as  $documento) {
           // $id_empleado=$documento->id_employee;

            if ($documento->id_employee == $usuario->id) {
              # code...
            ?>
            <li class="list-group-item">
                  <i class="fa fa-file-pdf-o"></i><b>--Titulo</b> <a class="pull-right"></a>
                   <br> <span><b>Numero: </b><?=$documento->id?></span>
                    <br> <span><b>Descripcion: </b><?= $documento->descripcion?></span>
                     <br><span><b>Cargado el: </b> <?= $documento->created_at?></span>
                     <br> <span><b>Observacion: </b><?= $documento->observaciones?></span>

                    <br> <span><b>Paciente: </b><?=$documento->id_patient?></span>
                    <?php
                      $nombre_servicio="";
                      foreach ($servicios as $servicio) {
                          if ($servicio->id == $documento->id_service) {
                            $nombre_servicio=$servicio->nombre;
                            break;
                          }
                      }
                    ?>
                    <br> <span><b>Servicio: </b><?=$nombre_servicio?></span>
                    <br><a href="<?= $rutaarchivos.$documento->url_archivo  ?>" style="display:block;" target="_blank"><button class="btn  btn-success btn-xs">Ver</button></a>
                    <a href="descargar_Documento/<?=  $documento->id;   ?>"  ><button class="btn  btn-success btn-xs">Descargar</button></a> 
                  <br><a href="javascript:void(0);" onclick="borrarDocumento1(<?=$documento->id?> )";>  <button class="btn  btn-success btn-xs">Eliminar</button></a>

                                                                
                  </li>
 
           <?php
                }else{

               }
            } 
          ?>        
           </ul>        

      </div>
  </div>
  <script type="text/javascript">
        $(document).ready(function(){
         setInternal(function(){$('#seccion_recarga').load()},2000);
});
  </script>
  
</div>