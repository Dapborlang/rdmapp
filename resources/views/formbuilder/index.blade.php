<!--Formbuilder created by RDMarwein -->
@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
	@if(session()->has('fail-message'))
	    <div class="alert alert-danger">
	        {{ session()->get('fail-message') }}
	    </div>
	@endif
	<div class="card">
		<div class="card-header bg-info">{{$model->header}}</div>
		<div class="card-body">	
			<form method="POST" action="{{url('/')}}/formbuilder/{{$model->id}}/index">
				{{csrf_field()}}
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
				@foreach($columns as $item)
					@if(!in_array($item,$exclude))
					@php
						$title=ucwords(str_replace('_',' ',$item));
					@endphp
						@if(array_key_exists($item, $master))
							<th>{{ucwords(str_replace('_',' ',$master[$item][1]))}}</th>
						@else
							<th>{{$title}}</th>
						@endif
					@endif
				@endforeach
					<th>Option</th>
				</tr>
				@foreach($table as $item1)
				<tr>
					<td>{{$loop->iteration}}</td>
					@foreach($columns as $item)
						@if(!in_array($item,$exclude))	
							@if(array_key_exists($item, $select))
								@php 
									$val=$select[$item][0];
									$val=array_values(array_slice((explode('\\',$val)), -1))[0];;
									$det=$select[$item][1];
								@endphp		
								<td>@if(isset($item1-> $val-> $det)){{ $item1-> $val-> $det }}@endif</td>
							@elseif(array_key_exists($item, $master))	
								@php 
									$val=$master[$item][0];
									$val=array_values(array_slice((explode('\\',$val)), -1))[0];;
									$det=$master[$item][1];
								@endphp		
								<td>@if(isset($item1-> $val-> $det)){{ $item1-> $val-> $det }}@endif</td>
							@else	
							@php
								$item_data=$item.'_edit';
								if(method_exists($item1, $item_data))
								{
									$data_value=$item1-> $item_data();
								}
								else
								{
									$data_value=$item1->$item;
								}
							@endphp
								<td>{{$data_value}}</td>	
							@endif
						@endif
					@endforeach
					<td><form method="POST" action="{{ url('/') }}/frmbuilder/delete/{{$model->id}}/{{$item1->id}}">
							@method('DELETE')
							@csrf
							<a class="btn btn-info" href="{{ url('/') }}/frmbuilder/edit/{{$model->id}}/{{$item1->id}}">Edit</a>
							<button class="btn btn-danger">Delete</button>
						</form></td>
				</tr>
				@endforeach
			</table>	
			</div>
			<div class="card-footer">
			<ul class="pagination pagination-sm">
			<li class="page-item @if((isset($_GET['page']) && $_GET['page']<2) || !isset($_GET['page'])) disabled @endif"><a class="page-link" href="{{url('/')}}/formbuilder/{{$model->id}}@if(isset($_GET['page']))?page={{$_GET['page']-1}}@endif">Previous</a></li>
				@for($i=0;$i<(ceil($count));$i++)
				<li class="page-item @if((isset($_GET['page']) && $_GET['page']==($i+1)) || (!isset($_GET['page']) && ceil($count)<2) ) disabled @endif"><a class="page-link" href="{{url('/')}}/formbuilder/{{$model->id}}?page={{$i+1}}"> {{$i+1}}</a></li>
				@endfor
				<li class="page-item @if((isset($_GET['page']) && $_GET['page']==ceil($count)) || (!isset($_GET['page']) && ceil($count)<2)) disabled @endif"><a class="page-link" href="{{url('/')}}/formbuilder/{{$model->id}}@if(isset($_GET['page']))?page={{$_GET['page']+1}}@else?page=2 @endif">Next</a></li>
			</ul>
			</div>		
		</div>
	</div>
</div>
@endsection