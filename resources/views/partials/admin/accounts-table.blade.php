<div class="card">
    <div class="card-header">
        <div class="card-title">
            <ul class="nav nav-pills nav-default">
                <i class="la la-filter la-2x mr-2"></i>
                <li class="nav-item ">
                    <a type="button" class="nav-link btn-sm {{$filter == $filterOpt[0]? 'active' : ''}} " wire:click.prevent="filtering('{{$filterOpt[0]}}')" href="#">Todos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[1]? 'active' : ''}} "  wire:click.prevent="filtering('{{$filterOpt[1]}}')"  href="javascript:void(0)">Activos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[2]? 'active' : ''}} "  wire:click.prevent="filtering('{{$filterOpt[2]}}')"  href="javascript:void(0)">Reformados</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[3]? 'active' : ''}}  "  wire:click.prevent="filtering('{{$filterOpt[3]}}')"  href="javascript:void(0)">Pré-Registados</a>
                </li>
            </ul>

        </div>
    </div>
    <div class="card-body table-responsive">
        @if ($accounts->count() != 0)
        <table class="table table-head-bg-success table-hover">
            <thead>
                <tr>
                    <th scope="col">Cód</th>
                    <th>Nr Conta</th>
                    <th>NIB</th>
                    <th>Banco</th>
                    <th>Nome Proprietário</th>
                    <th>Saldo</th>                
                    <th>Estado</th>                
                </tr>   
            </thead>
            <tbody>
                    @foreach ($accounts as $account)
                    <tr>
                            
                        <td>{{$account->id}}</td>
                        <td> {{$account->account_number}} </td>
                        <td> {{$account->account_nib}} </td>
                        <td> {{$account->bank->bank_name}} </td>
                        <td> {{$account->player->name}} {{$account->player->last_name}} </td>
                        <td> {{$account->balance}} </td>
                        {{-- <td> {{$account->is_available}} </td> --}}
                        <td>
                            <label class="form-check-label btn btn-success btn-sm">
                                {{-- <input class="form-check-input" type="checkbox" {{$account->is_available?'checked':''}} > --}}
                                <span class="form-check-sign text-white">Activo</span>
                            </label>
                        </td>
                    </tr>
                    @endforeach
                    
            </tbody>
        </table>
        <p class="text-muted">
            <span class="badge badge-success">ESTADO </span> A conta com o estado <b>INACTIVO</b> não pode receber pensão.
            
        </p>
        @else
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <img class="img-fluid" src="{{asset('assets/img/404.gif')}}" alt="">
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>