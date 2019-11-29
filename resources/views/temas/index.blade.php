@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @include('includes.navbar')

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
                <h3 class="card-title ">Formulario de Empleado</h3>
              </div>
              <!-- /.card-header -->

              <!-- FORM STAR -->
              <form role="form" method="post" action="{{ url('empleado/store') }}">
                @csrf
                <div class="card-body">
                  <!-- nombre tema -->
                  <div class="form-group col-md-8 offset-md-2">
                        <label>Nombre de Tema</label>
                        <select class="form-control" id="nombreTema" name="tema">
                        <option>elige un tema</option>  
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
                    <select  class="form-control" name="rol"  name="tipoFuenteTituloMenu"> 
                        <option selected value="Arial">Arial</option>
                        <option value="Verdana ">Verdana </option>
                        <option value="Impact ">Impact </option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Serif">Serif</option>
                        <option value="Sans-serif">Sans-serif</option>
                        <option value="monospace">Monospace</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="inherit">Inherit</option>
                        <option value="initial">Initial</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="italic">italic</option>
                    </select>
                  </div>
                  <!-- nombre FONT SIZE -->
                  <div class="form-group col-md-8 offset-md-2"> 
                    <label>Font SIZE</label>          
                    <select  class="form-control" name="rol"  name="tipoFuenteTituloMenu"> 
                        <option selected value="Arial">8</option>
                        <option value="Verdana ">16</option>
                        <option value="Impact ">24 </option>
                        <option value="Comic Sans MS">26</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('/empleados') }}" class="btn btn-default">cancelar</a>
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
