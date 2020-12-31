<!-- created by RDMarwein -->

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form id="partybillForm" method="POST" action="<?php echo e(url('/')); ?>/formpopulate/<?php echo e($form->id); ?>" target="">
	<?php echo e(csrf_field()); ?>

    <?php echo method_field('PUT'); ?>
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">Form Populate Master</div>
		<div class="card-body">	
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="header">Header</label>
		                <input type="text" class="form-control " id="header" name="header" value="<?php echo e($form->header); ?>">
		            </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="table_name">Table Name</label>
                        <input type="text" class="form-control " id="table_name" name="table_name" value="<?php echo e($form->table_name); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control " id="model" name="model" value="<?php echo e($form->model); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="route">Route</label>
                        <input type="text" class="form-control " id="route" name="route" value="<?php echo e($form->route); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select type="text" class="form-control" id="role" name="role">
                            <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->role); ?>"><?php echo e($item->detail); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="offset-md-5">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/formpopulate/edit.blade.php ENDPATH**/ ?>