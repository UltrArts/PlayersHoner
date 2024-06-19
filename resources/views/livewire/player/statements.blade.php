<div>
    {{-- Stop trying to control. --}}
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Transações</h4>

            <button wire:click="setIsNew" class="btn btn-primary btn-sm mb-2"><i class="la la-download la-lg"> </i> Baixar Extrato</button>


            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <ul class="nav nav-pills nav-default">
                            <h5 class="text">
                                <i class="la la-money la-lg mr-2"></i>
                                Saldo disponível: 
                                <b class="{{($balance <= App\Models\Config::first()->critical_balance)?'text-danger':'text-success' }}">${{number_format($balance, 2, '.', ',') .' Mzn'}}</b>
                            </h5>
                

                        </ul>
            
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
                                <th>Valor Contribuido</th>
                                <th>Data</th>                
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach ($trans as $tra)
                            <tr>
                                <td> {{$tra->id}} </td>
                                <td> {{$tra->account->player->name}} {{$tra->account->player->last_name}} </td>
                                <td> {{$tra->account->account_number}} </td>
                                <td> {{($tra->transactionType->type == 'credit')?'Crédito':'Débito'}} </td>
                                <td class="{{ ($tra->transactionType->type == 'debit')? 'text-danger':''}} font-weight-bold"> 
                                    {{($tra->transactionType->type == 'debit')? '-'. number_format($tra->value, 2, '.', ',') .'Mzn' :  number_format($tra->value, 2, '.', ',') .' Mzn'}} 
                                </td>
                                <td> {{$tra->created_at->diffForHumans()}} </td>
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
