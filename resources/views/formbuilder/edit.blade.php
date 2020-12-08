<!--Formbuilder created by RDMarwein -->
@extends('layouts.app')
@section('script')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script>
$(document).ready(function(){
	@if(sizeof((array)$scriptKey)>0)
	@foreach($scriptKey as $item)
		$("#{{$item[0]}}").change(function() {
			var id=this.value;
			var data=getUrlData("{{$item[1]}}/"+id);
			var html="";
			html+='<option value="">--Select Value--</option>';
			for(i=0;i<data.length;i++)
	        {
	            html+='<option value="'+data[i].{{$item[3]}}+'">'+data[i].{{$item[4]}}+'</option>';
	        }
	        $("#{{$item[2]}}").html(html);
		});
	@endforeach
	@endif
 	function getUrlData(urlToFetch)
  	{
  		var jSON;
	  	$.ajax({
	        url: "{{ url('/') }}/"+urlToFetch,
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
@endsection
@section('content')
<div class="container-fluid">
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
	<form method="POST" action="{{ url('/') }}/frmbuilder/update/{{$model->id}}/{{$content->id}}" target="">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">{{$model->header}}</div>
		<div class="card-body">
			<div class="row">
			@foreach($columns as $item)
			@php
			$item_data=$item.'_edit';
			if(method_exists($content, $item_data))
			{
				$data_value=$content-> $item_data();
			}
			else
			{
				$data_value=$content-> $item;
			}
			@endphp
			@if(!in_array($item,$exclude) && $item!='id' && $item!='created_at' && $item!='updated_at')
				@php
				    $title=ucwords(str_replace('_',' ',$item));
				@endphp
				@if(array_key_exists($item, $master))
				<div class="col-sm-6 col-xl-4" id="{{$item}}1">
					<div class="form-group">
		                <label for="{{$master[$item][2]}}">{{ucwords(str_replace('_',' ',$master[$item][2]))}}</label>
		                <select type="text" class="form-control" id="{{$master[$item][2]}}">
		                	<option value="">--Select {{ucwords(str_replace('_',' ',$master[$item][2]))}}--</option>
		                	@foreach($master[$item][0] as $data)
		                	@php
		                		$val=$master[$item][1];
		                		$det=$master[$item][2];
		                	@endphp
		                		<option value="{{$data->$val}}">{{$data->$det}}</option>
		                	@endforeach
		                </select>
		            </div>
		        </div>
		        <div class="col-sm-6 col-xl-4" id="{{$item}}2">
					<div class="form-group">
		                <label for="{{$item}}">{{$master[$item][3]}}</label>
		                <select type="text" class="form-control" id="{{$item}}" name="{{$item}}">
		                	<option value="">--Select {{$title}}--</option>
		                </select>
		            </div>
		        </div>
				@else
				<div class="col-sm-6 col-xl-4" id="{{$item}}1">
					<div class="form-group">
		                <label for="{{$item}}">{{$title}}</label>
		                @if(array_key_exists($item, $select))
		                <select type="text" class="form-control" id="{{$item}}" name="{{$item}}">
							@php
		                		$current=$content-> $item;
		                	@endphp
							<option value="{{$current}}">({{$current}}) NO CHANGES</option>
		                	@foreach($select[$item][0] as $data)
		                	@php
		                		$val=$select[$item][1];
		                		$det=$select[$item][2];
		                	@endphp
		                		<option value="{{$data->$val}}">({{$data->$val}}) {{$data->$det}}</option>
		                	@endforeach
                        </select>
                        @elseif(array_key_exists($item, $inputType))
							@if($inputType[$item]=='textarea')
                        		<textarea class="form-control @if(isset($class) && array_key_exists($item, $class)) {{$class[$item]}} @endif" id="{{$item}}" name="{{$item}}" @if(isset($attribute) && array_key_exists($item, $attribute)) {{$attribute[$item]}} @endif>{{$data_value}}</textarea>
							@else
								<input type="{{$inputType[$item]}}" class="form-control @if(isset($class) && array_key_exists($item, $class)) {{$class[$item]}} @endif form-control-sm" id="{{$item}}" name="{{$item}}" value="{{$data_value}}" @if(isset($attribute) && array_key_exists($item, $attribute)) {{$attribute[$item]}} @endif>
							@endif
						@else
		                <input type="text" class="form-control @if(isset($class) && array_key_exists($item, $class)) {{$class[$item]}} @endif form-control-sm" id="{{$item}}" name="{{$item}}" value="{{$data_value}}" @if(isset($attribute) && array_key_exists($item, $attribute)) {{$attribute[$item]}} @endif>
		                @endif
					</div>
				</div>
				@endif
				@endif
			@endforeach
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
@endsection
