<div class="card">
    <div class="card-header">
        <div class="card-title">Formulário de Jogadores</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="banks">Banco</label>
                    <select wire:model.change="bank" class="form-control input-pill  selectpicker" data-live-search="true" id="pillSelect">
                        <option value="">-----SELECIONE O BANCO-----</option>
                        @foreach ($banks as $bank)
                            <option data-tokens="{{$bank->id}}">{{$bank->bank_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="account">Conta Bancária</label>
                    <input type="number"  class="form-control input-pill" id="account" placeholder="Conta Bancária">
                </div>

                <div class="form-group">
                    <label for="nib">NIB</label>
                    <input type="number"  class="form-control input-pill" id="nib" placeholder="NIB">
                </div>
            </div>

            <div class="col-md-6">


                <div class="form-group">
                    <label for="pillSelect">Proprietário</label>
                    <select class="form-control input-pill  selectpicker" data-live-search="true" id="pillSelect">
                        <option data-tokens="Edson Da Cruz - 2024002">Edson Da Cruz - 2024002</option>
                        <option  data-tokens="2">2</option>
                        <option  data-tokens="3">3</option>
                        <option  data-tokens="4">4</option>
                        <option  data-tokens="5">5</option>
                    </select>
                </div>


                <div class="form-check">
                    <label>Tipo de contribuição {{$tax_type}}</label><br/>
                    <label class="form-radio-label">
                        <input wire:model='tax_type' class="form-radio-input" type="radio" name="optionsRadios" value="{{$this->tax_types[0]->id}}"  checked="">
                        <span class="form-radio-sign"> {{$this->tax_types[0]->type}}</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input wire:model='tax_type' class="form-radio-input" type="radio" name="optionsRadios" value="{{$this->tax_types[1]->id}}">
                        <span class="form-radio-sign"> {{$this->tax_types[1]->type}}</span>
                    </label>
                </div>


                <div class="form-group">
                    <label for="value">Valor a contribuir </label>
                    <input type="number" class="form-control input-pill" id="value" placeholder="Valor">
                    <small class="text-muted">Se o tipo for percentagem só são permitidos, valores de 1 a 100</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-action">
                <button class="btn btn-success btn-rounded">Submiter</button>
                <button class="btn btn-light btn-rounded ml-3">Limpar</button>
            </div>
        </div>
    </div>
</div>