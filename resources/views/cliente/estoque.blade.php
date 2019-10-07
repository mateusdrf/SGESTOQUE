@extends('cliente.modals.estoque.modals')
@extends('cliente.layouts.app')

@section('content')
<input type="hidden" value="{{$produtos}}">
<div class="container-fluid">
    <!--div class="col-lg-12"-->
        <div class="grid">
            <div class="grid-header">
                <!--div style="width: 10%"-->
                    <h2>Estoque</h2>
                        <button class="btn btn-outline-success" data-toggle="modal" data-target="#novaentrada"><i class="mdi mdi-plus"></i>Registrar Entrada</button>
                        <button class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#novasaida"><i class="mdi mdi-minus"></i>Registrar Saída</button>
                <!--/div-->
            </div>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table id="table" class="table info-table">
                        <thead>
                            <tr>
                                <th class="text-left">Código</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Q min</th>
                                <th class="text-left">Q max</th>
                                <th class="text-left">Atual</th>
                                <th class="text-left">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $p)
                                <tr>
                                    <td class="text-left">{{ $p->id }}</td>
                                    <td class="text-left">{{ $p->nome }}</td>
                                    <td class="text-left">{{ $p->qtdmin }}</td>
                                    <td class="text-left">{{ $p->qtdmax }}</td>
                                    <td class="text-left">{{ $p->qtdmax }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-outline-warning" data-id="{{$p->id}}" id="edit-{{$p->id}}" onclick="editar(this)"><i class="mdi mdi-circle-edit-outline"></i>Editar</button>
                                        <button class="btn btn-outline-danger" data-id="{{$p->id}}" id="delete-{{$p->id}}" onclick="deletar(this)"><i class="mdi mdi-delete"></i>Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!--/div-->
</div>
@endsection
@section('scripts')
    <script>
        // $(document).ready(function(){
        //     $("#table").DataTable();
        // });
        
        function entrada(element){
            var id = $(element).data('id');
            var cliid = $(element).data('clienteid');

            $("#idprodentrada").val(id);
            $("#idclientrada").val(cliid);
            
            $("#novaentrada").modal('show');
        }

        function saida(element){
            var id = $(element).data('id');
            var cliid = $(element).data('clienteid');

            $("#idprodsaida").val(id);
            $("#idclisaida").val(cliid);

            $("#novasaida").modal('show');
        }
    </script>
@endsection