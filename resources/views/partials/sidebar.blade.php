<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/img/profile.png')}}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#userDetails" aria-expanded="true">
                    <span>
                        {{Auth::user()->name}}
                        <span class="user-level"> {{Auth::user()->getRoleNames()[0]=='admin'?'Administrador':'Jogador'}}</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="userDetails" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#"   data-toggle="modal" data-target="#modalProfile">
                                <span class="link-collapse">Perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalEditProfile">
                                <span class="link-collapse">Editar Perfil</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{$page=='dashboardTab'? 'active':''}}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    {{-- <span class="badge badge-count">5</span> --}}
                </a>
            </li>
            @if(auth()->user()->hasRole('admin'))
                @include('partials.admin.menu-items')
            @else
                @include('partials.player.menu-items')
            @endif
            <li class="nav-item log-out">
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit">
                        <i class="la la-power-off"></i>
                        <p>Logout</p>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>