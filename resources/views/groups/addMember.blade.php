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
            <h1>Agregar Participantes:</h1>
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
                <a href="/groups" class="btn btn-dark" style="margin:20px"><-ATRAS</a>


                    @if (count($person) === 0)
                        <p class='alert alert-danger'>No hay empleados a agregar</p>
                    @else
                                        

                      @foreach($person as $per)

                      <tr>
                      <th scope="row">{{$per->ci}}</th>
                      <td>{{$per->nombre}} {{$per->apellido}}</td>
                      <td>{{$per->telefono}}</td>
                      <td>
                      <button type="button" class="btn btn-primary user_dialog" data-myid="{{$per->peopleable_id}}" data-toggle="modal" data-target="#exampleModal" value="{{$per->peopleable_id}}" >
                          Añadir
                      </button>
                      
                      </td>
                      </tr>

                      @endforeach


                </tbody>
            </table> 

        </section>

  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar permisos: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-group" method="POST" action="/addMember">
                @csrf 
                <h5>Selecciones los permisos en el grupo: </h5>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_group" id="id_group" value="{{$id}}">
                <label for="permisos">Permisos de grupo: </label>
                <div>
                    <input type="checkbox" name="descargar" id="descargar" value="true"> Descarga
                    <input type="checkbox" name="ocultar" id="ocultar" value="true"> Ocultar
                    <input type="checkbox" name="lectura" id="lectura" value="true"> Lectura
                </div>
                    <div class="container" style="margin-top:30px">
                      <h4 >Ayuda+</h4>
                      <a href="#" class="btn btn-success" data-toggle="popover" title="DESCARGAR" data-content="El ususario tiene permiso para descargar los documentos del grupo">Descargar?</a>
                      <a href="#" class="btn btn-info" data-toggle="popover" title="LECTURA" data-content="El ususario solo tiene servicio para leer, no para escribir">Lectura?</a>
                      <a href="#" class="btn btn-danger" data-toggle="popover" title="OCULTAR" data-content="El ususario tiene permiso para ocultar documentos en un grupo">Ocultar?</a>
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

@endif

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
