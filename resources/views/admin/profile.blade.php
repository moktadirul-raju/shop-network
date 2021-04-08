@extends('admin.layouts.app')
@section('title','Admin Profile')

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			<h2>Admin Profile</h2>
		</div>
		<div class="tile-body">
			<form action="{{ route('admin.profile') }}" method="POST" role="form">
				@csrf
				@method('PUT')		
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" id="" value="{{ Auth::user()->name }}">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" class="form-control" id="" value="{{ Auth::user()->email }}">
				</div>
				<div class="form-group">
					<label for="">Mobile</label>
					<input type="text" name="mobile" class="form-control" id="" value="{{ Auth::user()->mobile }}">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" id="">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection