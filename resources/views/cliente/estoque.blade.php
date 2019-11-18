@extends('cliente.modals.estoque.modals')
@extends('cliente.layouts.app')
@section('title', 'Estoque')
@section('content')
<input type="hidden" value="{{$produtos}}">
<div class="container-fluid">
    <!--div class="col-lg-12"-->
        <div class="grid">
            <div class="grid-header">
                <!--div style="width: 10%"-->
                    <h2>Estoque</h2>
                    <a href="{{ route('relatorio.estoque.excel') }}"><button class="btn btn-outline-primary"><i class="mdi mdi-file-excel"></i>Relatório</button></a>
                <!--/div-->
            </div>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table id="table" class="table info-table">
                        <thead>
                            <tr>
                                <th class="text-left">Produto</th>
                                <th class="text-left">Q min</th>
                                <th class="text-left">Q max</th>
                                <th class="text-left">Q atual</th>
                                <th class="text-left">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $p)
                                <tr>
                                    <td class="text-left">{{ $p->nome }}</td>
                                    <td class="text-left">{{ $p->qtdmin }}</td>
                                    <td class="text-left">{{ $p->qtdmax }}</td>
                                    <td class="text-left">{{ $p->qtdatual }}</td>
                                    <td class="text-left">
                                        <button class="btn btn-outline-success" data-id="{{$p->id}}" id="entrada-{{$p->id}}" onclick="entrada(this)"><i class="mdi mdi-plus"></i>Entrada</button>
                                        <button class="btn btn-outline-danger" data-id="{{$p->id}}" id="saida-{{$p->id}}" onclick="saida(this)"><i class="mdi mdi-minus"></i>Saída</button>
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
            //var cliid = $(element).data('clienteid');

            $("#idprodentrada").val(id);
            //$("#idclientrada").val(cliid);
            
            $("#novaentrada").modal('show');
        }

        function saida(element){
            var id = $(element).data('id');
            //var cliid = $(element).data('clienteid');

            $("#idprodsaida").val(id);
            //$("#idclisaida").val(cliid);

            $("#novasaida").modal('show');
        }
    </script>
@endsection