<div class="card">
    <div class="card-header">
        <div class="card-title">
            <ul class="nav nav-pills nav-default">
                <i class="la la-filter la-2x mr-2"></i>
                <li class="nav-item ">
                    <a type="button" class="nav-link btn-sm {{$filter == $filterOpt[0]? 'active' : ''}} " wire:click.prevent="filtering('{{$filterOpt[0]}}')" href="#">Todos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[1]? 'active' : ''}} "  wire:click.prevent="filtering('{{$filterOpt[1]}}')"  href="javascript:void(0)">Activos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[2]? 'active' : ''}} "  wire:click.prevent="filtering('{{$filterOpt[2]}}')"  href="javascript:void(0)">Reformados</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn-sm {{$filter == $filterOpt[3]? 'active' : ''}}  "  wire:click.prevent="filtering('{{$filterOpt[3]}}')"  href="javascript:void(0)">Pré-Registados</a>
                </li>
            </ul>

        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-head-bg-success table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nr Conta</th>
                    <th>NIB</th>
                    <th>Banco</th>
                    <th>Nome Proprietário</th>
                    <th>Saldo</th>                
                    <th>Estado</th>                
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">Activo</span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                    <td>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">Activo</span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    {{-- <td colspan="2">Larry the Bird</td> --}}
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    
                    <td>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            <span class="form-check-sign">Activo</span>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-muted">
            <span class="badge badge-success">ESTADO </span> A conta com o estado <b>INACTIVO</b> não pode receber pensão.
            
        </p>
    </div>
</div>