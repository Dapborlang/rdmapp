<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('js/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('script'); ?>
</head>
<body>
    <div id="app">
        <div class="fixed-top">
            <div style="width:100%; height: 75px;" class="text-center bg-light">       
                <span style="font-size: 22px; margin-top: 25px" >Welcome to RD Home Automation </span>  
            </div>
            <nav class="navbar navbar-expand-md bg-primary navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->check()): ?>
                        <?php $__currentLoopData = Auth::user()->role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->role == 'ADM'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Form
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(url('/')); ?>/formpopulate/create">Create</a>
                                    <a class="dropdown-item" href="<?php echo e(url('/')); ?>/formpopulate">View/Edit</a>  
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if($item->role == 'STG'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    File Storage
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(url('/')); ?>/stg">View/Delete Files</a>
                                    <a class="dropdown-item" href="<?php echo e(url('/')); ?>/stg/create">Upload File</a>  
                                </div>
                            </li>
                            <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = Auth::user()->Uri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        <?php echo e($item->uri_header); ?>

                                    </a>
                                    <div class="dropdown-menu">
                                    <?php $__currentLoopData = $item->listUri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="dropdown-item" href="<?php echo e(url('/')); ?>/<?php echo e($item1->uri); ?>"><?php echo e($item1->label); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
                                        <a class="dropdown-item" href="#">Profile</a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <main class="py-4" style="margin-top: 120px">
        <div class="row">
        <?php if(auth()->guard()->check()): ?> 
            <div class="col-sm-3 col-md-3 col-lg-2 border-right" style="max-height:80vh; padding-left:20px; margin-top:-11px; padding-right:10px ">
            <?php $__currentLoopData = Auth::user()->role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-group list-group-flush">
                <?php $__currentLoopData = $item->link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="dropdown list-group-item list-group-item-primary" style="padding-left:5px; padding-top:1px; padding-bottom:1px; padding-right:0px">
                        <a href="#" class="btn btn-info btn-block dropdown-toggle"  data-toggle="dropdown">
                            <?php echo e($item1->header); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($item1->id); ?>/create">Create</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($item1->id); ?>">View/Edit</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
            <div class="col-sm-9 col-md-9 col-lg-10">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
           
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/layouts/app.blade.php ENDPATH**/ ?>