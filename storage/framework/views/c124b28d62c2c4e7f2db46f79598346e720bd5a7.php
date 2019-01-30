<?php $__env->startSection('content'); ?>

<div class="container">
    <h2 class="center">IzzySMS - Painel de Controle</h2>

    <div class="row">
      <div class="col s12 m12">
        <div id="pop_div3" >
           <?= $lava->render('AreaChart', 'Diario', 'pop_div3') ?>
        </div>
      </div>

  </div>
<div class="row">
</div>
	<div class="row">
        <div class="col s12 m3">
        <a class="white-text" href="<?php echo e(route('admin.campanha')); ?>">
          <div class="card green darken-1">
            <div class="card-content white-text">
              <span class="card-title">
                <i class="material-icons center medium">add_alert</i>
                <p>Campanhas</p>
            </span>
            </div>
            </a>
          </div>
        </div>
        <div class="col s12 m3">
        <a class="white-text" href="<?php echo e(route('admin.chipeira')); ?>">
          <div class="card blue darken-1">
            <div class="card-content white-text">
              <span class="card-title">
                <i class="material-icons center medium">phone_android</i>
                <p>Chipeiras</p>
            </span>
            </div>
             </a>
          </div>
        </div>

        <div class="col s12 m3">
        <a class="white-text" href="<?php echo e(route('admin.credor')); ?>">
          <div class="card orange darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">account_balance</i>
                <p>Credores</p>
            </span>
            </div>
          </div>
        </a>
        </div>

        <div class="col s12 m3">
        <a class="white-text" href="<?php echo e(route('admin.posts')); ?>">
        <div class="card deep-purple ">
        <div class="card-content white-text">
          <span class="card-title"><i class="material-icons center medium">perm_phone_msg</i>
            <p>Bilhetagem</p>
        </span>
        </div>
      </div>
    </a>
    </div>

    <div class="col s12 m3">
    <a class="white-text" href="<?php echo e(route('admin.usuarios')); ?>">
      <div class="card deep-orange">
        <div class="card-content white-text">
          <span class="card-title">
              <i class="material-icons center medium">people</i>
              <p>Usuários</p>
            </span>
        </div>
      </div>
    </a>
    </div>

    <div class="col s12 m3">
    <a class="white-text" href="<?php echo e(route('admin.usuarios')); ?>">
      <div class="card #607d8b blue-grey">
        <div class="card-content white-text">
          <span class="card-title">
            <i class="material-icons center medium">pie_chart</i>
            Estatísticas
        </span>
        </div>
      </div>
    </a>
    </div>

    <div class="col s12 m3">
        <a class="white-text" href="#">
          <div class="card #00695c teal darken-3">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">work</i>
                <p>Construção</p>
            </span>
            </div>
          </div>
        </a>
        </div>

   <div class="col s12 m3">
    <a class="white-text" href="#">
      <div class="card #1a237e indigo darken-4">
        <div class="card-content white-text">
          <span class="card-title">
            <i class="material-icons center medium">warning</i>
                <p>Construção</p>
        </span>
        </div>
      </div>
    </a>
    </div>

  	</div>

	</div>


</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>