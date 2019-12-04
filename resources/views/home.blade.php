@extends('layouts.app')

@section('body-class','hold-transition sidebar-mini layout-fixed')
@section('content')
<div class="wrapper">
  @include('includes.navbar')
  
  @include('includes.aside')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- contenido capas modales para no recargar todo el document-->
          <section> 
             <div id="capa_modal" class="div_modal" ></div>
             <div id="capa_para_edicion" class="div_contenido" > <div>
          </section>

    <!--inicio del contenido principal-->
    <section class="content" id="contenido_principal">
  
    	<div class="container-fluid" >
    		<h1>Hola Bienvenido   {{ auth()->user()->name }}</h1>


	

    	</div>
    	
    </section>
    <!--fin del contenido principal-->

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
