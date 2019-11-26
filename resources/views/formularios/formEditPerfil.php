

<div class="row">  

  <div class="col-md-6">

        <div class="box box-primary">
                        
                        <div class="box-header">
                          <h3 class="box-title">Editar información del Usuario</h3>
                        </div><!-- /.box-header -->

        <div id="notificacion_resul_feu"></div>



        <form  id="f_editar_usuario"  method="post"  action="editar_usuario" class="form-horizontal form_entrada" >                
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
          <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">              


        <div class="box-body ">
        <div class="form-group col-xs-12">
                              <label for="nombre">Nombre: </label>
                              <input type="text" class="form-control" id="nombres" name="nombres"  value="<?= $usuario->name; ?>"  >
        </div>

        <div class="form-group col-xs-12">
                              <label for="pais">Pais</label>
                              
                             
                               <select id="pais" name="pais" class="form-control">
        <option value="0">ninguno</option>
        <option value="1 ">Colombia</option>
        <option value="2 ">Albania</option>
        <option value="3 ">Alemania</option>
        <option value="4 ">Andorra</option>
        <option value="5 ">Angola</option>
        <option value="6 ">Antigua y Barbuda</option>
        <option value="7 ">Arabia Saudita</option>
        <option value="8 ">Argelia</option>
        <option value="9 ">Argentina</option>
        <option value="10 ">Armenia</option>
        <option value="11 ">Australia</option>
        <option value="12 ">Austria</option>
        <option value="13 ">Azerbaiyán</option>
        <option value="14 ">Bahamas</option>
        <option value="15 ">Bahrein</option>
        <option value="16 ">Bangladesh</option>
        <option value="17 ">Barbados</option>
        <option value="18 ">Bélgica</option>
        <option value="19 ">Bélice</option>
        <option value="20 ">Benin</option>
        <option value="21 ">Bielorrusia</option>
        <option value="22 ">Bolivia</option>
        <option value="23 ">Bosnia y Herzegovina</option>
        <option value="24 ">Botsuana</option>
        <option value="25 ">Brasil</option>
        <option value="26 ">Brunei</option>
        <option value="27 ">Bulgaria</option>
        <option value="28 ">Burkina Faso</option>
        <option value="29 ">Burundi</option>
        <option value="30 ">Bután</option>
        <option value="31 ">Cabo Verde</option>
        <option value="32 ">Camboya</option>
        <option value="33 ">Camerún</option>
        <option value="34 ">Canadá</option>
        <option value="35 ">Chad</option>
        <option value="36 ">Chile</option>
        <option value="37 ">China</option>
        <option value="38 ">Chipre</option>
        <option value="39 ">Colombia</option>
        <option value="40 ">Comoras</option>
        <option value="41 ">Corea del Norte</option>
        <option value="42 ">Corea del Sur</option>
        <option value="43 ">Costa de Marfil</option>
        <option value="44 ">Costa Rica</option>
        <option value="45 ">Croacia</option>
        <option value="46 ">Cuba</option>
        <option value="47 ">Dinamarca</option>
        <option value="48 ">Dominica</option>
        <option value="49 ">Ecuador</option>
        <option value="50 ">Egipto</option>
        <option value="51 ">El Salvador</option>
        <option value="52 ">Emiratos Arabes Unidos</option>
        <option value="53 ">Eritrea</option>
        <option value="54 ">Eslovaquia</option>
        <option value="55 ">Eslovenia</option>
        <option value="56 ">España</option>
        <option value="57 ">Estados Unidos</option>
        <option value="58 ">Estonia</option>
        <option value="59 ">Etiopía</option>
        <option value="60 ">Filipinas</option>
        <option value="61 ">Finlandia</option>
        <option value="62 ">Fiyi</option>
        <option value="63 ">Francia</option>
        <option value="64 ">Gab�n</option>
        <option value="65 ">Gambia</option>
        <option value="66 ">Georgia</option>
        <option value="67 ">Ghana</option>
        <option value="68 ">Granada</option>
        <option value="69 ">Grecia</option>
        <option value="70 ">Guatemala</option>
        <option value="71 ">Guinea</option>
        <option value="72 ">Guinea Ecuatorial</option>
        <option value="73 ">Guinea Francesa</option>
        <option value="74 ">Guinea-Bissau</option>
        <option value="75 ">Guyana</option>
        <option value="76 ">Haití</option>
        <option value="77 ">Honduras</option>
        <option value="78 ">Hungría</option>
        <option value="79 ">India</option>
        <option value="80 ">Indonesia</option>
        <option value="81 ">Irán</option>
        <option value="82 ">Iraq</option>
        <option value="83 ">Irlanda</option>
        <option value="84 ">Islandia</option>
        <option value="85 ">Islas Georgias del Sur y Sandwich del Sur</option>
        <option value="86 ">Islas Malvinas</option>
        <option value="87 ">Islas Marshall</option>
        <option value="88 ">Islas Salom�n</option>
        <option value="89 ">Israel</option>
        <option value="90 ">Italia</option>
        <option value="91 ">Jamaica</option>
        <option value="92 ">Jap�n</option>
        <option value="93 ">Jordania</option>
        <option value="94 ">Kazajistán</option>
        <option value="95 ">Kenia</option>
        <option value="96 ">Kirguistán</option>
        <option value="97 ">Kiribati</option>
        <option value="98 ">Kuwait</option>
        <option value="99 ">Laos</option>
        <option value="100 ">Leshoto</option>
        <option value="101 ">Letonia</option>
        <option value="102 ">Líbano</option>
        <option value="103 ">Libia</option>
        <option value="104 ">Liechtenstein</option>
        <option value="105 ">Lituania</option>
        <option value="106 ">Luxemburgo</option>
        <option value="107 ">Madagascar</option>
        <option value="108 ">Malasia</option>
        <option value="109 ">Malaui</option>
        <option value="110 ">Maldivas</option>
        <option value="111 ">Mali</option>
        <option value="112 ">Malta</option>
        <option value="113 ">Marruecos</option>
        <option value="114 ">Mauricio</option>
        <option value="115 ">Mauritania</option>
        <option value="116 ">México</option>
        <option value="117 ">Micronesia</option>
        <option value="118 ">Moldavia</option>
        <option value="119 ">M�naco</option>
        <option value="120 ">Mongolia</option>
        <option value="121 ">Montenegro</option>
        <option value="122 ">Mozambique</option>
        <option value="123 ">Myanmar (birmania)</option>
        <option value="124 ">Namibia</option>
        <option value="125 ">Nauru</option>
        <option value="126 ">Nepal</option>
        <option value="127 ">Nicaragua</option>
        <option value="128 ">Níger</option>
        <option value="129 ">Nigeria</option>
        <option value="130 ">Noruega</option>
        <option value="131 ">Nueva Zelanda</option>
        <option value="132 ">Omán</option>
        <option value="133 ">Países Bajos</option>
        <option value="134 ">Pakistán</option>
        <option value="135 ">Palaos</option>
        <option value="136 ">Panamá </option>
        <option value="137 ">Papúa Nueva Guinea</option>
        <option value="138 ">Paraguay</option>
        <option value="139 ">Perú</option>
        <option value="140 ">Polonia</option>
        <option value="141 ">Portugal</option>
        <option value="142 ">Puerto Rico</option>
        <option value="143 ">Qatar</option>
        <option value="144 ">Reino Unido</option>
        <option value="145 ">República Centroafricana</option>
        <option value="146 ">República Checa</option>
        <option value="147 ">República de Macedonia</option>
        <option value="148 ">República del Congo</option>
        <option value="149 ">República DemocrAtica del Congo</option>
        <option value="150 ">República Dominicana</option>
        <option value="151 ">república saharaui</option>
        <option value="152 ">Ruanda</option>
        <option value="153 ">Rumania</option>
        <option value="154 ">Rusia</option>
        <option value="155 ">Samoa</option>
        <option value="156 ">San Crist�bal y Nevis</option>
        <option value="157 ">San Marino</option>
        <option value="158 ">San Vicente y las Granadinas</option>
        <option value="159 ">Santa Lucía </option>
        <option value="160 ">Santo Tomé y Príncipe</option>
        <option value="161 ">Senegal</option>
        <option value="162 ">Serbia</option>
        <option value="163 ">Seychelles</option>
        <option value="164 ">Sierra Leona</option>
        <option value="165 ">Singapur</option>
        <option value="166 ">Siria</option>
        <option value="167 ">Somalia</option>
        <option value="168 ">Sri Lanka</option>
        <option value="169 ">Suazilandia</option>
        <option value="170 ">SudAfrica</option>
        <option value="171 ">SudAn del norte</option>
        <option value="172 ">Sudan del sur</option>
        <option value="173 ">Suecia</option>
        <option value="174 ">Suiza</option>
        <option value="175 ">Surinam</option>
        <option value="176 ">Tailandia</option>
        <option value="177 ">Tanzania</option>
        <option value="178 ">Tayikistán</option>
        <option value="179 ">Timor Oriental</option>
        <option value="180 ">Togo</option>
        <option value="181 ">Tonga</option>
        <option value="182 ">Trinidad y Tobago</option>
        <option value="183 ">Túnez</option>
        <option value="184 ">Turkmenistán</option>
        <option value="185 ">Turquía</option>
        <option value="186 ">Tuvalu</option>
        <option value="187 ">Ucrania</option>
        <option value="188 ">uganda</option>
        <option value="189 ">Uruguay</option>
        <option value="190 ">Uzbekistán</option>
        <option value="191 ">Vanuatu</option>
        <option value="192 ">Vaticano</option>
        <option value="193 ">Venezuela</option>
        <option value="194 ">Vietnam</option>
        <option value="195 ">Yemen</option>
        <option value="196 ">Yibuti</option>
        <option value="197 ">Zambia</option>
        <option value="198 ">Zimbabue</option>
        <option value="199 ">Antiguo</option>
                             
                              </select>
                         
                            
        </div>

        <div class="form-group col-xs-12">
                              <label for="ciudad">Ciudad</label>
                              <input type="text" class="form-control" id="ciudad" name="ciudad" value="None"  >
        </div>
        <div class="form-group col-xs-12">
                              <label for="institucion">Institucion</label>
                              <input type="text" class="form-control" id="institucion" name="institucion"  value="None" >
        </div>
        <div class="form-group col-xs-12">
                              <label for="ocupacion">Ocupacion</label>
                              <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="None" >
        </div>
        <div class="form-group col-xs-12">
                              <label for="email">Email*</label>
                              <input type="text" class="form-control" id="email" name="email"   value="<?= $usuario->email; ?>" >
        </div>



        </div>



        <div class="box-footer">
             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </div>
        </form>
        </div>

  </div> 

