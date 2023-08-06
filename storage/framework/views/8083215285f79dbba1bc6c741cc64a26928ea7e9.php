<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Painel Principal</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-3">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?php echo e($clientes->count()-1); ?></h3>
                <p>Clientes cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="<?php echo e(route('clientes.todos')); ?>" class="small-box-footer">Abrir clientes <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo e($transacoes); ?></h3>
                <p>Vendas este mês</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo e(route('historico')); ?>" class="small-box-footer">Abrir vendas<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo e($estoque); ?></h3>
                <p>Itens em estoque</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
            <a href="<?php echo e(route('estoque.todos')); ?>" class="small-box-footer">Abrir estoque <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo e($faturamento); ?></h3>
                <p>Faturamento atual</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            <a href="<?php echo e(route('relatorio')); ?>" class="small-box-footer">Abrir relatório <i class="fa fa-arrow-circle-right"></i></a>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('vendor/Chart.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/danilo/Documentos/Sistemas/sistema-gestao-ponto-venda/resources/views/admin/home/index.blade.php ENDPATH**/ ?>