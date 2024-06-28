{{-- ============================ SEE PROFILE ============================= --}}

<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true"  data-bs-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                @php
                    $auth_player = Auth::user()->player;
                    $auth_account = $auth_player? $auth_player->account : null;
                @endphp
            <div class="card"> <img class="card-img-top" src="{{asset('assets/img/player.jpg')}} " 
                alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{asset('assets/img/profile.png')}}" alt="user"></div>
                    <h3 class="m-b-0"> {{Auth::user()->email}} </h3>
                    <p class="text-muted">  {{Auth::user()->name}}</p> <a  data-toggle="modal" data-target="#modalEditProfile"  href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-dismiss="modal" data-abc="true">Editar</a>
                    @if(Auth::user()->hasRole('player'))
                    <div class="row text-center m-t-20">
                        @if ($auth_player->is_pre_register)
                            <div class="col ">
                                <h4 class="">Confirmação de Registo Pendente.</h4>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"> {{$auth_player->is_retired?'Reformado': 'Activo'}} </h3><small class="text-muted">Estado</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"> {{$auth_account?$auth_account->balance:'Sem Conta'}} </h3><small class="text-muted">Saldo</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"> {{$auth_account?$auth_account->tax_value:'Sem Conta'}} </h3><small class="text-muted">Taxa</small>
                            </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


{{-- =============== EDIT PROFILE ======================= --}}
<div wire:ignore.self class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditProfile" aria-hidden="true"  data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card"> <img class="card-img-top" src="{{asset('assets/img/bg-login.jpg')}} " 
                alt="Card image cap">
    
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{asset('assets/img/profile.png')}}" alt="user"></div>
                    <h3 class="m-b-0"> {{Auth::user()->email}} </h3>
                    <div class="row text-center mt-2">
                        <form class="col" wire:submit.prevent='saveUser'>
                            @if(session()->has('success'))
                            <div class="form-group">
                                <span class="alert alert-success alert-sm rounded">Dados actualizados com sucesso!</span>
                            </div>
                            @endif
                            <div class="form-group  @error('old_pass') has-error @enderror">
                                <input wire:model='old_pass' type="password" class="form-control input-pill" id="old_pass" placeholder="Insira a senha actual">
                                @error('old_pass')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror 

                            </div>
                            <div class="form-group   @error('new_pass') has-error @else has-success  @enderror">
                                <input wire:model='new_pass' type="password" class="form-control input-pill" id="new_pass" placeholder="Insira a Nova Senha">
                                @error('new_pass')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror 
                            </div>
                            <div class="form-group   @error('new_pass_confirmation') has-error @else has-success @enderror">
                                <input wire:model='new_pass_confirmation' type="password" class="form-control input-pill" id="new_pass_confirmation" placeholder="Confirme a Nova Senha">
                                @error('new_pass_confirmation')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror 

                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-rounded">Actualizar</button>
                                <button type="submit" class="btn btn-default btn-rounded"  data-dismiss="modal">Fechar</button>
                            </div>
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>