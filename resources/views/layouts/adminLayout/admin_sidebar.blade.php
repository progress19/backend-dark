       
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

              <div class="logo-login">
                  <h3>COMPRAS - VLL</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/default-user.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hola!</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                  
                  <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i> Home </a></li>

                  <li><a><i class="fa fa-folder-open"></i> Boletas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="{{ url('/admin/view-boletas') }}"> Consulta</a></li>
                      <li><a href="{{ url('/admin/add-boleta') }}"> Nueva boleta</a></li>
                      <li><a href="{{ url('/admin/informe-boletas') }}">Informe</a></li>
                                            
                    </ul>
                  </li>
                                  

                  <li><a><i class="fa fa-file-powerpoint-o"></i> Partes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/add-parte') }}">Nuevo parte</a></li>
                      <li><a href="{{ url('/admin/view-partes') }}">Ver partes</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-dollar"></i> Liquidaciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="{{ url('/admin/view-depo') }}">Consulta general</a></li>
                      <li><a href="{{ url('/admin/add-file-boletas') }}">Procesar boletas liquidadas</a></li>
                      <li><a href="{{ url('/admin/add-file') }}">Procesar archivo Supervielle</a></li>
                      <li><a href="{{ url('/admin/add-fileN') }}">Procesar archivo Nación</a></li>
                      <li><a href="{{ url('/admin/exportarLiquidaciones_view') }}">Exportar a Excel</a></li>
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-bars"></i> Etapas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/add-etapa') }}">Nueva etapa</a></li>
                      <li><a href="{{ url('/admin/view-etapas') }}">Ver etapas</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-building-o"></i> Juzgados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/add-juzgado') }}">Nuevo juzgado</a></li>
                      <li><a href="{{ url('/admin/view-juzgados') }}">Ver juzgados</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-user-plus"></i> Of. de Justicia <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/add-oficial') }}">Nuevo oficial</a></li>
                      <li><a href="{{ url('/admin/view-oficiales') }}">Ver oficiales</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-fire"></i> Impuestos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/add-impuesto') }}">Nuevo impuesto</a></li>
                      <li><a href="{{ url('/admin/view-impuestos') }}">Ver impuestos</a></li>
                    </ul>
                  </li>

                  <li><a href="{{ url('/admin/edit-indices/1') }}"><i class="fa fa-gear"></i> Configuración</a></li>

                  <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin/agregar-usuario') }}">Nuevo Usuario</a></li>
                      <li><a href="{{ url('/admin/ver-usuarios') }}">Ver Usuarios</a></li>
                    </ul>
                  </li>

                </ul>
              </div>

            </div> 
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}" style="width: 100%;">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

