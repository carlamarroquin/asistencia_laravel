<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->usuario}}</div>
                    <div class="email">{{Auth::user()->correo}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">

                            <li><a href="{{url('/logout')}}"><i class="material-icons">input</i>Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="active">
                        <a href="{{url('/')}}">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person_add</i>
                            <span>Control de Usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('nuevo.usuario')}}">
                                    <span>Nuevo Usuario</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('consultar.docentes')}}">
                                    <span>Consultar Usuario</span>
                                </a>
                            </li>
                        </ul> 
                    </li>
                    <li >
                        <a href="{{url('/')}}">
                            <i class="material-icons">query_builder</i>
                            <span>Marcaciones</span>
                        </a>
                    </li>
            </div>
            <!-- #Menu -->

        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        