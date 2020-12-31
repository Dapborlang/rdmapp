<!-- created by RDMarwein -->

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php if(session()->has('message')): ?>
	    <div class="alert alert-success">
	        <?php echo e(session()->get('message')); ?>

	    </div>
	<?php endif; ?>
	<div class="card">
		<div class="card-header bg-info">List Of Forms</div>
		<div class="card-body">	
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Form ID
                        </th>
                        <th>
                            Header
                        </th>
                        <th>
                            Table Name
                        </th>
                        <th>
                            Model
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            Options
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($item->id); ?>

                        </td>
                        <td>
                            <?php echo e($item->header); ?>

                        </td>
                        <td>
                            <?php echo e($item->table_name); ?>

                        </td>
                        <td>
                            <?php echo e($item->model); ?>

                        </td>
                        <td>
                            <?php echo e($item->Role->RoleName->detail); ?>

                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php echo e(url('/')); ?>/formpopulate/<?php echo e($item->id); ?>/edit">Edit Master</a> | 
                            <a class="btn btn-info btn-sm" href="<?php echo e(url('/')); ?>/formpopulateindex/<?php echo e($item->id); ?>">View Detail</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/formpopulate/index.blade.php ENDPATH**/ ?>