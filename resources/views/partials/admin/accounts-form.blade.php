<div class="card">
    <div class="card-header">
        <div class="card-title">Formulário de Jogadores</div>
    </div>
    <form wire:submit.prevent='saveAccoount'>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="banks">Banco</label>
                    <select wire:model="bank_id" class="form-control input-pill"  id="pillSelect">
                        <option >-----SELECIONE O BANCO-----</option>
                        @foreach (\App\Models\Bank::get() as $bank)
                            <option value="{{$bank->id}}" data-tokens="{{$bank->id}}">{{$bank->bank_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="account">Número de Conta</label>
                    <input wire:model='account_number' type="number"  class="form-control input-pill" id="account" placeholder="Número de Conta">
                </div>

                <div class="form-group">
                    <label for="nib">NIB</label>
                    <input wire:model='account_nib' type="number"  class="form-control input-pill" id="nib" placeholder="NIB">
                </div>
            </div>

            <div class="col-md-6">


                <div class="form-group">
                    <label for="pillSelect">Proprietário</label>
                    <select wire:model='player_id' class="form-control input-pill  selectpicker" data-live-search="true" id="pillSelect">
                        <option value="" >-----SELECIONE O PROPRIETÁRIO-----</option>
                        @foreach (\App\Models\Player::get() as $player)
                            <option value="{{$player->id}}"  data-tokens="2">{{$player->id}} - {{$player->name}} {{$player->last_name}}</option>
                            
                        @endforeach
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
                    <input wire:model='tax_value' type="number" class="form-control input-pill success" id="value" placeholder="Valor">
                    <small class="text-muted">Se o tipo for percentagem só são permitidos, valores de 1 a 100</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-action">
                <button type="submit" class="btn btn-success btn-rounded">Guardar</button>
                <button wire:click='clearFields' type="reset" class="btn btn-light btn-rounded ml-3">Limpar</button>
            </div>
        </div>
    </div>
    </form>




</div>