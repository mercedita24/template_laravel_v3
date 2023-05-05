{{-- Obtener la ruta actual --}}
@php $route = Route::current()->getName();  @endphp

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Pagina publica</li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, '/') !== false ?: 'collapsed'}}" href="{{ url('/') }}">
                <i class="bi bi-globe"></i>
                <span>Pagina publica</span>
            </a>
        </li>

        <li class="nav-heading">Administración</li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, 'dashboard') !== false ?: 'collapsed'}}" href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, 'auditar') !== false ?: 'collapsed'}}" href="{{ url('auditar') }}">
                <i class="fas fa-history"></i>
                <span>Auditoria</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, 'error_log') !== false ?: 'collapsed'}}" href="{{ url('error_log') }}">
                <i class="bi bi-bug-fill"></i>
                <span>Error log</span>
            </a>
            {{-- <span class="badge bg-danger badge-menu">7 new</span> --}}
        </li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, 'ejemplo') !== false ?: 'collapsed'}}" href="{{ url('ejemplo') }}">
                <i class="fa fa-info-circle"></i>
                <span>Crud de ejemplo</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{strpos($route, 'queue_control') !== false ?: 'collapsed'}}" href="{{ url('queue_control') }}">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Procesos en segundo plano</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{(strpos($route, 'permiso') !== false || strpos($route, 'role') !== false || strpos($route, 'usuario') !== false) ? '' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Roles y permisos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content {{(strpos($route, 'permiso') !== false || strpos($route, 'role') !== false || strpos($route, 'usuario') !== false)? 'show' : 'collapse'}}" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link collapsed {{strpos($route, 'permiso') !== false ? 'active' : ''}}" href="{{ url('permiso') }}">
                        <i class="bi bi-circle"></i><span>Permisos</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link collapsed {{strpos($route, 'role') !== false ? 'active' : ''}}" href="{{ url('role') }}">
                        <i class="bi bi-circle"></i><span>Roles</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link collapsed {{strpos($route, 'usuario') !== false ? 'active' : ''}}" href="{{ url('usuario') }}">
                        <i class="bi bi-circle"></i><span>Usuarios</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside>
<!-- End Sidebar-->
