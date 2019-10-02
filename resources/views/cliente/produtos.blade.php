@extends('cliente.modals.produtos.modals')
@extends('cliente.layouts.app')

@section('content')
<div class="row">
<input type="hidden" id="produtos" value="{{$produtos}}">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Produtos
                    <div class="btn btn-success has-icon" data-toggle="modal" data-target="#novoproduto">
                        <i class="mdi mdi-account-plus-outline"></i>Novo
                    </div>
                </div>
            </div>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table info-table">
                        <thead>
                            <tr>
                                <th class="text-left">Código</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Preço de Compra</th>
                                <th class="text-left">Preço de Venda</th>
                                <th class="text-left">Vencimento</th>
                                <th class="text-left">Descrição</th>
                                <th class="text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $p)
                                <tr>
                                    <td class="text-left">{{ $p->id }}</td>
                                    <td class="text-left">{{ $p->nome }}</td>
                                    <td class="text-left">{{ $p->precocompra }}</td>
                                    <td class="text-left">{{ $p->precovenda }}</td>
                                    <td class="text-left">{{ $p->datavencimento }}</td>
                                    <td class="text-left">{{ $p->descricao }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-warning" data-id="{{ $p->id }}" onclick="editar(this)">Editar</button>
                                        <button class="btn btn-danger" data-id="{{ $p->id }}" onclick="excluir(this)">Excluir</button>
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