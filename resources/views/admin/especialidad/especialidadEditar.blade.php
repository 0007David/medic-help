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
        <h1>EDITAR ESPECIALIDAD</h1>
    </div>
    <div class="container-fluid col-8">
     
        <div class="card card-primary float-center">
              <div class="card-header">
                <h3 class="card-title">Editar Especialidad</h3>
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
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="/especialidad/{{ $especialidad->id }}/edit">
                 <!-- @method('PUT') -->
                 @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <label  class="float-left">Nombre de Especialidad</label>
                    <input type="text" class="form-control"  name="nombre" placeholder="Editar texto" value="{{ $especialidad->nombre }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ url('/especialidad') }}" class="btn btn-danger col-4">Cancelar</a>
                  <!-- <button type="submit" class="btn btn-danger col-4">Cancelar</button> -->
                  <button type="submit" class="btn btn-primary col-4">Editar</button>
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
