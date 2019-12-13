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
        <!-- /.card -->
    <div>
        <h1>LISTA DE ESPECIALIDADES</h1>
    </div>
  <!-- INICIO DE MODAL INSERTAR ESPECIALIDAD  -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insertar Especialidad</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="submit" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label class="float-left">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombreEsp" placeholder="Esciba el nombre de la especialidad">
                </div>
                    <div class="modal-footer justify-content-between form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
              <!-- <p>One fine body&hellip;</p> -->
              
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- FIN DE MODAL INSERTAR ESPECIALIDAD  -->

    <div class="wrapper m-2">
        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default">Agregar especialidad</button>
    </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ( $errors->all() as $error)
                          <p> {{ $error }}</p>
                        @endforeach
                      </ul>
                    </div>
                  @endif
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-primary">
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($data as $value)
                    @if($value->status == '1')
                      <!-- echo('true'); -->
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->nombre }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('/'.$value->id.'/editarEspecialidad') }}" class="btn btn-warning">Editar</a>
                              <a href="{{ url('/'.$value->id.'/eliminarEspecialidad') }}" class="btn btn-danger">Eliminar</a>
                            </div>
                          </td>
                        </tr>
                    @else
                    <!-- echo('false'); -->
                        <tr class="table-danger">
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->nombre }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('/'.$value->id.'/activarEspecialidad') }}" class="btn btn-success">Activar</a>
                            </div>
                          </td>
                        </tr>
                    @endif

                 @endforeach
                </tbody>
                <tfoot>
                <tr class="bg-primary">
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Opciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </section>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
