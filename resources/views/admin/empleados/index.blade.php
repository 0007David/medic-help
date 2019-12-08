@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @section('nav-class', auth()->user()->tema_nav_bar)
  @include('includes.navbar')
  
  @section('aside-class', auth()->user()->tema_aside)
  
  @section('logoA-class-class', auth()->user()->tema_logo)
  @include('includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Lista de Empleados del Sistemas</h3>
          </div>
          
          <div class="card-body">
          
            <a href="/empleado" class="btn btn-primary">Nuevo Empleado</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>CI</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Sexo</th>
                  <th>Fecha Nacimiento</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($employees as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->ci}}</td>
                      <td>{{$value->nombre ." ". $value->apellido}}</td>
                      <td>{{$value->telefono}}</td>
                      <td>{{$value->sexo}}</td>
                      <td>{{ \Carbon\Carbon::parse($value->fecha_nacimiento)->format('j F, Y') }}
                      </td>
                      <td> <a href="{{ url('/empleado/'.$value->id.'/edit') }}" class="btn btn-primary">
                      <i class="fas fa-edit"></i>
                        </a> </td>
                      <td> <button class="btn btn-danger"><i class="fas fa-eraser"></i></button> </td>
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
