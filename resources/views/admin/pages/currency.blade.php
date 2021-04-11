@extends('admin.layouts.app')
@section('title','Currency')

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="tile">
			<div class="tile-body">
				<form action="{{ route('admin.currency-update',$currency->id) }}" method="POST">
					@csrf
					<div class="form-group">
						<label for="">Currency</label>
						<input type="text" name="currency" value="{{ $currency->currency }}" class="form-control">
					</div>
					<button type="submit" class="btn btn-info">Update</button>
				</form>
			</div>
		</div>
	</div>
@endsection