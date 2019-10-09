@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-info">{{$card_header}}</div>
		<div class="card-body">	
		<table class="table table-bordered">
			<tr>
			@foreach($columns as $item)
				@if($item!='id' && $item!='created_at' && $item!='updated_at')
				@php
				    $title=ucwords(str_replace('_',' ',$item));
				@endphp
		            <th>{{$title}}</th>
				@endif
			@endforeach
				<th>Option</th>
			</tr>
			@foreach($table as $item1)
			<tr>
				@foreach($columns as $item)
					@if($item!='id' && $item!='created_at' && $item!='updated_at')
			            <td>{{ $item1-> $item}}</td>
					@endif
				@endforeach
				<td><a class="btn btn-info" href="{{ url('/') }}/{{$route}}/{{$item1->id}}/edit">Edit</a></td>
			</tr>
			@endforeach
		</table>
		</div>
	</div>
</div>
@endsection