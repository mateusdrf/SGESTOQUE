@extends('cliente.modals.funcionarios.modals')
@extends('cliente.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Funcionários
                    <div class="btn btn-outline-success has-icon" data-toggle="modal" data-target="#novofuncionario">
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
                                <th class="text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $f)
                                <tr>
                                    <td class="text-left">{{ $f->id }}</td>
                                    <td class="text-left">{{ $f->firstname }} {{ $f->lastname }}</td>
                                    <td class="text-left">{{ $f->email }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-outline-warning" data-id="{{$f->id}}" id="edit-{{$f->id}}" onclick="editar(this)"><i class="mdi mdi-circle-edit-outline"></i>Editar</button>
                                        <button class="btn btn-outline-danger" data-id="{{$f->id}}" id="delete-{{$f->id}}" onclick="deletar(this)"><i class="mdi mdi-delete"></i>Excluir</button>
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
