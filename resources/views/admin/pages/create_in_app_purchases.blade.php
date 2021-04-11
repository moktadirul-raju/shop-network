@extends('admin.layouts.app')
@section('title','Add In App Product')

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			<h6>In App Purchased Informations</h6><hr>
		</div>
		<div class="tile-body">
			@if(isset($app))
			<form action="{{ route('admin.in-app-purchases.update',$app->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-goup">
					<label for="">In App Purchased Product Id</label>
					<input type="text" name="product_id" class="form-control" value="{{ $app->product_id }}">
				</div>
				<div class="form-goup">
					<label for="">Day</label>
					<input type="text" name="day" class="form-control" value="{{ $app->day }}">
				</div>
				<div class="form-goup">
					<label for=""> Description</label>
					<textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $app->description }}</textarea>
				</div>
				<div class="form-goup">
					<label for="">Type</label>
					<select name="type" id="" class="form-control">
						<option value="{{ $app->type }}">{{ $app->type }}</option>
						@if($app->type == 'Ios')
							<option value="Android">Android</option>
						@elseif($app->type == 'Android')
							<option value="Ios">Ios</option>
						@endif
					</select>
				</div>
				<br>
				<div class="form-goup">
					<input name="is_published" type="checkbox"  value="1" {{ $app->is_published == 1 ? 'checked' : '' }}>Status(Is Publish?)
				</div>
				<br>
				<div class="form-goup">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>


			@else


			<form action="{{ route('admin.in-app-purchases.store') }}" method="POST">
				@csrf
				<div class="form-goup">
					<label for="">In App Purchased Product Id</label>
					<input type="text" name="product_id" class="form-control" placeholder="In App Purchased Product Id">
				</div>
				<div class="form-goup">
					<label for="">Day</label>
					<input type="text" name="day" class="form-control" placeholder="Day">
				</div>
				<div class="form-goup">
					<label for=""> Description</label>
					<textarea class="form-control" name="description" id="" cols="30" rows="5"> Description</textarea>
				</div>
				<div class="form-goup">
					<label for="">Type</label>
					<select name="type" id="" class="form-control">
						<option value="Ios">Ios</option>
						<option value="Android">Android</option>
					</select>
				</div>
				<br>
				<div class="form-goup">
					<input name="is_published" type="checkbox"  value="1">Status(Is Publish?)
				</div>
				<br>
				<div class="form-goup">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			@endif
		</div>
	</div>
</div>
@endsection