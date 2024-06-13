<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            {{-- <div class="card"> <img class="card-img-top" src="{{asset('assets/img/bg-login.jpg')}} " alt="Card image cap"> --}}

                @php
                    $auth_player = Auth::user()->player;
                    $auth_account = $auth_player? $auth_player->account : null;
                @endphp


            <div class="card"> <img class="card-img-top" src="{{asset('assets/img/player.jpg')}} " 
                alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{asset('assets/img/profile.png')}}" alt="user"></div>
                    <h3 class="m-b-0"> {{Auth::user()->email}} </h3>
                    <p class="text-muted">  {{Auth::user()->name}}</p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Editar</a>
                    @if(Auth::user()->hasRole('player'))
                    <div class="row text-center m-t-20">
                        @if (!$auth_player->is_pre_register)
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