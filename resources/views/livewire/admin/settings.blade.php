<div>
    {{-- Be like water. --}}
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Configurações de Sistema</h4>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Redefinição de Configurações</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
            
                            <div class="form-group">
                                <label for="account">Valor Crítico</label>
                                <input type="number"  class="form-control input-pill" id="account" placeholder="Valor considerado crítico nas contas">
                            </div>
            
                        </div>
            
                        <div class="col-md-6">
            
            
                            <div class="form-group">
                                <label for="value">Dia de Pagamento</label>
                                <input type="number" class="form-control input-pill" id="value" placeholder="Dia de pagamento de pensões">
                                {{-- <small class="text-muted">Se o tipo for percentagem só são permitidos, valores de 1 a 100</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-action">
                            <button class="btn btn-success btn-rounded">Submeter</button>
                            <button class="btn btn-light btn-rounded ml-3">Restaurar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
