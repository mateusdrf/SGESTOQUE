@extends('admin.modals.admin.modals')
@extends('admin.layouts.app')

@section('content')
<input type="hidden" id="admins" value="{{$admins}}">
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Administradores
                    <div class="btn btn-outline-success has-icon" data-toggle="modal" data-target="#novoadmin">
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
                            @foreach ($admins as $a)
                                <tr>
                                    <td class="text-left">{{ $a->id }}</td>
                                    <td class="text-left">{{ $a->firstname }} {{ $a->lastname }}</td>
                                    <td class="text-left">{{ $a->email }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-outline-warning" data-id="{{$a->id}}" id="edit-{{$a->id}}" onclick="editar(this)"><i class="mdi mdi-circle-edit-outline"></i>Editar</button>
                                        <button class="btn btn-outline-danger" data-id="{{$a->id}}" id="delete-{{$a->id}}" onclick="deletar(this)"><i class="mdi mdi-delete"></i>Excluir</button>
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
            var admins = JSON.parse($("#admins").val());
            var as = admins[admins.findIndex(obj => obj.id==id)]; //as = admin selecionado
        
            $("#eid").val(as.id);
            $("#efirstname").val(as.firstname);
            $("#elastname").val(as.lastname);
            $("#eemail").val(as.email);
            
            $("#editaradmin").modal('show');
        }

        function deletar(element){
            var id = $(element).data('id');
            var admins = JSON.parse($("#admins").val());
            var as = admins[admins.findIndex(obj => obj.id==id)];

            $("#did").val(id);
            $("#msgConfirm").html(`Deseja deletar o administrador <strong>` + as.firstname + ` ` + as.lastname + `</strong>`);
            $("#deletaradmin").modal('show');
        }
    </script>
@endsection