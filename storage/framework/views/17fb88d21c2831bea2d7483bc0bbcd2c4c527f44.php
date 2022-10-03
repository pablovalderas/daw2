<?php $__env->startSection('content'); ?>
<div>
    <div class="row" style="margin-top: 8px;">
        Product id#: <?php echo e($producto->id); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        Product name: <?php echo e($producto->nombre); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        Product price: <?php echo e($producto->precio); ?>

    </div>
    <div class="row" style="margin-top: 8px;">
        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/ejercicio2/productoApp/resources/views/producto/show.blade.php ENDPATH**/ ?>