<div>
    {{-- In work, do what you enjoy. --}}
    
    <div class="container">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{route('admin.bank')}}">Transações Bancárias</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                  </li>
                </ul>
                <form  action="{{ route('logout')}}" method="POST" class="d-flex">
                    @csrf
                  <button class="btn btn-outline-danger btn-sm" type="submit">Logout</button>
                </form>
              </div>
            </div>
          </nav>
    </div>

    <div class="container px-3 py-5">

        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Formulário de Transferência Bancária</h4>
            </div>
            <form wire:submit.prevent='transfer'>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="value">Valor a transferir </label>
                                <input wire:model='value' type="number" class="form-control input-pill success" id="value" placeholder="Valor">
                            </div>
                                    
                            <div class="form-group">
                                <label for="banks">Conta Bancária Beneficiária</label>
                                <select wire:model="selected_account_id" class="form-control input-pill"  id="pillSelect">
                                    <option >----- SELECIONE A CONTA BENEFICIÁRIA -----</option>
                                    @foreach (\App\Models\Account::with('player', 'bank')->get() as $account)
                                        @if (! $account->player->is_retired)
                                            <option value="{{$account->id}}" data-tokens="{{$account->id}}">{{$account->account_number}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
            
                        </div>
            
                        <div class="col-md-6">
            
                            <div class="form-group">
                                <label for="account">Proprietário</label>
                                <input disabled wire:model='owner' type="text"  class="form-control input-pill" id="account" value=" ">
                            </div>
            
                            <div class="form-group">
                                <label for="nib">BANCO</label>
                                <input disabled wire:model='bank_name' type="text"  class="form-control input-pill" id="nib">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col">
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary btn-rounded" {{$selected_account_id? '' :'disabled'}}>Transferir</button>
                            <button wire:click='clearFields' type="reset" class="btn btn-light btn-rounded ml-3" {{$selected_account_id? '' :'disabled'}}>Cancelar</button>
                        </div>
                    </div>
                </div>
            
            </form>
        </div>

    </div>

</div>
