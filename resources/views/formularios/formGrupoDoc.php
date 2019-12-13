<div class="row"> <!---->
    <div class="col-md-6">
        <div class="box box-primary">
          <!--Notificacion del resultado-->
          <div id="notificacion_resul_fg"></div>

          <form id="f_agregar_documento_grupo" method="post" action="agregar_documento" class="formarchivo"> 
            <!-- token de seguridad--> 
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
              <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>"> 
              <input type="hidden" name="empleado" value="<?= $empleado->id; ?>"> 
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
            <div>
                  <?php
                 // var_dump($Doc_grupos);
                  foreach ($Doc_grupos as $grupo) {
                    $gruponombre  = true; 
                    foreach ($grupo as $n) {
                          if ($gruponombre) {
                            echo "<h1>Nombre Grupo:'$n->nombre'</h1>";
                            $gruponombre =false;
                          }else{

                            if (!empty($n)) {
                              if (sizeof($n) > 1){
                                foreach ($n as $doc) {
                                  ?>
                                  <h1>Documento :<?=$doc->descripcion?></h1>
                                  <?php

                                }
                              }else{
                              ?>
                              <h1>Documento :<?=$n[0]->descripcion?></h1>
                              <?php
                              }  
                          }
                       }  
                  }
                  ?>

                    




                 
                 <?php
                  }
                  ?>
            </div>
        </div>
  </div>
  
</div>