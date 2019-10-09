
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<?php if(session()->has('message')): ?>
	    <div class="alert alert-success">
	        <?php echo e(session()->get('message')); ?>

	    </div>
	<?php endif; ?>
	<form id="partybillForm" method="POST" action="<?php echo e(url('/')); ?>/<?php echo e($route); ?>/<?php echo e($table->id); ?>" target="">
	<?php echo e(csrf_field()); ?>

	<?php echo method_field('PUT'); ?>
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info"><?php echo e($card_header); ?></div>
		<div class="card-body">	
			<div class="row">
			<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($item!='id' && $item!='created_at' && $item!='updated_at'): ?>
				<?php
				    $title=ucwords(str_replace('_',' ',$item));
				?>
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="<?php echo e($item); ?>"><?php echo e($title); ?></label>
		                <?php if(isset($select) && array_key_exists($item, $select)): ?>
		                <select type="text" class="form-control" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>">
		                	<?php $__currentLoopData = $select[$item]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                		<option value="<?php echo e($data->$item); ?>"><?php echo e($data->detail); ?></option>
		                	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                </select>
		                <?php else: ?>
		                <input type="text" class="form-control <?php if(isset($key) && array_key_exists($item, $key)): ?> <?php echo e($key[$item]); ?> <?php endif; ?>" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>" value="<?php echo e($table->$item); ?>">
		                <?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
		<div class="card-footer">
			<div class="offset-md-5">
				<button type="submit" class="btn btn-default">Update</button>
			</div>
		</div>
	</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/mampstack-7.3.10-0/apache2/rdmarwein/resources/views/autoroute/edit.blade.php ENDPATH**/ ?>