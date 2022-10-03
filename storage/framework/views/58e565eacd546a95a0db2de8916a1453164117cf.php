<?php $__env->startSection('modalContent'); ?>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Confirm delete <span id="deleteProduct">XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <input type="submit" class="btn btn-primary" value="Delete product"/>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="row" style="margin-top: 8px;">
        <?php if(session()->has('user')): ?>
            User is logged in.
        <?php else: ?>
            User is not looged in.
        <?php endif; ?>
        &nbsp;
    </div>
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"># id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <?php if(session()->has('user')): ?>
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
                    <?php endif; ?>
                    <th scope="col">show</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($producto->id); ?>

                        </td>
                        <td>
                            <?php echo e($producto->nombre); ?>

                        </td>
                        <td>
                            <?php echo e($producto->precio); ?>

                        </td>
                        <?php if(session()->has('user')): ?>
                            <td>
                                <a href="javascript: void(0);" 
                                   data-name="<?php echo e($producto->nombre); ?>"
                                   data-url="<?php echo e(url('producto/' . $producto->id)); ?>"
                                   data-toggle="modal"
                                   data-target="#modalDelete">delete</a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('producto/' . $producto->id . '/edit')); ?>">edit</a>
                            </td>
                        <?php endif; ?>
                        <td>
                            <a href="<?php echo e(url('producto/' . $producto->id)); ?>">show</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php if(session()->has('user')): ?>
    <div class="row">
        <a href="<?php echo e(url('producto/create')); ?>" class="btn btn-success">add product</a>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('assets/js/product-modal-delete.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/ejercicio2/productoApp/resources/views/producto/index.blade.php ENDPATH**/ ?>