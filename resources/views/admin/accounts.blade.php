@extends('layouts.app', ['title' => 'Contas', 'page' => 'accountTab'])
@section('content')
    @isset($sent_player)
        @livewire('admin.accounts', ['sent_player' => $sent_player])
    @else   
        @livewire('admin.accounts')
    @endisset
@endsection