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
        <a href="/services/create" class="btn btn-success " style="text-align:right">Agregar+</a>
            
            <table class="table table-striped">
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

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
