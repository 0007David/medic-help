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
  @include('common.success')
        <h2 style="margin-bottom:50px;text-align:center">Lista de Servicios:</h2>
        <div class="row mb-2">
          <a href="{{url('/services/create')}}" class="btn btn-success " style="text_align:right">Agregar+</a>
          <button type="button" class="btn btn-primary user_dialog"  data-toggle="modal" data-target="#exampleModal" >Ayuda+</button>
          
        </div>    
            <table id="servicio" class="table table-striped table-hover display nowrap">
                <thead class="bg-primary">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($services as $service)

                    <tr>
                    <th scope="row">1</th>
                    <td>{{$service->nombre}}</td>
                    <td>
                        <a href="/services/{{$service->id}}/edit" class="btn btn-info">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    
                    
                    </td>
                    </tr>

                    @endforeach



                </tbody>
            </table>
   
  </div>



  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ayuda servicios: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                    <div class="container" style="margin-top:30px">
                      <h4 >Ayuda+</h4>
                      <small>¿Cúal es la función de cada uno de los botones de la gestion de servicios?</small>
                      <div style="margin-bottom:20px">
                      <a href="#" class="btn btn-success" data-toggle="popover" title="AGREGAR" data-content="Permite ir hacia el formulario para añadir un nuevo servicio">Añadir?</a>
                      </div>
                      <div style="margin-bottom:20px">
                      <a href="#" class="btn btn-info" data-toggle="popover" title="EDITAR" data-content="Permite editar la informacion del servicio, formulario para editar">Editar?</a>
                      </div>
                      <div style="margin-bottom:20px">
                        <a href="#" class="btn btn-danger" data-toggle="popover" title="OCULTAR" data-content="Permite ocultar o eliminar de forma logica un servicio">Ocultar?</a>
                      </div>
                    </div>
                 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>             
      </div>
    </div>
  </div>
</div>


  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
