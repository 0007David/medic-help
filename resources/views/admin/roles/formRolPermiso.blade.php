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
              <h3 class="card-title">Asignacion de Permisos</h3>
            </div>
            <form method="post" action="{{ url('/roles/permisos/store') }}">
              @csrf
              <div class="card-body">
                <h3>{{$rol->nombre }}</h3>
                <h4>Permisos</h4>
                
                <!-- CAMPOS PERMISOS  -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" value="{{$rol->id}}" name="idRol">
                    @foreach($permisosRight as $key => $value)
                      <div class="form-check">
                        @if($rol->existePermiso($value->nombre))
                          <input class="form-check-input" name="permisos[]" value="{{$value->id}}" type="checkbox" checked>
                        @else
                        <input class="form-check-input" name="permisos[]" value="{{$value->id}}" type="checkbox" >
                        @endif
                        <label class="form-check-label">{{$value->nombre}}</label>
                      </div>
                    @endforeach
                    </div>
                  </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    @foreach($permisosLeft as $key => $value)
                      <div class="form-check">
                        @if($rol->existePermiso($value->nombre))
                          <input class="form-check-input" name="permisos[]" value="{{$value->id}}" type="checkbox" checked>
                        @else
                          <input class="form-check-input" name="permisos[]" value="{{$value->id}}" type="checkbox" >
                        @endif
                        <label class="form-check-label">{{$value->nombre}}</label>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
                  
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{url('/roles')}}" class="btn btn-default">cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection