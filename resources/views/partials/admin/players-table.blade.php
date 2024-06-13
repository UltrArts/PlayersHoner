<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="row">
                <div class="col">
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
                <div class="col text-right" >
                    <button {{$selected_player?'':'disabled'}} type="reset" wire:click="$refresh" class="btn btn-dafault btn-sm">Limpar</button>
                    <button 
                        wire:click='retiring'  
                        {{-- wire:confirm="Tem certeza que quer {{OPTIONAL($selected_player)->is_retired? 'EMPREGAR' : 'REFORMAR'}} o Jogador {{OPTIONAL($selected_player)->id}} - {{OPTIONAL($selected_player)->name}} {{OPTIONAL($selected_player)->last_name}}" --}}
                        {{OPTIONAL($selected_player)?'':'disabled'}} 
                        class="btn btn-secondary btn-sm" >
                        Reformar/Empregar
                    </button>
                    <button 
                            wire:click='enable' 
                            {{-- wire:confirm="Tem certeza que quer {{OPTIONAL($selected_player)->is_available? 'DESACTIVAR' : 'ACTIVAR'}} o Jogador {{OPTIONAL($selected_player)->id}} - {{OPTIONAL($selected_player)->name}} {{OPTIONAL($selected_player)->last_name}}" --}}
                            {{$selected_player?'':'disabled'}} 
                            class="btn btn-dark btn-sm">
                            (Des)Activar
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body table-responsive">
        @if($players->count() != 0)
        <table class="table table-head-bg-success table-hover">
            <thead>
                <tr>
                    <th scope="col">Cód</th>
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Email</th>
                    <th>Telefones</th>
                    <th>Idade</th>
                    <th>Estado</th>                
                    <th>Disponibilidade</th>                
                </tr>   
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr class="{{optional($selected_player)->id==$player->id?'bg-success':''}}" wire:click="selectedRow('{{$player->id}}')">
                        <td> {{$player->id}} </td>
                        <td> {{$player->name}} </td>
                        <td>{{$player->last_name}} </td>
                        <td>{{$player->email}} </td>
                        <td>{{$player->tel}} @if(!empty($player->tel2)) e {{$player->tel2}} @endif</td>
                        <td>{{ Carbon\Carbon::parse($player->birth)->age }}</td>
                        <td class="{{$player->is_retired? "text-danger": "text-primary"}} "> <b>{{$player->is_retired? "Reformado": "Empregado"}} </b></td>
                        <td class="{{!$player->is_available? "text-danger": "text-primary"}} "> <b>{{!$player->is_available? "Inactivo": "Activo"}} </b></td>
                        {{-- 'id', 
                        'name', 
                        'last_name', 
                        'tel', 'tel2', 
                        'birth', 
                        'email',
                        'is_retired', 
                        'is_available', 
                        'is_pre_register', 
                        'user_id', 
                        'retirement_date'    ]; --}}
                    </tr>
                @endforeach

            </tbody>
        </table>
        <p class="text-muted">
            <span class="badge badge-success">ESTADO </span> O jogador pode ter o estado <b>empregado</b> ou <b>reformado</b>
            | <span class="badge badge-success">DISPONIBILIDADE </span> Quando <b>inativo</b>, o jogador pode ter várias limitações, como receber a pensão mensal, mas também pode estar <b>activo</b>
        </p>
    </div>
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