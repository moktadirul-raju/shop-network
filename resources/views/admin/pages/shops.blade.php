@extends('admin.layouts.app')
@section('title',$title)

@push('css')

@endpush

@section('content')
<div class="col-md-12" style="margin-top: 10px;">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">{{ $title }}</h5>
			<form action="{{ route('admin.search-shop') }}" method="POST" class="form-inline" style="float: right;">
	         	@csrf
	        	<div class="form-group mb-2">
	            	<input type="text" name="mobile" class="form-control" placeholder="Mobile/Email">
	        	</div>
	        	&nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>Search</button>
    		</form>
		</div>
		<div class="tile-body">
			<table class="table table-bordered table-striped text-nowrap text-sm-left mt-5">
		        <thead>
			        <tr>
				    	<th>Sl.no</th>
				     	<th>User</th>
				     	<th>Category</th>
				     	<th>Title</th>
				     	<th>Action</th>
			        </tr>
				</thead>
				<tbody>
					@foreach($shops as $shop)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $shop->user->name }}</td>
						<td>{{ $shop->category_id != null ?$shop->category->category : '' }}</td>
						<td>{{ $shop->title }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('admin.details',$shop->id) }}"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@push('js')

@endpush