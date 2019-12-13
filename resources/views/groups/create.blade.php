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

            <form class="form-group" method="POST" action="/groups">
                @csrf 
                <div class="form-group row">
                    <label for="groupName" class="col-sm-2 col-form-label">Nombre del grupo: </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="groupName"  name="nombre" placeholder="Nombre del nuevo grupo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="groupDescription" class="col-sm-2 col-form-label">Descripcion: </label>
                    <div class="col-sm-10">
                    <input type="textarea" class="form-control" id="groupDescription"  name="descripcion" placeholder="Descripcion del grupo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Grupo</button> 
            </form>
        </section>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
