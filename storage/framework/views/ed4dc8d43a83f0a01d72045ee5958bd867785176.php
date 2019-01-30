<?php $__env->startSection('content'); ?>
    <div class="container" >
        <h2 class="center">Bilhetagem de Mensagens</h2>

        <div class="row">
            <div class="col s12 m12">
                <div id="pop_div" >
                    <?= $lava->render('ColumnChart', 'Mensagens', 'pop_div') ?>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col s12 m6">
            <a class="white-text" href="<?php echo e(route('admin.posts.lista')); ?>">
                <div class="card deep-purple darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">
                            <i class="material-icons center medium">local_phone</i>
                            <p>Total de Mensagens</p>
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col s12 m6">
                <a class="white-text" href="<?php echo e(route('admin.posts.enviadas')); ?>">
                    <div class="card deep-purple  lighten-2">
                        <div class="card-content white-text">
                            <span class="card-title">
                                <i class="material-icons center medium">phone_forwarded</i>
                                <p>Mensagens Enviadas</p>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
    </div>

    <div class="row">
            <div class="col s12 m6">
                <a class="white-text" href="<?php echo e(route('admin.posts.entregas')); ?>">
                    <div class="card deep-purple darken-2">
                        <div class="card-content white-text">
                            <span class="card-title">
                                <i class="material-icons center medium">phone_in_talk</i>
                                <p>Mensagens Entregues</p>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col s12 m6">
                    <a class="white-text" href="<?php echo e(route('admin.posts.falhas')); ?>">
                        <div class="card deep-purple accent-3">
                            <div class="card-content white-text">
                                <span class="card-title">
                                    <i class="material-icons center medium">phone_missed</i>
                                    <p>Mensagens Não envidas</p>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
        </div>
</div>








<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>