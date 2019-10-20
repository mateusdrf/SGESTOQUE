@extends('admin.modals.cliente.modals')
@extends('admin.layouts.app')
@section('title', 'Clientes')
@section('content')
<input type="hidden" id="clientes" value="{{$clientes}}">
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Clientes
                    <div class="btn btn-outline-success has-icon" data-toggle="modal" data-target="#novocliente">
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
                            @foreach ($clientes as $c)
                                <tr>
                                    <td class="text-left">{{ $c->id }}</td>
                                    <td class="text-left">{{ $c->firstname }} {{ $c->lastname }}</td>
                                    <td class="text-left">{{ $c->email }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-outline-warning" data-id="{{$c->id}}" id="edit-{{$c->id}}" onclick="editar(this)"><i class="mdi mdi-circle-edit-outline"></i>Editar</button>
                                        <button class="btn btn-outline-danger" data-id="{{$c->id}}" id="delete-{{$c->id}}" onclick="deletar(this)"><i class="mdi mdi-delete"></i>Excluir</button>
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
        function editar(element){
            var id = $(element).data('id');
            var clientes = JSON.parse($("#clientes").val());
            var cs = clientes[clientes.findIndex(obj => obj.id==id)]; //cs = cliente selecionado
        
            $("#eid").val(cs.id);
            $("#efirstname").val(cs.firstname);
            $("#elastname").val(cs.lastname);
            $("#eemail").val(cs.email);
            
            $("#editarcliente").modal('show');
        }

        function deletar(element){
            var id = $(element).data('id');
            var clientes = JSON.parse($("#clientes").val());
            var cs = clientes[clientes.findIndex(obj => obj.id==id)];

            $("#did").val(id);
            $("#msgConfirm").html(`Deseja deletar o cliente <strong>` + cs.firstname + ` ` + cs.lastname + `</strong>`);
            $("#deletarcliente").modal('show');
        }
    </script>
@endsection