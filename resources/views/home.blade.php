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
    <section> 
             <div id="capa_modal" class="div_modal" ></div>
             <div id="capa_para_edicion" class="div_contenido" > <div>
          </section>

    <section class="content" id="contenido_princinpal">

      <div class="container-fluid">
        <h1>Hola Bienvenido {{ auth()->user()->name }}</h1>

        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary card-outline">
              <!-- <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div> -->
              <!-- /.card-body -->
            </div>

            <!-- GRUPOS RECIENTES -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Grupos </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                      class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

                <table class="table table-striped">
                  <thead class="bg-success">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($groupsEmployee as $ge)

                    <tr>
                      <th scope="row">1</th>
                      <td>{{$ge->nombre}}</td>
                      <td>{{$ge->descripcion}}</td>
                    </tr>

                    @endforeach

                  </tbody>
                </table>


                <a href="/groups" class="btn btn-success">Ver Todos</a>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Documentos Recientes </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                      class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">

                <button type="button" class="btn btn-primary">Ver</button>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- HISTORIAL -->

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                    alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>


          </div>

        </div>

      </div>

    </section>

     <!-- cargador empresa -->
     <div style="display: none;" id="cargador_empresa" align="center">
            <br>
         

           <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

           <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Procesando...</label>

            <br>
           <hr style="color:#003" width="50%">
           <br>
       </div>
     <!--fin del cargador de la empresa-->

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection