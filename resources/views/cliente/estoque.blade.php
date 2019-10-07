@extends('cliente.modals.estoque.modals')
@extends('cliente.layouts.app')

@section('content')
<input type="hidden" value="{{$produtos}}">
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
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
                                        <button class="btn btn-success" data-clienteid="{{ $p->cliente_id }}" data-id="{{$p->id}}" id="delete-{{$p->id}}" onclick="entrada(this)">Entrada</button>
                                        <button class="btn btn-warning" data-id="{{$p->id}}" id="edit-{{$p->id}}" onclick="saida(this)">Saida</button>
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