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
                    <th>Nome</th>
                    <th>Apelido</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Estado</th>                
                    <th>Disponibilidade</th>                
                </tr>   
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    {{-- <td colspan="2">Larry the Bird</td> --}}
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                    <td>
                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round">
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-muted">
            <span class="badge badge-success">ESTADO </span> O jogador pode ter o estado <b>activo</b> ou <b>reformado</b>
            | <span class="badge badge-success">DISPONIBILIDADE </span> Quando <b>inativo</b>, o jogador pode ter várias limitações, como receber a pensão mensal, mas também pode estar <b>activo</b>
        </p>
    </div>
</div>