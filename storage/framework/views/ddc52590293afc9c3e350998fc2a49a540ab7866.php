<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-info"><?php echo e($card_header); ?></div>
		<div class="card-body">	
		<table class="table table-bordered">
			<tr>
			<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($item!='id' && $item!='created_at' && $item!='updated_at'): ?>
				<?php
				    $title=ucwords(str_replace('_',' ',$item));
				?>
		            <th><?php echo e($title); ?></th>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<th>Option</th>
			</tr>
			<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($item!='id' && $item!='created_at' && $item!='updated_at'): ?>
			            <td><?php echo e($item1-> $item); ?></td>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td><a class="btn btn-info" href="<?php echo e(url('/')); ?>/<?php echo e($route); ?>/<?php echo e($item1->id); ?>/edit">Edit</a></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/autoroute/index.blade.php ENDPATH**/ ?>