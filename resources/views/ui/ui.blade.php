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
			$("#bank").change(function() {
				$.ajax({
					url: '{{ url('/') }}/bankbranch/'+this.value,
					type: 'GET',
					success: function(data)
                    {
                    	var x='<option value="">--SELECT BRANCH NAME--</option>';
                    	for(i=0;i<data.length;i++)
                		{
                			x+="<option value='"+data[i].ifsc+"'>"+data[i].branchname+"</option>";
                		}
                		$("#ifsc").html(x);
                    }
				});
				
			});
		});
	</script>
<body>


<h2>Switches</h2>

<label class="switch">
  <input type="checkbox">
  <span class="slider"></span>
</label>

<label class="switch">
  <input type="checkbox" checked>
  <span class="slider"></span>
</label><br><br>

</body>
</html> 

