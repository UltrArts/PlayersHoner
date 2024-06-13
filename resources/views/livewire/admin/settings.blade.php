<div>
    {{-- Be like water. --}}
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Configurações de Sistema</h4>
            <form action="" wire:submit.prevent='save'>
                {{-- @csrf --}}
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Redefinição de Configurações</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                
                                <div class="form-group">
                                    <label for="account">Valor Crítico</label>
                                    <input wire:model="critical_balance" type="number"  class="form-control input-pill" id="account" placeholder="Valor considerado crítico nas contas">
                                </div>
                
                            </div>
                
                            <div class="col-md-6">
                
                
                                <div class="form-group">
                                    <label for="value">Dia de Pagamento</label>
                                    <input wire:model="payment_day" type="number" class="form-control input-pill" id="value" placeholder="Dia de pagamento de pensões">
                                    {{-- <small class="text-muted">Se o tipo for percentagem só são permitidos, valores de 1 a 100</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card-action ">
                                <button type="submit" class="btn btn-success btn-rounded">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
