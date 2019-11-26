@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @include('includes.navbar')

  @include('includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
          </div>
          
          <div class="card-body">
          
            <a href="/nuevo" class="btn btn-primary">Nuevo Empleado</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Sexo</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($employees as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->nombre ." ". $value->apellido}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->telefono}}</td>
                      <td>{{$value->sexo}}</td>
                      <td> <a href="{{ url('/empleado/'.$value->id.'/edit') }}" class="btn btn-primary">
                            <i class="fa fa-collection"></i>
                        </a> </td>
                      <td> <button class="btn btn-primary">Eliminar</button> </td>
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
