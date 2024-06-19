@extends('layouts.app', ['title' => 'Dashboard', 'page' => 'dashboardTab'])

@section('content')
    @if (auth()->user()->hasRole('admin'))
        @include('partials.admin.dashboard')
    @else
        @include('partials.player.dashboard')
    @endif
@endsection