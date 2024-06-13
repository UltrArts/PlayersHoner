@extends('layouts.app', ['title' => 'Dashboard', 'page' => 'dashboardTab'])

@section('content')
<div class="content">
    <div class="container-fluid">
        @isset($error)
            <h4>{{$error}}</h4>
        @else
            <h4 class="page-title">Dashboard</h4>
        @endisset
        <div class="row">
            <div class="col-md-3">
                <div class="card card-stats card-warning">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-users"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Total de Jogadores</p>
                                    <h4 class="card-title"> {{$totalPlayers}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats card-success">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-arrow-circle-down"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Total de Entradas</p>
                                    <h4 class="card-title">$ 1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats card-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-arrow-circle-up"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Total de Saídas</p>
                                    <h4 class="card-title">1303</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-bar-chart"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Entradas Mensal</p>
                                    <h4 class="card-title">576</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="la la-bar-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Saídas Mensal</p>
                                    <h4 class="card-title">150GB</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-check-circle text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Jogadores Activos</p>
                                    <h4 class="card-title"> {{$activePlayers}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-times-circle-o text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Jogadores Reformados</p>
                                    <h4 class="card-title"> {{$retiredPlayers}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-user-plus text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Pré-Registados</p>
                                    <h4 class="card-title"> {{$preRegisteredPlayers}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Estatísticas de Jogadres</h4>
                        <p class="card-category">
                        Diferentes estados de jogadores</p>
                    </div>
                    <div class="card-body">
                        <div id="monthlyChart" class="chart chart-pie"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if (Auth::user()->hasRole('admin'))
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Estatística Financeira</h4>
                            <p class="card-category">
                            Valores de entradas e saídas mensais na conta da empresa.</p>
                        </div>
                        <div class="card-body">
                            <div id="salesChart" class="chart"></div>
                        </div>
                    </div>
                    
                @else
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mapa Mundi</h4>
                            <p class="card-category">
                            Países em que operamos</p>
                        </div>
                        <div class="card-body">
                            <div class="mapcontainer">
                                <div class="map">
                                    {{-- <span>Alternative content for the map</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endif
            </div>




        </div>
    </div>
</div>



@endsection