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
            <div class="widget-user-header bg-info" style="padding:100px">
                    <h1 class="widget-user-username">{{$group->nombre}}</h1>
                    <h5 class="widget-user-desc">{{$group->descripcion}}</h5>
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Integrantes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <a href="/listaPermisosGrupo/{{$group->id}}" class="btn btn-dark" style="margin:5px;  width:80px ; height:50pxpx;">Conf</a>
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead class="bg-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">CI</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">RolGrupo</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($employeesGroup as $eg)

                                <tr>
                                <th scope="row">1</th>
                                <td>{{$eg->ci}}</td>
                                <td>{{$eg->nombre}} {{$eg->apellido}}</td>

                                @if ($eg->rolGrupo === 'ad')
                                   <td><button class="btn btn-warning">Anfitrión</button></td>
                                @else
                                <td><button class="btn btn-secondary">Participante</button></td>
                                @endif
                                
                                </tr>

                                @endforeach

                            </tbody>
                        </table>     
                        
                        <a class="btn btn-primary" href="/groups/{{$group->id}}/listMember">Añadir+</a>
                    </div>
                    <!-- /.card-body -->
                    </div>

                    

                    
                </div>
                   
                <div class="col-md-8">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Documentos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>

                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                            <thead class="bg-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col">Fecha Creación</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($documents as $doc)

                                <tr>
                                <th scope="row">1</th>
                                <td>{{$doc->descripcion}}</td>
                                <td>{{$doc->observaciones}}</td>
                                <td>{{$doc->fecha_creacion}}</td>
                            
                                </tr>

                                @endforeach

                            </tbody>
                        </table>     
                        
                        <button type="button" class="btn btn-primary">Ver</button>
                    </div>
                    <!-- /.card-body -->
                    </div>

                    

                    
                </div>
                
            </div>
        </section>
        <a href="/groups" class="btn btn-dark" style="margin:20px"><-ATRAS</a>

  </div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
