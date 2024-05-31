<div>
    {{-- Do your work, then step back. --}}

    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Contas</h4>
            @if ($is_new)
                <button wire:click="setIsNew" class="btn btn-primary btn-sm mb-2"><i class="la la-list"> </i>Lista</button>
            @else
                <button wire:click="setIsNew" class="btn btn-primary btn-sm mb-2"><i class="la la-plus"> </i>Nova</button>
            @endif

            @if ($is_new)
                @include('partials.admin.accounts-form')
            @else
                @include('partials.admin.accounts-table')
            @endif
        </div>
    </div>
</div>
