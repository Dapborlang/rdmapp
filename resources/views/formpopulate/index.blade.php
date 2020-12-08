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
	<div class="card">
		<div class="card-header bg-info">List Of Forms</div>
		<div class="card-body">	
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Form ID
                        </th>
                        <th>
                            Header
                        </th>
                        <th>
                            Table Name
                        </th>
                        <th>
                            Model
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            Options
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($forms as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                            {{$item->header}}
                        </td>
                        <td>
                            {{$item->table_name}}
                        </td>
                        <td>
                            {{$item->model}}
                        </td>
                        <td>
                            {{$item->Role->RoleName->detail}}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{url('/')}}/formpopulate/{{$item->id}}/edit">Edit Master</a> | 
                            <a class="btn btn-info btn-sm" href="{{url('/')}}/formpopulateindex/{{$item->id}}">View Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div>
@endsection