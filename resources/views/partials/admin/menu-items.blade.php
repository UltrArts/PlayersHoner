<li class="nav-item {{$page=='playersTab'? 'active':''}}">
    <a href="{{ route('admin.players') }}">
        <i class="la la-users"></i>
        <p>Jogadores</p>
        {{-- <span class="badge badge-count">14</span> --}}
    </a>
</li>
<li class="nav-item {{$page=='accountTab'? 'active':''}}">
    <a href="{{ route('admin.accounts') }}">
        <i class="la la-credit-card"></i>
        <p>Contas</p>
        {{-- <span class="badge badge-count">50</span> --}}
    </a>
</li>
<li class="nav-item {{$page=='settingsTab'? 'active':''}}">
    <a href="{{ route('admin.settings') }}">
        <i class="la la-cogs"></i>
        <p>Configurações</p>
        {{-- <span class="badge badge-count">6</span> --}}
    </a>
</li>
<li class="nav-item {{$page=='transactionsTab'? 'active':''}}">
    <a href="{{ route('admin.transactions') }}">
        <i class="la la-money"></i>
        <p>Transações</p>
        {{-- <span class="badge badge-danger">25</span> --}}
    </a>
</li>
<li class="nav-item {{$page=='bankTab'? 'active':''}}">
    <a href="{{ route('admin.bank') }}">
        <i class="la la-bank"></i>
        <p>Banco</p>
        {{-- <span class="badge badge-danger">25</span> --}}
    </a>
</li>

