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
            monta_barras("barras");
        });

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
                    name: 'Clientes',
                    data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]
                }]
            });
        }
    </script>
@endsection
