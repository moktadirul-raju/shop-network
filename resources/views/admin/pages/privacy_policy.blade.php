@extends('admin.layouts.app')
@section('title','Privacy Policy')

@section('content')
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
			<form action="{{ route('admin.policy-update') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="">Content</label>
					 <textarea name="content">
					 	{{ $policy->content }}
					 </textarea>
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
				</div>
				<div class="form-group">
					<label for="">Privacy Policy URL :</label>
					<input type="text" name="url" value="{{ $policy->url }}" class="form-control">

				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Update</button>
				</div>
			</form>
		</div>
		</div>
	</div>
@endsection