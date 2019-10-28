@extends('cliente.layouts.app')
@section('title', 'Estatísticas')
@section('content')
<style>
    .pizza {
        min-width: 300px;
        max-width: 300px;
        height: 250px;
        margin: 1em auto;
    }

    .semi {
        min-width: 200px;
        max-width: 200px;
        height: 250px;
        margin: 1em auto;
    }

    caption {
        padding-bottom: 15px;
        font-family: 'Verdana';
        font-size: 1.2em;
        color:#555;
    }

    table {
        font-family: 'Verdana';
        font-size: 12pt;          
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 2px auto;
        text-align: center;
        width: 100%;
    }

    table tr:nth-child(odd) {
    background-color: #fff;
    }

    table tr:nth-child(even) {
    background-color: #FCF9F9;
    }

    th {
        font-weight: 600;
        padding: 10px;
    }
</style>
<div class="row">
    <div class="col-12">
        <h4>Estatísticas</h4>
        <p class="text-gray">Produtos com estoque crítico</p>
    </div>
</div>
<div class="row" style="">
    <input type="hidden" id="estoquecritico" value="{{$estoquecritico}}">
    <input type="hidden" id="saidas" value="{{$saidas}}">
    <input type="hidden" id="entradas" value="{{$entradas}}">
    <div class="col-md-3 col-sm-12 col-12">
        <div class="pizza" id="pizza1"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12">
        <div class="pizza" id="pizza2"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12">
        <div class="pizza" id="pizza3"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12">
        <div class="pizza" id="pizza4"></div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p class="text-gray" style="margin-top: 25px!important;">Visualização mensal da movimentação de estoque.</p>
    </div>
</div>
<div class="row" style="height: 500px!important">
    <div class="col-md-12 col-sm-12 col-12 equel-grid">
        <div id="barras" style="min-width: 100%; height: 500px; margin: 0 auto"></div>
    </div>
</div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var pec = JSON.parse($("#estoquecritico").val()); //(pec)Produtos com estoque critico
            var pmme = JSON.parse($("#entradas").val()); //(pmm)Produtos com maiores movimentacoes 
            var pmms = JSON.parse($("#saidas").val()); //(pmm)Produtos com maiores movimentacoes 

            pec[0] == null ? console.log("pizza1 null") : monta_pizzas("pizza1", pec[0].nome, pec[0].qtdmin, pec[0].qtdatual);
            pec[1] == null ? console.log("pizza2 null") : monta_pizzas("pizza2", pec[1].nome, pec[1].qtdmin, pec[1].qtdatual);
            pec[2] == null ? console.log("pizza3 null") : monta_pizzas("pizza3", pec[2].nome, pec[2].qtdmin, pec[2].qtdatual);
            pec[3] == null ? console.log("pizza4 null") : monta_pizzas("pizza4", pec[3].nome, pec[3].qtdmin, pec[3].qtdatual);

            var arraydataentradas = [];
            var arraydatasaidas   = [];

            for(var i = 1 ; i <= 12 ; i++){
                var flage = false;
                var flags = false;

                $.map(pmme, function(obj, idx){
                    if(obj["mes"] == i){
                        arraydataentradas.push(obj["data"]);
                        flage = true;
                    }
                });
                if(flage == false){
                    arraydataentradas.push(0);
                }

                $.map(pmms, function(obj, idx){
                    if(obj["mes"] == i){
                        arraydatasaidas.push(obj["data"]);
                        flags = true;
                    }
                });
                if(flags == false){
                    arraydatasaidas.push(0);
                }
            }
            monta_barras("barras", arraydataentradas, arraydatasaidas);
        });

        function monta_pizzas(chart_id, prod, qtdmin, qtdatual){
            Highcharts.chart(chart_id, {
                chart: {
                    type: 'pie'
                },
                credits: {
                    enabled: false
                },
                accessibility: {
                    description: ''
                },
                title: {
                    text: prod
                },
                tooltip: {
                    headerFormat: '',
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                        'Total de {point.name} (Unidade): <b>{point.y}</b><br/>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true,
                        size: 150
                    }
                },
                series: [{
                    name: 'Produtos',
                    data: [{
                        name: 'Qtd Atual',
                        y: qtdatual,
                        z: 2,
                        color: '#f40401'
                    }, {
                        name: 'Qtd Mínima',
                        y: qtdmin,
                        z: 2,
                        color: '#39b02e'
                    }]
                }]
            });
        }

        function monta_barras(chart_id, entradas, saidas){
            Highcharts.chart(chart_id, {
                chart: {
                    type: 'column'
                },
                credits:{
                    enabled: false
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Fev',
                        'Mar',
                        'Abr',
                        'Mai',
                        'Jun',
                        'Jul',
                        'Ago',
                        'Set',
                        'Out',
                        'Nov',
                        'Dez'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Quantidade (unidade)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                  '<td style="padding:0"><b>{point.y} un</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Entradas',
                    data: entradas

                }, {
                    name: 'Saídas',
                    data: saidas

                }]
            });
        }

        function GetMonthName(monthNumber) {
            var months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            return months[monthNumber - 1];
        }
    </script>
@endsection
