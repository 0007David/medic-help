<div class="row"> <!---->
    <div class="col-md-6">
        <div class="box box-primary">
          <!--Notificacion del resultado-->
          <div id="notificacion_resul_fg"></div>

          <form id="f_agregar_documento_grupo" method="post" action="agregar_documento" class="formarchivo"> 
            <!-- token de seguridad--> 
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
              <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>"> 
              <input type="hidden" name="empleado" value="<?= $empleado->id; ?>">               <style type="text/css">
                  .box_cris select
                  {
                      background: #1b79ce;
                      color: #fff;
                      padding: 10px;
                      width: 200px;
                      height: 40px;
                      border: none;
                      font-size: 15px;
                      box-shadow: 0 5px 25px rgba(0,0,0,.5);
                      -webkit-appearance: button;
                      outline: none;
                  }

                  .box_cris:hover:before
                  {
                      background: #1160a0;
                  }
                </style>
                   <div class="box_cris">
                      <label>Agregar al grupo:</label> <br>
                        <select id="grupo" name="grupo"   >
                            <?php foreach($grupos as $grupo){  ?>

                               <option value="<?= $grupo->id; ?>" ><?= $grupo->nombre; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div>
                 <div class="box_cris">
                      <label>paciente</label> <br>
                        <select id="paciente" name="paciente"   >
                            <?php foreach($pacientes as $paciente){  ?>

                               <option value="<?= $paciente->id; ?>" ><?= $paciente->nro_seguro; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div> 
                  
                   <div class="box_cris">
                      <label>Servicio:</label> <br>
                        <select id="servicio" name="servicio"  >
                            <?php foreach($servicios as $servicio){  ?>

                               <option value="<?= $servicio->id; ?>" ><?= $servicio->nombre; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div>

                  <div>
                      <label>Descripcion</label> <br>
                      
                      <div class="mb-3">
                       <textarea name="descripcion" id="descripcion"  rows="5" cols="30" placeholder="Por favor ingrese una descripción"   style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=  ></textarea>
                      </div>  
                  </div>
                  <div>
                      <label>Observaciones</label> <br>
                      <div class="mb-3">
                       <textarea name="observacion" id="observacion"  rows="5" cols="30" placeholder="Por favor ingrese una observación"   style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=  ></textarea>
                      </div>
                  </div>


                   <style type="text/css">
                     .text_cris {
                    display: flex;
                    width: 300px;
                    height: 40px;
                    color: black;
                    font: 20; 
                    font-size: 20px;
                    line-height: 48px;
                    
                    position: relative;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: -20%;
                    margin: auto;

                    overflow: hidden;
                     
                    }
                    .text_cris ul {
                        list-style: none;
                        padding-left: 10px;
                        animation: cambiar 7s infinite;
                    }
                     .text_cris ul, label {
                        margin: 0;
                    }
                  @keyframes cambiar {
                      0% {margin-top: 0;}
                      20% {margin-top: 0;}
                      25% {margin-top: -48px;}
                      50% {margin-top: -48px;}
                      
                      55% {margin-top: -98px;}
                      80% {margin-top: -98px;}
                      
                      100% {margin-top: 0;}
                      
                  }
                  </style>
                  <div class="text_cris" >
                         <label>Subir archivo:</label>
                        <ul>
                            <li>Word</li>
                            <li>Pdf</li>
                            <li>Excel</li>
                         </ul> 
                  </div>

                 <div>
                    <style type="text/css">
                        .button-cris{
                            width: 148px;
                            height: 52px;
                            top: -390px;
                            left: -180px;
                            display: block;
                            background: linear-gradient(50deg, #4a7ff7, #4824E5);
                            padding: 20px 30px;
                            text-align:  justify;
                            font-family: Arial;
                            margin: auto;
                            margin-top: 400px;
                            color: white;
                            font-size: 18px;
                            letter-spacing: 2px;
                            border-radius: 5px;
                            transition: all 300ms;

                        }
                        .button-cris:hover{
                        
                            transform: translateY(10px);
                            box-shadow: 0px 30px 5px -15px rgba(0,0,0,0.3)
                        }

                    </style>
                    <input type="file" class="form-control" id="file" name="file" required >
                        <button type="submit" class="button-cris waves-effect waves-button waves-float"> Guardar </button>             
                        <script type="text/javascript">
                            Waves.init();
                            Waves.attach('.button-cris', ['waves-button', 'waves-float']);
                        </script> 
                      </div>
          </form>
        </div>
      </div>


     <div   class="col-md-6">
      <!--- 
      
      <php?
      ?>

      -->

        <div id="seccion_recarga" class="box box-primary">
            <div id="notificacion_resul_fapu"></div>       
            <div>
                  <?php
                 // var_dump($Doc_grupos);
                  foreach ($Doc_grupos as $grupo) {

                    $gruponombre  = true; 
                    foreach ($grupo as $n) {

                          if ($gruponombre) {
                            ?>
              <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title"><?=$n->nombre?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
                            <?php
                          //  echo "<h1 class ='m-0 text-dark'>$n->nombre</h1>";
                            $gruponombre =false;
                            $id_grupo = $n->id;
                            $lectura = $n->lectura;
                            $descargar = $n->descargar;
                            $eliminar = $n->ocultar;

                          }else{

                              ?>

              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                <div class="row">

                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Detalles</th>
                                          <th>Fecha   </th>
                                          <th>estado</th>
                                          <th style="width: 40px">Opciones</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>

                                       
                  
                                      

                                    <?php
                                        if (!empty($n)) {
                                          if (sizeof($n) > 1){
                                            foreach ($n as $doc) {
                                              $id_documento=$doc->id;
                                        
                                              ?>

                                          <td><?=$doc->id?></td>
                                          <td>
                                            <label>Descripcion:</label><br>
                                            <?= $doc->descripcion?>
                                            <br><label>Observaciones:</label>
                                             <?= $doc->observaciones?>
                                          </td>
                                         
                                          <td>   <?= $doc->fecha_creacion?>  </td>
                                           <td><?= $doc->estado?></td>
                                          <td>
                                            <div class="btn-group">
                                                      <button type="button" class="btn btn-info">Action</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                                                        <a class="dropdown-item" href="/comentarios/<?=$id_documento?>/<?=$id_grupo?>">Ver comentarios</a>
                                                        <?php
                                                        if ($lectura == 1) {
                                                          
                                                          ?>
                                                         <a class="dropdown-item" href="<?= $doc->url_archivo_global  ?>">Ver documento</a>

                                                          <?php
                                                        }
                                                        if ($descargar == 1) {
                                                          
                                                      
                                                        ?>
                                                        <a class="dropdown-item" href="descargar_Documento/<?=  $doc->id;   ?>">Descargar documento</a>
                                                        <?php
                                                          }
                                                          if ($eliminar == 1) {
                                                            
                                                         
                                                        ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0);" onclick="borrarDocumento1(<?=$doc->id?> )";><button type="button" class="btn btn-info">Eliminar</button></a>                                                        
                                                        <?php
                                                           }
                                                        ?>
                                                       
                                                        

                                                      </div>
                                                    </div>
                                          </td>
                                          </tr>
                                  
                                              <?php


                                            }
                                          }else{
                                            $id_documento = $n[0]->id;
                                          ?>
                                           <td><?=$n[0]->id?></td>
                                          <td>
                                            <label>Descripcion:</label><br>
                                            <?= $n[0]->descripcion?>
                                            <br><label>Observaciones:</label>
                                             <?= $n[0]->observaciones?>
                                          </td>
                                         
                                          <td>   <?= $n[0]->fecha_creacion?>  </td>
                                           <td><?= $n[0]->estado?></td>
                                          <td>
                                            <div class="btn-group">
                                                      <button type="button" class="btn btn-info">Action</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                                                        <a class="dropdown-item" href="/comentarios/<?=$id_documento?>/<?=$id_grupo?>">Ver comentarios</a>
                                                        <?php
                                                        if ($lectura == 1) {
                                                          
                                                          ?>
                                                         <a class="dropdown-item" href="<?= $n[0]->url_archivo_global  ?>">Ver documento</a>

                                                          <?php
                                                        }
                                                        if ($descargar == 1) {
                                                          
                                                      
                                                        ?>
                                                        <a class="dropdown-item" href="descargar_Documento/<?=  $n[0]->id;   ?>">Descargar documento</a>
                                                        <?php
                                                          }
                                                          if ($eliminar == 1) {
                                                            
                                                         
                                                        ?>  
                                                  
                                                           

                                                        <?php
                                                           }
                                                        ?>
                                                       
                                                        

                                                      </div>
                                                    </div>
                                          </td>
                                          </tr>
                                          <?php
                                          }  
                                       }
                                    ?>
                                     
                                    </tbody>
                               </table>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->

              <!-- /.footer -->
            </div>
                              <?php
                       }  
                    }
                  }
                  ?>
            </div>
        </div>
  </div>
  
</div>