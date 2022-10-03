<?php $__env->startSection('content'); ?>
<div class="row">
    <?php if(session()->has('user')): ?>
        <a href="<?php echo e(route('logout')); ?>" class="btn btn-success">logout</a>
    <?php else: ?>
        <a href="<?php echo e(action([App\Http\Controllers\MainController::class, 'login'])); ?>" class="btn btn-success">login</a>
    <?php endif; ?>
    &nbsp;
    <a href="<?php echo e(url('producto')); ?>" class="btn btn-success">products</a>
    &nbsp;
    <?php if(session()->has('user')): ?>
        <a href="<?php echo e(url('type')); ?>" class="btn btn-success">types</a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/ejercicio2/productoApp/resources/views/main/index.blade.php ENDPATH**/ ?>