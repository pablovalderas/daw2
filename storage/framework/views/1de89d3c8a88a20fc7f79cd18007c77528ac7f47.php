<?php $__env->startSection('content'); ?>
<div>
    <div class="row" style="margin-top: 8px;">
        Type id#: <?php echo e($tipo->id); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        Type name: <?php echo e($tipo->nombre); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        Type description: <?php echo e($tipo->descripcion); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/ejercicio2/productoApp/resources/views/type/show.blade.php ENDPATH**/ ?>