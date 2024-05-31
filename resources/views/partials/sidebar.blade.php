<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/img/profile.jpg')}}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#userDetails" aria-expanded="true">
                    <span>
                        Edson Da Cruz
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="userDetails" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">Perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Editar Perfil</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{$page=='dashboardTab'? 'active':''}}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item {{$page=='playersTab'? 'active':''}}">
                <a href="{{ route('admin.players') }}">
                    <i class="la la-users"></i>
                    <p>Jogadores</p>
                    <span class="badge badge-count">14</span>
                </a>
            </li>
            <li class="nav-item {{$page=='accountTab'? 'active':''}}">
                <a href="{{ route('admin.accounts') }}">
                    <i class="la la-credit-card"></i>
                    <p>Contas</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>
            <li class="nav-item {{$page=='settingsTab'? 'active':''}}">
                <a href="{{ route('admin.settings') }}">
                    <i class="la la-cogs"></i>
                    <p>Configurações</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item {{$page=='incomingsTab'? 'active':''}}">
                <a href="{{ route('admin.incomings') }}">
                    <i class="la la-bank"></i>
                    <p>Contribuições</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>
            <li class="nav-item {{$page=='outcomingsTab'? 'active':''}}">
                <a href="{{ route('admin.outcomings') }}">
                    <i class="la la-money"></i>
                    <p>Pagamentos</p>
                    <span class="badge badge-danger">25</span>
                </a>
            </li>
            <li class="nav-item log-out">
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit"  data-toggle="modal" data-target="#modalUpdate">
                        <i class="la la-power-off"></i>
                        <p>Logout</p>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>