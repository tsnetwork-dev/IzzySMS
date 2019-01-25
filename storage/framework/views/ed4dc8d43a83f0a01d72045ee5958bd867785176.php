<?php $__env->startSection('content'); ?>
    <div class="container" >
        <h2 class="center">Gráficos de Mensagens</h2>
    </div>

    <div id="pop_div" align="center" style="width: 700px; height: 00px">
    	 <?= $lava->render('PieChart', 'Mensagens', 'pop_div') ?>
    </div>
    
   
    
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>