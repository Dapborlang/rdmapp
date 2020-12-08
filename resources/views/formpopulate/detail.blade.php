<!-- created by RDMarwein -->
@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header bg-info">List Of Forms</div>
		<div class="card-body">	
            <form method="POST" action="{{url('/')}}/formpopulateindex/{{$form->index->id}}">
                {{csrf_field()}}
                @method('PUT')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                Exclude
                            </th>
                            <th>
                                Notes
                            </th>
                            <th>
                                Script
                            </th>
                            <th>
                                Master Keys
                            </th>
                            <th>
                                Foreign Keys
                            </th>
                            <th>
                                Class
                            </th>
                            <th>
                                Attribute
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Cnotes
                            </th>
                            <th>
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea rows="5" class="form-control" name="exclude">{{$form->index->exclude}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="notes">{{$form->index->notes}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="script">{{$form->index->script}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="master_keys">{{$form->index->master_keys}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="foreign_keys">{{$form->index->foreign_keys}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="class">{{$form->index->class}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="attribute">{{$form->index->attribute}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="type">{{$form->index->type}}</textarea>
                            </td>
                            <td>
                                <textarea rows="5" class="form-control" name="cnotes">{{$form->index->cnotes}}</textarea>
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-primary btn-sm">Update</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
		</div>
	</div>
    @if (count($errors) > 0)
        <div class="alert alert-danger"> 
            <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
    @endif
</div>
@endsection