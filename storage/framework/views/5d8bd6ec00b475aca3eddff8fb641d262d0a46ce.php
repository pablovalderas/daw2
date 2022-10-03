<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>laravel - dwes - product</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">dwes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo e($activeHome ?? ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('')); ?>">Home</a>
                    </li>
                    <li class="nav-item <?php echo e($activeProducto ?? ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('producto')); ?>">Product</a>
                    </li>
                    <?php if(session()->has('user')): ?>
                        <li class="nav-item <?php echo e($activeTipo ?? ''); ?>">
                            <a class="nav-link" href="<?php echo e(url('type')); ?>">Type</a>
                        </li>    
                    <?php else: ?> 
                        <li class="nav-item">
                            <a class="nav-link disabled">-</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <?php echo $__env->yieldContent('modalContent'); ?>
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4"><?php echo e($title ?? 'Main'); ?></h4>
                </div>
            </div>
            <div class="container">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <h3><?php echo e($subTitle ?? 'Products, etc.'); ?></h3>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>&copy; IZV 2022</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH /var/www/html/php/ejercicio2/productoApp/resources/views/app/base.blade.php ENDPATH**/ ?>