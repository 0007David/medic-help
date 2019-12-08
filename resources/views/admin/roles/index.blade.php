@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  
<!-- MODAL PARA AÑADIR UN ROL -->
<div class="modal fade" id="modalRol">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Rol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" action="{{ url('roles/store') }}" >
        @csrf
        <div class="modal-body">
          <!-- CAMPO nombre -->
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
            </div>  
          </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- MODAL PARA EDITAR UN ROL -->
<div class="modal fade" id="modalEditRol">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Rol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" action="{{ url('roles/edit') }}" >
        @csrf
        <div class="modal-body">
          <!-- CAMPO nombre -->
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="hidden" id="idRol" name="id" required>
              <input type="text" class="form-control" id="nombreRol" name="nombre" placeholder="nombre" required>
            </div>  
          </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

  @section('nav-class', auth()->user()->tema_nav_bar)
  @include('includes.navbar')
  
  @section('aside-class', auth()->user()->tema_aside)
  
  @section('logoA-class', auth()->user()->tema_logo)
  @include('includes.aside')  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Roles del Sistema</h3>
          </div>
          
          <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRol">
                    Nuevo Rol
                  </button>
                </div>
                
            </div>
            
            <table id="tablaRol" class="table table-bordered table-hover miTabla">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Asignar Permisos</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($rols as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->nombre }}</td>
                      <td> <a href="{{url('roles/'.$value->id.'/permisos') }}" class="btn btn-secondary">
                            <i class="fas fa-table"></i>
                          </a> 
                      </td>
                      <td> <button id_rol="{{ $value->id }}" data-toggle="modal" data-target="#modalEditRol" class="btn btn-primary btnEditRol">
                            <i class="fas fa-edit"></i>
                          </button> 
                      </td>
                      <td> <button class="btn btn-danger">
                      <i class="fas fa-eraser"></i>
                      </button> </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    </section>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection
