
            <li class="nav-item {{ request()->is('solicitar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.solicitudesR.create') }}">
                    <span>{{ __('Solicitud de reserva de ambinete') }}</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('solicitudes') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.solicitudesR.index')}}">
                    <span>{{ __('Lista de solicitudes de reserva') }}</span>
                </a>
            </li>


            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.index', ['tipo'=> 'all' ])}}">
                        <span>{{ __('Ver ambientes registrados') }}</span>
                    </a>
            </li>


            <li class="nav-item {{ request()->is('solicitar*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.docenteM.index')}}">
                        <span>{{ __('Asignar Materia') }}</span>
                    </a>
            </li>


            <li class="nav-item  {{ request()->is('ambientesR') ? 'active' : '' }}" >
                <a class="nav-link" href="{{ route('admin.ambientes.index', ['tipo'=> 'admin']) }}">
                    <span>{{ __('Ambientes Reservadas') }}</span></a>
            </li>



            <li class="nav-item {{ request()->is('solicitar')  ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <span>{{ __('Lista Materias') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('solicitar')  ? 'active' : ''}}">
                <a class="nav-link" href="#">
                    <span>{{ __('Materias de Docentes') }}</span></a>
            </li>

            <li class="nav-item {{ request()->is('usuarios')  ? 'active' : ''}}">
                <a class="nav-link" href="{{route('admin.usuarios.index')}}">
                    <span>{{ __('Registrar Usuarios') }}</span></a>
            </li>
        </ul>
