@extends('admin.layouts.app')
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
<div class="row" style="height: 250px!important">
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="pizza" id="pizza1"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="pizza" id="pizza2"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="pizza" id="pizza3"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="pizza" id="pizza4"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <p class="text-gray" style="margin-top: 25px!important;">Produtos com maior movimentação</p>
    </div>
</div>
<div class="row" style="height: 250px!important">
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="semi" id="semi1"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="semi" id="semi2"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="semi" id="semi3"></div>
    </div>
    <div class="col-md-3 col-sm-12 col-12 equel-grid">
        <div class="semi" id="semi4"></div>
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
            monta_pizzas("pizza1", "Produto 1");
            monta_pizzas("pizza2", "Produto 2");
            monta_pizzas("pizza3", "Produto 3");
            monta_pizzas("pizza4", "Produto 4");

            monta_semicirculo("semi1", "Produto 1");
            monta_semicirculo("semi2", "Produto 2");
            monta_semicirculo("semi3", "Produto 3");
            monta_semicirculo("semi4", "Produto 4");

            monta_barras("barras");
        });

        function monta_pizzas(chart_id, prod){
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
                        name: 'Entradas',
                        y: 10,
                        z: 2,
                        color: '#39b02e'
                    }, {
                        name: 'Saídas',
                        y: 10,
                        z: 2,
                        color: '#f40401'
                    }]
                }]
            });
        }

        function monta_semicirculo(chart_id, prod){
            Highcharts.chart(chart_id, {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                credits:{
                    enabled: false
                },
                title: {
                    text: prod,
                    align: 'center',
                    verticalAlign: 'top',
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: false
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '100%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: prod,
                    innerSize: '50%',
                    data: [
                        ['Quantidade Minima', 50],
                        ['Quantidade Atual', 50]
                    ]
                }]
            });
        }

        function monta_barras(chart_id){
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
                    data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

                }, {
                    name: 'Saídas',
                    data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

                }]
            });
        }
    </script>
@endsection
