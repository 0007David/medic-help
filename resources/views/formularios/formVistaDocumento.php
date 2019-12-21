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
              <input type="hidden" name="empleado" value="<?= $persona->peopleable_id; ?>"> 
              <style type="text/css">
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
                      <label>paciente</label> <br>
                        <select id="paciente" name="paciente"   >
                            <?php foreach($pacientes as $paciente){  ?>

                               <option value="<?= $paciente->id; ?>" ><?= $paciente->nro_seguro; ?></option>
                            
                            <?php } ?>
                                              
                        </select>
                  </div> 

                   <div class="box_cris">
                      <label>Servicio:</label> <br>
                        <select id="servicio" name="servicio"   >
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
                   <input type="file" class="form-control" id="file" name="file" required >

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
                        <button type="submit" class="button-cris" > Guardar </button>             
                        <script type="text/javascript">
                            Waves.init();
                            Waves.attach('.button-cris', ['waves-button', 'waves-float']);
                        </script> 
                      </div>
              
          </form>
      </div>

    </div>

     <div   class="col-md-6">

        <div id="seccion_recarga" class="box box-primary">
          <h1> Documentos</h1>
            <div id="notificacion_resul_fapu"></div>
                <div class="card-body">
                                <table class="table table-bordered">
                                  <thead>                  
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Detalles del Documento</th>
                                      <th>Progreso</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php
                                         foreach ($documentos as  $documento) {
                                         // $id_empleado=$documento->id_employee;

                                          if ($documento->id_employee == $persona->peopleable_id) {
                                            # code...
                                          ?>
                                    <tr>
                                      <td><?=$documento->id?></td>

                                      <td>
                                     
                                      <?php
                                        $nombre_servicio="";
                                        foreach ($servicios as $servicio) {
                                            if ($servicio->id == $documento->id_service) {
                                              $nombre_servicio=$servicio->nombre;
                                              break;
                                            }
                                        }

                                        $nombre_paciente="";
                                        foreach ($pacientes as $paciente) {
                                            if ($paciente->id == $documento->id_service) {
                                              $nombre_paciente=$paciente->nro_seguro;
                                              break;
                                            }
                                        }
                                      ?>
                                      <label><strong>#Seguro :</strong></label><?= $nombre_paciente?><br>
                                      <label><strong>Servicio:</strong></label><?= $nombre_servicio?><br>
                                      <label><strong>Creado el :</strong></label><?= $documento->fecha_creacion?><br>
                                      <label><strong>Descripcion:</strong></label> <br><?= $documento->descripcion?><br>
                                      <label><strong>Observaciones:</strong></label> <br><?= $documento->observaciones?>
                                      
                                      </td>
                              
                                      <td><span class="badge bg-danger">55%</span></td>
                                      <td>
                                        <div class="btn-group-vertical">
                                        <a href="<?= $documento->url_archivo_global  ?>"><button type="button" class="btn btn-info">Ver</button></a>
                                          <a href="descargar_Documento/<?=  $documento->id;   ?>"><button type="button" class="btn btn-info">Descargar</button></a>
                                          <a href="javascript:void(0);" onclick="borrarDocumento1(<?=$documento->id?> )";>   <button type="button" class="btn btn-info">Eliminar</button></a>
                                        </div>
                                      </td>
                                      <?php
                                            }else{

                                           }
                                        } 
                                      ?>        
            
      
                                  </tbody>
                                </table>
                              </div>
               
      

      </div>
  </div>  
</div>