@extends('cliente.modals.modals')
@extends('cliente.layouts.app')

@section('content')
<div class="row">
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
                                <th class="text-left">Q min</th>
                                <th class="text-left">Q max</th>
                                <th class="text-left">Descrição</th>
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
                                    <td class="text-left">{{ $p->qtdmin }}</td>
                                    <td class="text-left">{{ $p->qtdmax }}</td>
                                    <td class="text-left">{{ $p->descricao }}</td>
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
