<!DOCTYPE html>
<html>
	<head>
		<title>Buttons</title>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="40">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	.switch input { 
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
	</style>

	<script type="text/javascript">
		$( document ).ready(function() {
			<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			$('#<?php echo e($item->pin); ?>').click(function () {
		        if ($(this).is(':checked')) {
		            ajaxCall("on","<?php echo e($item->id); ?>");
		        }
		        else
		        {
		        	ajaxCall("off","<?php echo e($item->id); ?>");
		        }
		    });
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		    function ajaxCall(stat,id)
		    {
		    	$("#status").html('Please Wait...');
		    	$("#myModal").modal({
				    backdrop: 'static',
				    keyboard: false
				});
		    	$.ajax({
					url: '<?php echo e(url('/')); ?>/setStatus',
					data: {
						'id' 			: id,
						'status'    	: stat,
						'_token'  		: '<?php echo e(csrf_token()); ?>',
					},
					type: 'POST',
					success: function(data)
                    {
                    	$("#status").html(data);
                    	location.reload();
                    }
				});
		    }				
		});
	</script>
<body>


<h2>Switches</h2>
<table class="table table-striped">
	<?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td class="col-sm-6 col-xs-6">
			<?php echo e($item->detail); ?>:
		</td>
		<td class="col-sm-6 col-xs-6">
			<label class="switch">
			  <input type="checkbox" id="<?php echo e($item->pin); ?>" <?php if($item->status=='on'): ?> checked <?php endif; ?> >
			  <span class="slider"></span>
			</label>
		</td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<div id="status">
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-body">
	        	Please Wait...
	        </div>
      </div>
    </div>
</div>

</body>
</html> 

<?php /**PATH C:\Bitnami\wampstack-7.3.10-0\apache2\rdmapp\resources\views/ui/ui.blade.php ENDPATH**/ ?>