<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Transações</h4>


            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="row">
                            <div class="col">
                                <ul class="nav nav-pills nav-default">
                                    <i class="la la-filter la-2x mr-2"></i>
                                    <form class="navbar-left navbar-form nav-search mr-md-3" action="#">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-search search-icon"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                            <form class="col-md-2 text-right" wire:submit.prevent='payPlayer'>
                                @csrf
                                <div class="input-group">
                                    <input wire:model="value" type="number" class="form-control form-control-sm " {{$selected_trans?'':'disabled'}} placeholder="Valor" aria-label="">
                                    <button class="btn btn-outline-primary btn-sm" type="submit"{{$selected_trans?'':'disabled'}}><i class="la la-money la-lg"> </i> Pagar</button>
                                </div>
                            </form>
                            <button wire:click="clearFields" class="btn btn-outline-default btn-sm mr-3" {{$selected_trans?'':'disabled'}}>Cancelar</button>
                        </div>
            
                    </div>
                </div>
                <div class="card-body table-responsive">
                @if($trans->count() != 0)
                    <table class="table table-head-bg-success table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cod</th>
                                <th>Jogador</th>
                                <th>Nr Conta</th>
                                <th>Tipo Transação</th>
                                <th>Valor transferido</th>
                                <th>Data</th>                
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach ($trans as $tra)
                                <tr style="cursor: pointer;" class="{{(optional($selected_trans)->id === $tra->id)?'bg-success':''}}" wire:click="selectedRow('{{$tra->id}}')">
                                    <td> {{$tra->id}} </td>
                                    <td> {{$tra->account->player->name}} {{$tra->account->player->last_name}} </td>
                                    <td> {{$tra->account->account_number}} </td>
                                    <td> {{($tra->transactionType->type == 'credit')?'Crédito':'Débito'}} </td>
                                    <td class="{{ ($tra->transactionType->type == 'debit')? 'text-danger':''}} font-weight-bold"> 
                                        {{($tra->transactionType->type == 'debit')? '-'. number_format($tra->value, 2, '.', ',') .' Mzn' :  number_format($tra->value, 2, '.', ',') .' Mzn'}} 
                                    </td>
                                    <td> {{$tra->created_at->format('d/m/Y H:i:s')}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="demo">
                        <ul class="pagination pg-primary justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
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




        </div>
    </div>
</div>
