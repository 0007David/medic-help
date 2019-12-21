@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @section('nav-class', auth()->user()->tema_nav_bar)
  @include('includes.navbar')
  
  @section('aside-class', auth()->user()->tema_aside)
  
  @section('logoA-class', auth()->user()->tema_logo)
  @include('includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <p>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title ">Formulario editar empleado</h3>
              </div>
              <!-- /.card-header -->

              <!-- FORM STAR -->
              <form role="form" method="post" action="{{ url('empleado/'.$employee->id.'/update') }}">
                @csrf
                <div class="card-body">
                  <!-- CAMPO CI -->
                  <div class="form-group">
                    <label for="ci">CI</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control" id="ci" name="ci" value="{{$employee->ci}}" readonly>
                    </div>  
                    
                  </div>
                  <!-- CAMPO Nombre -->
                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" id="name" pattern="[A-Za-z. ]+" name="nombre" value="{{$employee->nombre}}" required>
                    </div>
                    
                  </div>
                  <!-- CAMPO Apellido -->
                  <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-align-center"></i></span>
                      </div>
                      <input type="text" class="form-control" pattern="[A-Za-z. ]+" id="lastName" name="apellido" value="{{$employee->apellido}}" required>
                    </div>
                    
                  </div>
                  <!-- CAMPO Correo -->
                  <!-- <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-envelope"></i></span>
                      </div>
                      <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                  </div>  -->
                  
                  <!-- CAMPO Telefono -->
                  <div class="form-group">
                    <label for="password">Telefono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                      </div>   
                      <input type="text" class="form-control" pattern="[0-9]+" id="password" name="telefono" value="{{$employee->telefono}}"> 
                    </div>
                  </div>
                  <!-- CAMPO Fecha_Nacimiento -->
                  <div class="form-group">
                  <label for="password">Fecha Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" name="fecha_nacimiento" value="{{$employee->fecha_nacimiento}}" readonly>
                    </div>
                  <!-- /.input group -->
                  </div>
      
                  <!-- CAMPO Sexo -->
                  <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-check">
                        @if($employee->sexo == 'm')
                          <input class="form-check-input" type="radio" name="sexo" value="m" checked>
                        @else
                          <input class="form-check-input" type="radio" name="sexo" value="m">
                        @endif
                          <label class="form-check-label">Masculino</label>
                        </div>
                      </div> 
                      <div class="cold-md-6">
                        <div class="form-check">
                          <!-- <input  type="radio" name="sexo" value="f"> -->
                          @if($employee->sexo == 'f')
                            <input class="form-check-input" type="radio" name="sexo" value="f" checked>
                            @else
                            <input class="form-check-input" type="radio" name="sexo" value="f">
                            @endif
                          <label class="form-check-label">Femenino</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Campo type -->
                  <!-- <div class="form-group">
                  <label for="password">Tipo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" name="type" value="{{$employee->type}}">
                    </div>
                  </div> -->
                  
                  
                  <!-- ROL -->
                  <div class="form-group">
                  <label for="rol">Fecha Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-list-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" value="Rol" name="rol" readonly>
                    </div>
                  <!-- /.input group -->
                  </div>         
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Editar</button>
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