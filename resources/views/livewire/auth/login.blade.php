
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
                 {{-- In work, do what you enjoy. --}}
                <form wire:submit.prevent="register">
                    <label for="chk" aria-hidden="true">PRÉ-REGISTO</label>
                    <input type="text" wire:model="name" placeholder="Nome" >
                    <input type="text" wire:model="last_name" placeholder="Apelido" >
                    <input type="email" wire:model="email2" placeholder="Email" >
                    <input type="number" wire:model="tel" placeholder="Telefone"  maxlength="9" >
                    <button type="submit">Registar-se</button>
                </form>
			</div>

			<div class="login">
                <form wire:submit.prevent="login">
                    <label for="chk" aria-hidden="true">ENTRAR</label>
                    <input type="email" name="email" placeholder="Email" wire:model="email" >
                    <input type="password" name="pswd" placeholder="Password" wire:model="password" >
                    <button type="submit">Login</button>
                </form>
			</div>
			
            {{-- Close your eyes. Count to one. That is how long forever feels. --}}
            @if ($errors->any() || !empty($message))
                <div class="popup">
                    <span class="popup-message"> {{$message? $message : $errors->first()}} </span>
                    <button class="close" onclick="this.parentElement.style.display='none';">&times;</button>
                </div>
            @endif
	</div>


<!-- resources/views/livewire/popup.blade.php -->


