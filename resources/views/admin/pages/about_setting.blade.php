@extends('admin.layouts.app')
@section('title','Privacy Policy')

@section('content')
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
			<form action="{{ route('admin.about.update',$about->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Title</label>
							<input type="text" name="title" class="form-control" value="{{ $about->title }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" value="{{ $about->email }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Phone</label>
							<input type="text" name="phone" class="form-control" value="{{ $about->phone }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Website Link</label>
							<input type="text" name="website_link" class="form-control" value="{{ $about->website_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Facebook Link</label>
							<input type="text" name="facebook_link" class="form-control" value="{{ $about->facebook_link }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Youtube Link</label>
							<input type="text" name="youtube_link" class="form-control" value="{{ $about->youtube_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Google Plus Link</label>
							<input type="text" name="google_plus_link" class="form-control" value="{{ $about->google_plus_link }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Instagram Link</label>
							<input type="text" name="instagram_link" class="form-control" value="{{ $about->instagram_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Pinterest Link</label>
							<input type="text" name="pinterest_link" class="form-control" value="{{ $about->pinterest_link }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Twitter Link</label>
							<input type="text" name="twitter_link" class="form-control" value="{{ $about->twitter_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					<label for="content">GDPR Content</label>
					<textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ $about->content }}
					</textarea>
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					<label for="safety_tips">Content</label>
					<textarea name="safety_tips" id="safety_tips" cols="30" rows="5" class="form-control">{{ $about->safety_tips }}
					</textarea>
				</div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Content</label>
					 <textarea name="description">
					 	{{ $about->description }}
					 </textarea>
                <script>
                        CKEDITOR.replace( 'description' );
                </script>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Image</label>
							<img src="{{ asset($about->image) }}" class="img-responsive" alt="Image" style="height: 100px;width: 100px;">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Image</label>
							<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					        <button type="submit" class="btn btn-info mt-4">Update</button>
				        </div>
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>
@endsection