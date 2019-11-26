@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @include('includes.navbar')

  @include('includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title ">Formulario de Empleado</h3>
              </div>
              <!-- /.card-header -->

              <!-- FORM STAR -->
              <form role="form" method="post" action="{{ url('empleado/store') }}">
                @csrf
                <div class="card-body">
                  <!-- CAMPO CI -->
                  <div class="form-group">
                    <label for="ci">CI</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" id="ci" name="ci" placeholder="ci" required>
                    </div>  
                    
                  </div>
                  <!-- CAMPO Nombre -->
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" id="name" name="nombre" placeholder="nombre" required>
                    </div>
                    
                  </div>
                  <!-- CAMPO Apellido -->
                  <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" id="lastName" name="apellido" placeholder="apellido" required>
                    </div>
                    
                  </div>
                  <!-- CAMPO Correo  -->
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="email" class="form-control" id="email" name="email" placeholder="correo electronico" required>
                    </div>
                  </div>
                  <!-- Campo contraseña -->
                  <!-- <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>   
                      <input type="password" class="form-control" id="password" placeholder="contraseña"> 
                    </div>
                  </div> -->
                  <!-- CAMPO Telefono -->
                  <div class="form-group">
                    <label for="password">Telefono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>   
                      <input type="text" class="form-control" id="password" name="telefono" placeholder="telefono"> 
                    </div>
                  </div>
                  <!-- CAMPO Fecha_Nacimiento -->
                  <div class="form-group">
                  <label for="password">Fecha Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" name="fecha_nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" im-insert="true">
                    </div>
                  <!-- /.input group -->
                  </div>
                  <!-- CAMPO de Imagen -->
                  <div class="form-group">
                    <label for="exampleInputFile">Subir Imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file-image" name="imagen">
                        <label class="custom-file-label" for="file-image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <!-- CAMPO Sexo -->
                  <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sexo" value="m">
                          <label class="form-check-label">Masculino</label>
                        </div>
                      </div> 
                      <div class="cold-md-6">
                        <div class="form-check">
                          <!-- <input  type="radio" name="sexo" value="f"> -->
                          <input type="radio" class="form-check-input" id="sexo" name="sexo" value="f">
                          <label class="form-check-label">Femenino</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Campo type -->
                  <div class="form-group">
                  <label for="password">Tipo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" name="type">
                    </div>
                  <!-- /.input group -->
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('/empleados') }}" class="btn btn-default">cancelar</a>
                </div>
              </form>

            </div>
            <!-- /.card card-secondary -->
          </div>
          <!-- ./col-md-8 offset-md-2 -->

        </div>
        <!-- /.row -->

      </div>
      <!-- ./container-fluid   -->

    </section>

  </div>
  <!-- /.content-wrapper -->

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection