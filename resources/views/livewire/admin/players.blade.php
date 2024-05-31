<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Jogadores</h4>
            @if ($is_new)
                <button wire:click="setIsNew" class="btn btn-primary btn-sm mb-2"><i class="la la-list"> </i>Lista</button>
            @else
                <button wire:click="setIsNew" class="btn btn-primary btn-sm mb-2"><i class="la la-plus"> </i>Novo</button>
            @endif

            @if ($is_new)
                @include('partials.admin.players-form')
            @else
                @include('partials.admin.players-table')
            @endif
        </div>
    </div>
</div>
