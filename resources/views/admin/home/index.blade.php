@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{$clientes->count()-1}}</h3>
                <p>Clientes cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="{{route('clientes.todos')}}" class="small-box-footer">Clientes <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$transacoes}}</h3>
                <p>Vendas este mês</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('historico')}}" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$estoque}}</h3>
                <p>Itens em estoque</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
            <a href="{{route('estoque.todos')}}" class="small-box-footer">Abrir estoque <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$faturamento}}</h3>
                <p>Faturamento atual</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            <a href="{{route('relatorio')}}" class="small-box-footer">Abrir relatório <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Venda anual</h3>
            </div>
            <canvas id="vendasChart"></canvas>
        </div>
    </div>
</div>

@stop
@section('js')
<script src="{{ asset('vendor/Chart.js') }}"></script>
<script>
    var data  =JSON.parse(<?php echo "'". $datasets ."'" ?>);
    var ctx = document.getElementById("vendasChart");

    var myChart = new Chart(ctx, {
        type: 'line',
        data :  data,
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';

                        if (label) {
                            label += ': ';
                        }
                        label += "R$ "+ (tooltipItem.yLabel).toLocaleString('pt-BR');
                        return label;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        callback: function(value, index, values) {
                            return 'R$' + value;
                         }
                    }
                }]
            }
        }
    });
</script>
@stop