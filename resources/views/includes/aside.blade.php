<!-- Main Sidebar Container -->
  <aside class="@yield('aside-class')">
    <!-- Brand Logo -->
    <a id="logo" href="{{url('/home')}}" class="@yield('logoA-class')">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MedicHelp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth()->user()->imagenurl=="")
              <img src="{{ asset('imagenes/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
          @else()
              <img src="{{ Auth()->user()->imagenurl }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px;">
          @endif()

        </div>
        <div class="info">
          
        <li class="nav-item d-none d-sm-inline-block"><a href="javascript:void(0);" class="nav-link" onclick="cargarFormularioPerfil(<?=auth()->user()->id ?>);" >Usuario:{{ Auth()->user()->name }}</a></li>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>

          @if( Auth()->user()->existePermiso('Documentos') || Auth()->user()->name == 'admin')
            <!--Gestionar documentos-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Documentos<i class="right fas fa-angle-left"></i></p>
              </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <!--Agregar documentos -->
                     <a href="javascript:void(0);" onclick="mostrarFormularioDoc({{ Auth()->user()->id }} );" class="nav-link active">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>Cargar Documentos</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <!--Agregar documentos -->
                      <a href="javascript:void(0);" onclick="VistaGrupo({{ Auth()->user()->id }});" class="nav-link active">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>Agregar Doc a grupo</p>
                      </a>
                  </li>

                </ul>

            </li>
          @endif

          @if( Auth()->user()->existePermiso('Grupos') || Auth()->user()->name == 'admin')
          <li class="nav-item">
            <a href="{{url('/groups')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Grupos
              </p>
            </a>
          </li>
          @endif

          @if( Auth()->user()->existePermiso('Usuarios') || Auth()->user()->name == 'admin')
          <li class="nav-item has-treeview">
               <!-- Usuarios -->
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/empleados')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empleados</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{url('/pacientes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
                </a>
              </li>
              
            </ul>

          </li>
          @endif

          @if( Auth()->user()->existePermiso('Reportes') || Auth()->user()->name == 'admin')
          <li class="nav-item">
            <a href="{{url('/reportes')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reportes
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">

            <a href="{{url('/temas')}}" class="nav-link">

              <i class="nav-icon fas fa-brush"></i>
              <p>
                Temas
              </p>
            </a>
          </li>
          
          @if( Auth()->user()->existePermiso('Configuracion') || Auth()->user()->name == 'admin')
          <li class="nav-item has-treeview">
               <!-- Usuarios -->
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuracion
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{url('/especialidad')}}" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Especialidades</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('/services')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>
              
              
            </ul>

          </li>
          @endif


          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Bitacora
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>