<!--  bloque de la 2da columna-->
    <div class="col-md-6">
      <div class="box box-primary">
            <div class="box-header">
                <div class="box-header with-border">
                    <h3 class="box-title"> Cambiar Imagen de Perfil</h3>
                </div>

                <div id="notificacion_resul_fci"></div>

                <form id="f_subir_imagen" name="f_subir_imagen" method="post" action="subir_imagen_usuario" class="formarchivo" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario_foto" value="<?= $usuario->id?>">
                    <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">
                        

                    <div class="form-group col-xs-12" >
                      <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
                      <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario" >
                    </div>

                    <div class="form-group col-xs-12"  >
                        <label>Agregar Imagen </label>
                        <input name="archivo" id="archivo" type="file"   class="archivo form-control"  required/><br /><br />
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                    </div>
                </form>
            </div>
       </div>
    <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cambiar Password</h3>
                </div><!-- /.box-header -->

                <div id="notificacion_resul_fcp"></div>
                <!-- formulario -->
                <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                    <!-- verificaciones de seguridad-->
                    <input type="hidden" name="id_usuario_password" value="<?= $usuario->id; ?>"> 
                    <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 
                    
                    <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email </label>
                          <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Entrar email" value="<?= $usuario->email; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                    </div>
                </form>
        </div>
  </div>    
</div> 
<!-- fin de la segunda columna-->

