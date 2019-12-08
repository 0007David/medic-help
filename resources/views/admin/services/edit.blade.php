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
    @include('common.errors')
      <form class="form-group" method="POST" action="/services/{{$service->id}}">
        @method('PUT')
        @csrf 
        <div class="form-group row">
          <label for="serviceName" class="col-sm-2 col-form-label">Nombre de servicio: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="serviceName"  name="nombre" value="{{$service->nombre}}">
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button> 
      
      </form>
    </section>
      
  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
