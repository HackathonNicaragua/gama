<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (!Auth::check())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('img/user.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Publico</p>
                    <!-- Status -->
                    {{-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a> --}}
                </div>
            </div>
        @else
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
                <!-- Validando el tipo de usuario que haces -->
                @if(Auth::user()->tipo == 3)
                <li class="header">Enfermeria</li>
                <li @if(Request::is('enfermeria/pacientes/*'))class="active" @endif><a href="{{url('enfermeria/pacientes/')}}">
                <i class= 'fa fa-users' ></i> Pacientes </a></li>
                <li  @if(Request::is('enfermeria/kardex/*'))class="active" @endif><a href="{{url('enfermeria/kardex/')}}">
                <i class= 'fa fa-file' ></i> Kardex </a></li>
                <li  @if(Request::is('enfermeria/hojas_medicas/*'))class="active" @endif><a href="{{url('enfermeria/hojas_medicas/')}}">
                <i class= 'fa fa-address-book-o ' ></i> Hojas Medicas </a></li>
                @elseif(Auth::user()->tipo == 2)
                    <li class="header">Recepcionista</li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-users'></i> <span>Pacientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('recepcionista/pacientes/')}}"><i class=""></i>Listar</a></li>
                            <li><a href="{{url('recepcionista/pacientes/ingreso')}}"><i></i>Registrar</a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->tipo == 1)
                    <li class="header">Médico</li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-users'></i> <span>Expedientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('doctor/expediente/ver')}}"><i class=""></i>Lista expedientes</a></li>
                            {{-- <li><a href="{{url('administrador/usuarios/crear')}}"><i></i>Registrar</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li class="header">Administrador</li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-users'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('administrador/usuarios/ver')}}"><i class=""></i>Listar</a></li>
                            <li><a href="{{url('administrador/usuarios/crear')}}"><i></i>Registrar</a></li>
                        </ul>
                    </li>
                @endif


        </ul><!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
