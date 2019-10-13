<!DOCTYPE html>
<html>
	<head>
		<title>Buttons</title>
		<meta charset="utf-8">
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
			$('#p1').click(function () {
		        if ($(this).is(':checked')) {
		            ajaxCall("p1on");
		        }
		        else
		        {
		        	ajaxCall("p1off");
		        }
		    });

			$('#p2').click(function () {
		        if ($(this).is(':checked')) {
		            ajaxCall("p2on");
		        }
		        else
		        {
		        	ajaxCall("p2off");
		        }
		    });

		    $('#p4').click(function () {
		        if ($(this).is(':checked')) {
		            ajaxCall("p4on");
		        }
		        else
		        {
		        	ajaxCall("p4off");
		        }
		    });



		    function ajaxCall(id)
		    {
		    	$("#myModal").modal('show');
		    	$.ajax({
					url: '{{ url('/') }}/getURIData',
					data: {
						uri 	: 'http://{{$ip}}/'+id,
						_token	: '{{ csrf_token() }}',
					},
					type: 'POST',
					success: function(data)
                    {
                    	$("#status").html(data);
                    	$("#myModal").modal('hide');
                    }
				});
		    }				
		});
	</script>
<body>


<h2>Switches</h2>
<table class="table table-striped">
	<tr>
		<td class="col-sm-6 col-xs-6">
			Ceiling Light:
		</td>
		<td class="col-sm-6 col-xs-6">
			<label class="switch">
			  <input type="checkbox" id="p1">
			  <span class="slider"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td class="col-sm-6 col-xs-6">
			Side Light:
		</td>
		<td class="col-sm-6 col-xs-6">
			<label class="switch">
			  <input type="checkbox" id="p2">
			  <span class="slider"></span>
			</label>
		</td>
	</tr>
	<tr>
		<td class="col-sm-6 col-xs-6">
			Geyser:
		</td>
		<td class="col-sm-6 col-xs-6">
			<label class="switch">
			  <input type="checkbox"id="p4">
			  <span class="slider"></span>
			</label>
		</td>
	</tr>
</table>
<div id="status">
</div>

<div class="modal fade" id="myModal">
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

