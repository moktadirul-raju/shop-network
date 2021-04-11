@extends('admin.layouts.app')
@section('title','Edit User')

@section('content')
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<form action="{{ route('admin.update-user',$user->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="name" class="form-control" value="{{ $user->name }}">
					</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
						<label for="">Nick Name</label>
						<input type="text" name="nickname" class="form-control" value="{{ $user->nickname }}">
					</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" value="{{ $user->email }}">
					</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
						<label for="">Mobile</label>
						<input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
					</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Current Image</label>
								<img src="{{ asset($user->image) }}" class="img-responsive" alt="Image" style="height: 100px;width: 100px;">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Image</label>
								<input type="file" name="image" class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div class="col-md-3">
							<button type="submit" class="mt-4 btn btn-success btn-block">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection