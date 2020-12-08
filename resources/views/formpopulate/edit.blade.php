<!-- created by RDMarwein -->
@extends('layouts.app')
@section('script')
@endsection
@section('content')
<form id="partybillForm" method="POST" action="{{url('/')}}/formpopulate/{{$form->id}}" target="">
	{{csrf_field()}}
    @method('PUT')
	<div class="card bg-secondary text-white">
		<div class="card-header bg-info">Form Populate Master</div>
		<div class="card-body">	
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
		                <label for="header">Header</label>
		                <input type="text" class="form-control " id="header" name="header" value="{{$form->header}}">
		            </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="table_name">Table Name</label>
                        <input type="text" class="form-control " id="table_name" name="table_name" value="{{$form->table_name}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control " id="model" name="model" value="{{$form->model}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="route">Route</label>
                        <input type="text" class="form-control " id="route" name="route" value="{{$form->route}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select type="text" class="form-control" id="role" name="role">
                            @foreach($role as $item)
                            <option value="{{$item->role}}">{{$item->detail}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="offset-md-5">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection