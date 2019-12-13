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
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <p>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title ">Formulario de Temas</h3>
              </div>
              <!-- /.card-header -->

              <!-- FORM STAR -->
              <form role="form" method="post" action="{{ url('/temas/store') }}">
                @csrf
                <div class="card-body">
                  <!-- nombre tema -->
                  <div class="form-group col-md-8 offset-md-2">
                        <label>Nombre de Tema</label>
                        <select class="form-control" id="nombreTema" name="nombre" required>
                        <option value="">elige un tema</option>  
                          <option>DARK DRACULA</option>
                          <option>LIGHT</option>
                          <option>BLUE</option>
                          <option>GREEN</option>
                          <option>GRAY</option>
                        </select>
                    </div>   
                    <!-- nombre Fuente -->
                  <div class="form-group col-md-8 offset-md-2"> 
                    <label>Nombre de Fuente</label>          
                    <select  class="form-control" id="fuente"  name="fuente" required> 
                        <option value="" >elija una fuente</option>
                        <option value="default" >por defecto</option>
                        <option value="arial">Arial</option>
                        <option value="Source Sans Pro ">Sans Pro </option>
                        <option value="Impact,Charcoal">Impact </option>
                        <option value="cursiva">Cursiva</option>
                        <option value="serif">Serif</option>
                        <option value="sans-serif">Sans-serif</option>
                        <option value="monospace">Monospace</option>
                        <option value="inherit">Inherit</option>
                        <option value="initial">Initial</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="italic">italic</option>
                    </select>
                  </div>
                  <!-- nombre FONT SIZE -->
                  <div class="form-group col-md-8 offset-md-2"> 
                    <label>Font SIZE</label>          
                    <select  class="form-control" id="fontSize" name="fontSize" required> 
                        <option >Elija un nro de fuente</option>
                        <option value="8">8</option>
                        <option value="12">12</option>
                        <option value="16">16 </option>
                        <option value="24">24</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('/home') }}" class="btn btn-default">cancelar</a>
                </div>
              </form>

            </div>
            <!-- /.card card-secondary -->
          </div>
          <!-- ./col-md-8 offset-md-2 -->

        </div>
        <!-- /.row -->

      </div>
      <!-- ./container-fluid   -->
      
    
    </section>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
