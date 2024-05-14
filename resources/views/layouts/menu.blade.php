
            @can('solicitud_index')
            <li class="nav-item {{ request()->is('solicitar') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.solicitudes.index')}}">
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

            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.index', ['tipo'=> 'all' ])}}">
                        <span>{{ __('Lista de Ambiente') }}</span>
                    </a>
            </li>

            @can('ambienteR_index')
            <li class="nav-item  {{ request()->is('ambientesR') ? 'active' : '' }}" >
                <a class="nav-link" href="{{ route('admin.ambientes.index', ['tipo'=> 'admin']) }}">
                    <span>{{ __('Ambientes Reservadas') }}</span></a>
            </li>
            @endcan

            @can('materia_index')
            <li class="nav-item {{ request()->is('solicitar*')  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.materias,index', ['tipo' => 'admin']) }}">
                    <span>{{ __('Listas Materias') }}</span></a>
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
                    <span>{{ __('Registrar Usuarios') }}</span></a>
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
        </ul>
