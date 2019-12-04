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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Lista de Pacientes</h3>
          </div>
          <div class="card-body">
            <a href="/paciente" class="btn btn-primary">Nuevo Paciente</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>#</th>
                  <th>CI</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Sexo</th>
                  <th>Fecha Nacimiento</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($patients as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->ci}}</td>
                      <td>{{$value->nombre ." ". $value->apellido}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->telefono}}</td>
                      <td>{{$value->sexo}}</td>
                      <td>{{ \Carbon\Carbon::parse($value->fecha_nacimiento)->format('j F, Y') }} </td>
                      <td> <a href="{{ url('/paciente/'.$value->id.'/edit') }}" class="btn btn-primary">
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
