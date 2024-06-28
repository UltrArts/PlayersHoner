<!DOCTYPE html>
<html>

<!-- Mirrored from themewagon.github.io/Ready-Bootstrap-Dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Sep 2023 00:42:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('assets/img/favicon/site.webmanifest')}}">

	{{-- <title>{{$title}}</title> --}}
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{asset('assets/css/ready.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	
</head>
<body>

    
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <ul class="nav nav-pills nav-default">
                <h5 class="text">
                    <i class="la la-money la-lg mr-2"></i>
                    Saldo disponível: 
                    <b class="{{($balance <= App\Models\Config::first()->critical_balance)?'text-danger':'text-success' }}">${{number_format($balance, 2, '.', ',') .' Mzn'}}</b>
                </h5>
    

            </ul>

        </div>
    </div>
    <div class="card-body table-responsive">
    @if($trans->count() != 0)
        <table class="table table-head-bg-success table-hover">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th>Jogador</th>
                    <th>Nr Conta</th>
                    <th>Tipo Transação</th>
                    <th>Valor Contribuido</th>
                    <th>Data</th>                
                </tr>   
            </thead>
            <tbody>
                @foreach ($trans as $tra)
                <tr>
                    <td> {{$tra->id}} </td>
                    <td> {{$tra->account->player->name}} {{$tra->account->player->last_name}} </td>
                    <td> {{$tra->account->account_number}} </td>
                    <td> {{($tra->transactionType->type == 'credit')?'Crédito':'Débito'}} </td>
                    <td class="{{ ($tra->transactionType->type == 'debit')? 'text-danger':''}} font-weight-bold"> 
                        {{($tra->transactionType->type == 'debit')? '-'. number_format($tra->value, 2, '.', ',') .'Mzn' :  number_format($tra->value, 2, '.', ',') .' Mzn'}} 
                    </td>
                    <td> {{$tra->created_at->diffForHumans()}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @else

        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col">
                    <img class="img-fluid" src="{{asset('assets/img/404.gif')}}" alt="">
                </div>
            </div>
        </div>
            
    @endif
</div>


	
	
	<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/chartist/chartist.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<script src="{{asset('assets/js/ready.min.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
	<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>