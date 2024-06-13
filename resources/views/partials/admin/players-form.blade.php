<div class="card">
    <div class="card-header">
        <div class="card-title">Formulário de Jogadores</div>
    </div>
    <form wire:submit.prevent='savePlayer'>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input wire:model='name' type="text" class="form-control input-pill" id="name" placeholder="Nome do jogador">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apelido</label>
                        <input wire:model='last_name' type="text" class="form-control input-pill" id="name" placeholder="Outros nomes">
                    </div>
                    <div class="form-group">
                        <label for="birth">Data de Nascimento</label>
                        <input wire:model='birth' type="date" class="form-control input-pill" id="birth" placeholder="Outros nomes">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model='email' type="email"  class="form-control input-pill" id="email" placeholder="Email do jogador">
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefone</label>
                        <input wire:model='tel' type="number" maxlength="9" class="form-control input-pill" id="tel" placeholder="Número de telefone">
                    </div>
                    <div class="form-group">
                        <label for="tel">Outro Telefone</label>
                        <input wire:model='tel2' type="number" maxlength="9" class="form-control input-pill" id="tel" placeholder="Número de telefone">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-action">
                    <button type="submit" class="btn btn-success btn-rounded">Submeter</button>
                    <button wire:click='clearFields' type="reset" id="displayNotif" class="btn btn-light btn-rounded ml-3">Limpar</button>
                </div>
            </div>
        </div>
    </form>
</div>