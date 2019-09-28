@extends('cliente.modals.modals')
@extends('cliente.layouts.app')

@section('content')
<input type="hidden" value="{{$produtos}}">
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Estoque
                    <div class="btn btn-success has-icon" data-toggle="modal" data-target="#novasaida">
                        <i class="mdi mdi-account-plus-outline"></i>Registrar Saída
                    </div>
                    <div class="btn btn-success has-icon" data-toggle="modal" data-target="#novaentrada">
                        <i class="mdi mdi-account-plus-outline"></i>Registrar Entrada
                    </div>
                </div>
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
                                        <button class="btn btn-danger" data-id="{{$p->id}}" id="delete-{{$p->id}}" onclick="deletar(this)"></button>
                                        <button class="btn btn-warning" data-id="{{$p->id}}" id="edit-{{$p->id}}" onclick="editar(this)"></button>
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

        function deletar(element){
            var id = $(element).data('id');

        }

    </script>
@endsection