@extends('cliente.modals.produtos.modals')
@extends('cliente.layouts.app')

@section('content')
<div class="row">
<input type="hidden" id="produtos" value="{{$produtos}}">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">
                <h2>Produtos</h2>
                    <!--<div class="btn btn-success has-icon" data-toggle="modal" data-target="#novoproduto">
                        <i class="mdi mdi-account-plus-outline"></i>Novo
                    </div>-->
                </div>
                <button class="btn btn-outline-success has-icon" data-toggle="modal" data-target="#novoproduto"><i class="mdi mdi-plus"></i>Inserir Produto</button>
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
                                        <button class="btn btn-outline-danger" data-id="{{$p->id}}" id="delete-{{$p->id}}" onclick="deletar(this)"><i class="mdi mdi-delete-outline"></i>Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#table").DataTable();
        });

        function editar(element){
            var id = $(element).data('id');
            var produtos = JSON.parse($("#produtos").val());
            var ps = produtos[produtos.findIndex(obj => obj.id==id)]; //ps = produto selecionado
        
            $("#eid").val(ps.id);
            $("#enome").val(ps.nome);
            $("#eprecocompra").val(ps.precocompra);
            $("#eprecovenda").val(ps.precovenda);
            $("#edatavencimento").val(ps.datavencimento);
            $("#eqtdmin").val(ps.qtdmin);
            $("#eqtdmax").val(ps.qtdmax);
            $("#edescricao").val(ps.descricao);
            
            $("#editarproduto").modal('show');
        }

        function excluir(element){
            var id = $(element).data('id');
            $("#did").val(id);
            $("#deletarproduto").modal('show');
        }
    </script>
@endsection