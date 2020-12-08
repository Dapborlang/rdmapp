<!-- created by RDMarwein -->
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
	<form id="partybillForm" method="POST" action="{{ url('/') }}/{{$postData}}" target="">
	{{ csrf_field() }}
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">{{$card_header}}</div>
		<div class="card-body">	
			<div class="row">
			@foreach($columns as $item)
				@if($item!='id' && $item!='created_at' && $item!='updated_at')
				@php
				    $title=ucwords(str_replace('_',' ',$item));
				@endphp
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="{{$item}}">{{$title}}</label>
		                @if(isset($select) && array_key_exists($item, $select))
		                <select type="text" class="form-control" id="{{$item}}" name="{{$item}}">
		                	@foreach($select[$item] as $data)
		                		<option value="{{$data->$item}}">{{$data->detail}}</option>
		                	@endforeach
		                </select>
		                @else
		                <input type="text" class="form-control @if(isset($key) && array_key_exists($item, $key)) {{$key[$item]}} @endif" id="{{$item}}" name="{{$item}}">
		                @endif
					</div>
				</div>
				@endif
			@endforeach
			</div>
		</div>
		<div class="card-footer">
			<div class="offset-md-5">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	</div>
	</form>
</div>
<br>
<div class="container">
@if(isset($note))
<ul >	
	@foreach($note as $item)
	<li >{{$item}}</li>
	@endforeach
</ul>
@endif
</div>
@endsection