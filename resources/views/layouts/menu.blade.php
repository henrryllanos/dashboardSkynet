
            @can('solicitud_index')
            <li class="nav-item {{ request()->is('solicitudes') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('solicitudes')}}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    {{-- <i class="bi bi-123"></i> --}}
                    <span>{{ __('Lista de Solicitudes') }}</span>
                </a>
            </li>
            @endcan

            @can('crear_reserva')
            <li class="nav-item  {{ request()->is('solicitar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('solicitudes.create') }}">
                    <span>{{ __('Nueva solicitud') }}</span></a>
            </li>
            @endcan

            @can('ambiente_index')
            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.index', ['tipo'=> 'all' ])}}">
                        <span>{{ __('Lista de Ambiente') }}</span>
                    </a>
            </li>
            @endcan

            @can('ambiente_create')
            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.create')}}">
                        <span>{{ __('Crear Ambientes') }}</span>
                    </a>
            </li>
            @endcan

            @can('ambiente_edit')
            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.editar')}}">
                        <span>{{ __('Editar Ambientes') }}</span>
                    </a>
            </li>
            @endcan

            @can('ambienteR_index')
            <li class="nav-item  {{ request()->is('ambientesR') ? 'active' : '' }}" >
                <a class="nav-link" href="{{ route('admin.ambientes.index', ['tipo'=> 'admin']) }}">
                    <span>{{ __('Ambientes Reservadas') }}</span></a>
            </li>
            @endcan

            @can('materia_index')
            <li class="nav-item {{ request()->is('solicitar*')  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.materias.index', ['tipo' => 'admin']) }}">
                    <span>{{ __('Listas Materias') }}</span></a>
            </li>
            @endcan

            @can('materia_create')
            <li class="nav-item {{ request()->is('solicitar*')  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.materias.create') }}">
                    <span>{{ __('Crear Materias') }}</span></a>
            </li>
            @endcan

            @can('materia_edit')
            <li class="nav-item {{ request()->is('solicitar*')  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.materias.editar') }}">
                    <span>{{ __('Editar Materias') }}</span></a>
            </li>
            @endcan

            @can('asignar_index')
            <li class="nav-item {{ request()->is('solicitar*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.docMaterias.index')}}">
                        <span>{{ __('Asignar Materia a Docente') }}</span>
                    </a>
            </li>
            @endcan

            @can('user_index')
            <li class="nav-item {{ request()->is('usuarios')  ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.usuarios.index')}}">
                    <span>{{ __('Lista de Usuarios') }}</span></a>
            </li>
            @endcan

            @can('user_create')
            <li class="nav-item {{ request()->is('usuarios')  ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.usuarios.create')}}">
                    <span>{{ __('Crear Usuarios') }}</span></a>
            </li>
            @endcan

            <!-- Nav Item - Notificaciones -->
            @can('notificacion_index')
            <li class="nav-item {{ request()->is('notificaciones')  ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.notificaciones.index')}}">
                    <span>{{ __('Notificaciones de Reserva') }}</span></a>
            </li>
            @endcan

            @can('role_index')
            <li class="nav-item {{ request()->is('roles') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roles.index') }}" >
                    <span>{{ __('Roles') }}</span></a>
            </li>
            @endcan

            @can('role_create')
            <li class="nav-item {{ request()->is('roles') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roles.create') }}" >
                    <span>{{ __('Create Roles') }}</span></a>
            </li>
            @endcan
        </ul>
