<!--formbuilder created by RDMarwein -->

<?php $__env->startSection('script'); ?>
<link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('js/select2.full.min.js')); ?>"></script>
<script>
$(document).ready(function(){
	<?php if(sizeof((array)$scriptKey)>0): ?>
	<?php $__currentLoopData = $scriptKey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		$("#<?php echo e($item[0]); ?>").change(function() {
			var id=this.value;
			var data=getUrlData("<?php echo e($item[1]); ?>/"+id);
			var html="";
			html+='<option value="">--Select Value--</option>';
			for(i=0;i<data.length;i++)
	        {
	            html+='<option value="'+data[i].<?php echo e($item[3]); ?>+'">'+data[i].<?php echo e($item[4]); ?>+'</option>';
	        }
	        $("#<?php echo e($item[2]); ?>").html(html);
		});
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
 	function getUrlData(urlToFetch)
  	{
  		var jSON;
	  	$.ajax({
	        url: "<?php echo e(url('/')); ?>/"+urlToFetch,
	        type: 'GET',
	        async: false,
	        data: {
	        },
	        success: function(data)
	        {
	        	jSON=data;
	        }
	    });
	    return jSON;
	}

	
	$(function () {
		$("select").select2();
	});
});
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<?php if(session()->has('message')): ?>
	    <div class="alert alert-success">
	        <?php echo e(session()->get('message')); ?>

	    </div>
	<?php endif; ?>
	<form id="partybillForm" method="POST" action="<?php echo e(url('/')); ?>/formbuilder/<?php echo e($model->id); ?>" target="">
	<?php echo e(csrf_field()); ?>

	<div class="card bg-secondary text-white">
		<div class="card-header bg-info"><?php echo e($model->header); ?></div>
		<div class="card-body">
			<div class="row">
			<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(!in_array($item,$exclude) && $item!='id' && $item!='created_at' && $item!='updated_at'): ?>
					<?php
						$title=ucwords(str_replace('_',' ',$item));
					?>
					<?php if(array_key_exists($item, $master)): ?>
						<div class="col-sm-6 col-xl-4" id="<?php echo e($item); ?>1">
							<div class="form-group">
								<label for="<?php echo e($master[$item][2]); ?>"><?php echo e(ucwords(str_replace('_',' ',$master[$item][2]))); ?></label>
								<select type="text" class="form-control" id="<?php echo e($master[$item][2]); ?>">
									<option value="">--Select <?php echo e(ucwords(str_replace('_',' ',$master[$item][2]))); ?>--</option>
									<?php $__currentLoopData = $master[$item][0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$val=$master[$item][1];
										$det=$master[$item][2];
									?>
										<option value="<?php echo e($data->$val); ?>"><?php echo e($data->$det); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-xl-4" id="<?php echo e($item); ?>2">
							<div class="form-group">
								<label for="<?php echo e($item); ?>"><?php echo e(ucwords(str_replace('_',' ',$master[$item][3]))); ?></label>
								<select type="text" class="form-control" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>">
									<option value="">--Select <?php echo e($title); ?>--</option>
								</select>
							</div>
						</div>
					<?php else: ?>
						<div class="col-sm-6 col-xl-4" id="<?php echo e($item); ?>1">
							<div class="form-group">
								<label for="<?php echo e($item); ?>"><?php echo e($title); ?></label>
								<?php if(array_key_exists($item, $select)): ?>
								<select class="form-control" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>">
								<option value="">--Select <?php echo e($title); ?>--</option>
									<?php $__currentLoopData = $select[$item][0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$val=$select[$item][1];
										$det=$select[$item][2];
									?>
										<option value="<?php echo e($data->$val); ?>"><?php echo e($data->$det); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php elseif(array_key_exists($item, $inputType)): ?>
									<?php if($inputType[$item]=='textarea'): ?>
										<textarea class="form-control <?php if(isset($class) && array_key_exists($item, $class)): ?> <?php echo e($class[$item]); ?> <?php endif; ?>" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>" <?php if(isset($attribute) && array_key_exists($item, $attribute)): ?> <?php echo e($attribute[$item]); ?> <?php endif; ?>></textarea>
									<?php else: ?>
										<input type="<?php echo e($inputType[$item]); ?>" class="form-control <?php if(isset($class) && array_key_exists($item, $class)): ?> <?php echo e($class[$item]); ?> <?php endif; ?> form-control-sm" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>" <?php if(isset($attribute) && array_key_exists($item, $attribute)): ?> <?php echo e($attribute[$item]); ?> <?php endif; ?>>
									<?php endif; ?>
								<?php else: ?>
								<input type="text" class="form-control <?php if(isset($class) && array_key_exists($item, $class)): ?> <?php echo e($class[$item]); ?> <?php endif; ?> form-control-sm" id="<?php echo e($item); ?>" name="<?php echo e($item); ?>" <?php if(isset($attribute) && array_key_exists($item, $attribute)): ?> <?php echo e($attribute[$item]); ?> <?php endif; ?>>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
		<div class="card-footer">
			<div class="offset-md-5">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	</div>
	</form>
	<br>
	<h3>NOTES:</h3>
	<ul>
	<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><?php echo e($item); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/formbuilder/create.blade.php ENDPATH**/ ?>