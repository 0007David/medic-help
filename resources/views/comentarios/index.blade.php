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
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Comentario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                    <div class="col-md-3">
                    <button type="button" class="btn btn-primary user_dialog"  data-toggle="modal" data-target="#exampleModal">Nuevo Comentario +</button>
                    

                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Documento</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                                <img src="{{asset('/dist/img/documento.png')}}" class="rounded" alt="Cinque Terre" width="300" height="230">
                                <button class="btn btn-primary">Ver</button>
                        </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Info</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column" >
                            <li class="nav-item" style="margin:20px">
                                <i class="far fa-circle text-primary">Descripcion: </i>
                                {{$doc->descripcion}}
                            
                            </li>
                            <li class="nav-item" style="margin:20px">
                                <i class="far fa-circle text-primary">Fecha de creación:</i> 
                                {{$doc->fecha_creacion}}
                            </li>
                            <li class="nav-item" style="margin:20px">
                                <i class="far fa-circle text-primary">Observacion:</i> 
                                {{$doc->observaciones}}
                                
                            </li>
                        </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        <h3 class="card-title">Comentarios</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Comment">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                            <div class="float-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                            <thead>
                                <th></th>
                                <th>Usuario</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                
                            
                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                <td class="mailbox-name"><a href="read-mail.html">{{$comment->nombre}} {{$comment->apellido}}</a></td>
                                <td class="mailbox-subject"><b></b> {{$comment->descripcion}}
                                </td>
                                <td class="mailbox-date">{{$comment->created_at}}</td>
                            </tr>

                            @endforeach
                            
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th>Usuario</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                            </tfoot>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                            <div class="float-right">
                            1-50/200
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
                <a href="/home" class="btn btn-dark" style="margin:20px"><-ATRAS</a>
           
            </div>
            <!-- /.content-wrapper -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar permisos: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-group" method="POST" action="/comentarios/group/{{$idGrupo}}/document/{{$idDocument}}">
                @csrf 
                <h5>Nuevo Comentario: </h5>
                
                <textarea id="compose-textarea" name="descripcion" class="form-control" style="height: 300px"></textarea>
                 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Añadir</button> 
                </div>
            </form>  
      </div>
    </div>
  </div>
</div>

  @include('includes.footer')
  <!-- /.control-sidebar -->
  
</div>
<!-- ./wrapper -->
@endsection
