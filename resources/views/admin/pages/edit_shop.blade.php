@extends('admin.layouts.app')
@section('title','Add Shop')

@section('content')

<div class="col-md-12">
	<div class="tile">
		<div class="tile-header"></div>
		<div class="tile-body">
			<form action="{{ route('admin.shop.update',$shop->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">User Mobile</label>
							<input type="text" name="mobile" class="form-control" value="{{ $shop->user->mobile }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Shop Title</label>
							<input type="text" name="title" class="form-control" value="{{ $shop->title }}">
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Category</label>
						<select name="category_id" id="" class="single form-control" style="width: 100%;">
							<option value="{{ $shop->category_id }}">{{ $shop->category->category }}</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">
								{{ $category->category }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Established Date</label>
							<input class="form-control" name="established_date" id="demoDate" type="text" value="{{ $shop->established_date }}" autocomplete="off">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Country</label>
							<input type="text" name="country" class="form-control" value="{{ $shop->country }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">City</label>
							<input type="text" name="city" class="form-control" value="{{ $shop->city }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Street Address</label>
							<input class="form-control" name="street_address" id="demoDate" type="text" value="{{ $shop->street_address }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Additional Address</label>
							<input type="text" name="additional_address" class="form-control" value="{{ $shop->additional_address }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Zip Code</label>
							<input type="text" name="zip_code" class="form-control" value="{{ $shop->zip_code }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Shop Phone</label>
							<input class="form-control" name="phone" id="demoDate" type="text" value="{{ $shop->phone }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Fax</label>
							<input type="text" name="fax" class="form-control" value="{{ $shop->fax }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" value="{{ $shop->email }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Minimum Price</label>
							<input class="form-control" name="min_price" id="demoDate" type="text" value="{{ $shop->min_price }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Maximum Price</label>
							<input type="text" name="max_price" class="form-control" value="{{ $shop->max_price }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Discount</label>
							<input type="text" name="discount" class="form-control" value="{{ $shop->discount }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Website</label>
							<input type="text" name="website" class="form-control" value="{{ $shop->website }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Facebook Link</label>
							<input type="text" name="facebook_link" class="form-control" value="{{ $shop->facebook_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Twitter Link</label>
							<input type="text" name="twitter_link" class="form-control" value="{{ $shop->twitter_link }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Instagram Link</label>
							<input type="text" name="instagram_link" class="form-control" value="{{ $shop->instagram_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Linkedin Link</label>
							<input type="text" name="linkedin_link" class="form-control" value="{{ $shop->linkedin_link }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Youtube Link</label>
							<input type="text" name="youtube_link" class="form-control" value="{{ $shop->youtube_link }}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Facilities</label>
							<select name="facilities[]" id="" multiple class="multiple form-control" style="width: 100%;">
								@foreach($shop->facilities as $facility)
                            <option value="{{ $facility->id }}" selected="">
                                {{ $facility->facility_name }}
                            </option>
                            @endforeach	
	                    @foreach($facilities as $facility)		
	                      <option value="{{ $facility->id }}" >
	                      	{{ $facility->facility_name }}
	                      </option>
	                     @endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row" id="h_i">
           		@foreach($shop->images as $image)
           			<div class="col-md-3">
           				{{-- {{ route('admin.hotel-image-remove',$image->id) }} --}}
           				<span style="vertical-align: top;">
           					<button type="button" class="btn btn-danger btn-sm text-right" onclick="beSure({{ $image->id }})" style="float: right;">
           			    	<i class="fa fa-times-circle"></i>
           			     	</button>
           				</span>
           				<span style="vertical-align: bottom;">
           					<img src="{{ asset($image->image) }}" class="img-responsive p-3" alt="Image" style="height: 200px;width: 100%;">
           				</span>
           			    
           			</div>
           		@endforeach
           </div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Images(Multiple)</label>
						<input type="file" name="images[]" class="form-control" multiple>
					</div>
					<div class="col-md-6">
						<label for="description">Description</label>
						<textarea name="description" id="" cols="30" rows="1" class="form-control">
							{{ $shop->description }}
						</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-block">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@push('js')
<script>
	$(document).ready(function() {
	    $('.single').select2();
	    $('.multiple').select2();
	});
	$('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });

	function beSure(id) {
		swal({
          title: 'Are you sure?',
          text: "It will be remove from database",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              event.preventDefault();
              axios.delete('/admin/shop-image-remove/'+id);
              location.reload();
          } else if (
              // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
          ) {
              swal(
                  'Cancelled',
                  'Your data is safe :)',
                  'error'
              )
          }
      })  
    }
</script>
@endpush