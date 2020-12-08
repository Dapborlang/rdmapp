<!--Formbuilder created by RDMarwein -->

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<?php if(session()->has('message')): ?>
	    <div class="alert alert-success">
	        <?php echo e(session()->get('message')); ?>

	    </div>
	<?php endif; ?>
	<?php if(session()->has('fail-message')): ?>
	    <div class="alert alert-danger">
	        <?php echo e(session()->get('fail-message')); ?>

	    </div>
	<?php endif; ?>
	<div class="card">
		<div class="card-header bg-info"><?php echo e($model->header); ?></div>
		<div class="card-body">	
			<form method="POST" action="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($model->id); ?>/index">
				<?php echo e(csrf_field()); ?>

				<div class="col-sm-5">
					<table class="table table-striped">
						<td><input type="text" class="form-control form-control-sm" name="search" placeholder="Enter Text To Search"></td>
						<td><button type="submit" class="btn btn-primary btn-sm">Search</button></td>
					</table>
				</div>
			</form>
			<div style="width:100%; height: 450px; overflow:auto;">
			<table class="table table-hover">
				<tr>
				<th>Sl No.</th>
				<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(!in_array($item,$exclude)): ?>
					<?php
						$title=ucwords(str_replace('_',' ',$item));
					?>
						<?php if(array_key_exists($item, $master)): ?>
							<th><?php echo e(ucwords(str_replace('_',' ',$master[$item][1]))); ?></th>
						<?php else: ?>
							<th><?php echo e($title); ?></th>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<th>Option</th>
				</tr>
				<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($loop->iteration); ?></td>
					<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(!in_array($item,$exclude)): ?>	
							<?php if(array_key_exists($item, $select)): ?>
								<?php 
									$val=$select[$item][0];
									$val=array_values(array_slice((explode('\\',$val)), -1))[0];;
									$det=$select[$item][1];
								?>		
								<td><?php if(isset($item1-> $val-> $det)): ?><?php echo e($item1-> $val-> $det); ?><?php endif; ?></td>
							<?php elseif(array_key_exists($item, $master)): ?>	
								<?php 
									$val=$master[$item][0];
									$val=array_values(array_slice((explode('\\',$val)), -1))[0];;
									$det=$master[$item][1];
								?>		
								<td><?php if(isset($item1-> $val-> $det)): ?><?php echo e($item1-> $val-> $det); ?><?php endif; ?></td>
							<?php else: ?>	
							<?php
								$item_data=$item.'_edit';
								if(method_exists($item1, $item_data))
								{
									$data_value=$item1-> $item_data();
								}
								else
								{
									$data_value=$item1->$item;
								}
							?>
								<td><?php echo e($data_value); ?></td>	
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<td><form method="POST" action="<?php echo e(url('/')); ?>/frmbuilder/delete/<?php echo e($model->id); ?>/<?php echo e($item1->id); ?>">
							<?php echo method_field('DELETE'); ?>
							<?php echo csrf_field(); ?>
							<a class="btn btn-info" href="<?php echo e(url('/')); ?>/frmbuilder/edit/<?php echo e($model->id); ?>/<?php echo e($item1->id); ?>">Edit</a>
							<button class="btn btn-danger">Delete</button>
						</form></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>	
			</div>
			<div class="card-footer">
			<ul class="pagination pagination-sm">
			<li class="page-item <?php if((isset($_GET['page']) && $_GET['page']<2) || !isset($_GET['page'])): ?> disabled <?php endif; ?>"><a class="page-link" href="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($model->id); ?><?php if(isset($_GET['page'])): ?>?page=<?php echo e($_GET['page']-1); ?><?php endif; ?>">Previous</a></li>
				<?php for($i=0;$i<(ceil($count));$i++): ?>
				<li class="page-item <?php if((isset($_GET['page']) && $_GET['page']==($i+1)) || (!isset($_GET['page']) && ceil($count)<2) ): ?> disabled <?php endif; ?>"><a class="page-link" href="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($model->id); ?>?page=<?php echo e($i+1); ?>"> <?php echo e($i+1); ?></a></li>
				<?php endfor; ?>
				<li class="page-item <?php if((isset($_GET['page']) && $_GET['page']==ceil($count)) || (!isset($_GET['page']) && ceil($count)<2)): ?> disabled <?php endif; ?>"><a class="page-link" href="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($model->id); ?><?php if(isset($_GET['page'])): ?>?page=<?php echo e($_GET['page']+1); ?><?php else: ?>?page=2 <?php endif; ?>">Next</a></li>
			</ul>
			</div>		
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/formbuilder/index.blade.php ENDPATH**/ ?>