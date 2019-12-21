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
            <h1>Lista de Participantes:</h1>
            <table class="table table-striped">
                <thead class="bg-primary">
                    <tr>
                    <th scope="col">CI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                

                      @foreach($employeesGroup as $per)
                      
                      <tr>
                      <th scope="row">{{$per->ci}}</th>
                      <td>{{$per->nombre}} {{$per->apellido}}</td>
                      <td>{{$per->telefono}}</td>
                      <td>
                      <button type="button" class="btn btn-primary user_dialog"  data-myid="{{$per->peopleable_id}}"  data-descargar="{{$per->descargar}}" data-ocultar="{{$per->ocultar}}" data-lectura="{{$per->lectura}}" data-toggle="modal" data-target="#editModal" value="{{$per->peopleable_id}}" >
                          Ver permisos
                      </button>
                      
                      </td>
                      </tr>

                      @endforeach


                </tbody>
            </table> 

        </section>

  </div>

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar permisos: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-group" method="POST" action="/editarPermisos">
                @csrf 
                <h5>Selecciones los permisos en el grupo: </h5>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_group" id="id_group" value="{{$group->id}}">
                <label for="permisos">Permisos de grupo: </label>
                <div>
                    <label for="permisoLabel">Descargar</label>
                    <select  name="descargar" id="descargar">
                            <option  name="descargar" id="descargar3" selected></option>
                            <option name="descargar" id="descargar1" value="true">SI</option>
                            <option name="descargar" id="descargar2" value="false" >NO</option>
                    </select>
                    <input type="text" id="descargarInput" readonly>
  
                </div>
                <div>
                    <label for="permisoLabel">Ocultar</label>
                    <select  name="ocultar" id="ocultar">
                            <option  name="ocultar" id="ocultar3" selected></option>
                            <option name="ocultar" id="ocultar1" value="true">SI</option>
                            <option name="ocultar" id="ocultar2" value="false" >NO</option>
                    </select>
                    <input type="text" id="ocultarInput" readonly>
  
                </div>
                <div>
                    <label for="permisoLabel">Lectura</label>
                    <select  name="lectura" id="lectura">
                            <option  name="lectura" id="lectura3" selected></option>
                            <option name="lectura" id="lectura1" value="true">SI</option>
                            <option name="lectura" id="lectura2" value="false" >NO</option>
                    </select>
                    <input type="text" id="lecturaInput" readonly>
  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Añadir</button> 
                </div>
            </form>               
      </div>
    </div>
  </div>
</div>


  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
