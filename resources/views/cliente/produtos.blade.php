@extends('cliente.modals')
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
                                <th class="text-left">Email</th>
                                <th class="text-left">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
