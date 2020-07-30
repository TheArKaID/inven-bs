<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Halo, {{ auth()->user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Akun sejak: {{ auth()->user()->diffForHumanDate(auth()->user()->created_at) }}</div>
            <a href="{{ route('settings')}}" class="dropdown-item has-icon {{ Request::segment(2) === 'settings' ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
</nav>