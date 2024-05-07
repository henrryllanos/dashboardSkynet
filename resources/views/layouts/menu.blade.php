
            <li class="nav-item {{ request()->is('solicitar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.solicitudesR.create') }}">
                    <span>{{ __('Solicitud de Reserva') }}</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('solicitudes') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.solicitudesR.index')}}">
                    <span>{{ __('Lista de Solicitudes') }}</span>
                </a>
            </li>


            <li class="nav-item {{ request()->is('ambientes*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.ambientes.index', ['tipo'=> 'all' ])}}">
                        <span>{{ __('Lista de Ambiente') }}</span>
                    </a>
            </li>


            <li class="nav-item {{ request()->is('solicitar*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.docenteM.index')}}">
                        <span>{{ __('Registrar Docente') }}</span>
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
        </ul>
