<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(Auth::user()->type === 'admin')
                <li class="header">General</li>
                <li class="{{ Request::is('admin/inicio*') ? 'active' : ''  }}"><a href="/admin/inicio"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
                <li class="header">Configuraci&oacute;n General</li>
                @can('see_permission_role_menu')
                    <li class="{{ Request::is('admin/permisos*') ? 'active' : ''  }}"><a href="/admin/permisos"><i class="fa fa-lock"></i> <span>Permisos</span></a></li>
                    <li class="{{ Request::is('admin/roles*') ? 'active' : ''  }}"><a href="/admin/roles"><i class="fa fa-user"></i> <span>Roles</span></a></li>
                @endcan
            @endif
        </ul>
    </section>
</aside>
