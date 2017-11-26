<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('img/user.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    {{-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a> --}}
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">       
                <!-- Validando el tipo de usuario que haces -->
                @if(Auth::user()->tipo == 3)                                                
                <li class="header">Enfermeria</li>                                 
                <li @if(Request::is('enfermeria/pacientes/*'))class="active" @endif><a href="{{url('enfermeria/pacientes/')}}">
                <i class= 'fa fa-users' ></i> Pacientes </a></li>
                <li  @if(Request::is('enfermeria/kardex/*'))class="active" @endif><a href="{{url('enfermeria/kardex/')}}">
                <i class= 'fa fa-file' ></i> Kardex </a></li>

                 @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
