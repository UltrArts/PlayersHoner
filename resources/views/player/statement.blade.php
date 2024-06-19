@extends('layouts.app', ['title' => 'Extrato', 'page' => 'statementsTab'])

@section('content')
    {{-- @if (auth()->user()->hasRole('admin'))
        @include('partials.admin.dashboard')
    @else
        @include('partials.player.dashboard')
    @endif --}}
    @livewire('player.statements')
@endsection