@extends('admin.layouts.app')
@section('title','Add Shop')

@section('content')

<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			
		</div>
		<div class="tile-body">
			<form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">User Mobile</label>
							<input type="text" name="mobile" class="form-control" placeholder="User Mobile">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Shop Title</label>
							<input type="text" name="title" class="form-control" placeholder="Shop Title">
						</div>
					</div>
					<div class="col-md-4">
						<label for="">Category</label>
						<select name="category_id" id="" class="single form-control">
							<option value="">Select Category</option>
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
							<input class="form-control" name="established_date" id="demoDate" type="text" placeholder="Established Date">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Country</label>
							<input type="text" name="country" class="form-control" placeholder="Country">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">City</label>
							<input type="text" name="city" class="form-control" placeholder="City">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Street Address</label>
							<input class="form-control" name="street_address" id="demoDate" type="text" placeholder="Street Address">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Additional Address</label>
							<input type="text" name="additional_address" class="form-control" placeholder="Additional Address">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Zip Code</label>
							<input type="text" name="zip_code" class="form-control" placeholder="Zip Code">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Shop Phone</label>
							<input class="form-control" name="phone" id="demoDate" type="text" placeholder="Phone">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Fax</label>
							<input type="text" name="fax" class="form-control" placeholder="Fax">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Minimum Price</label>
							<input class="form-control" name="min_price" id="demoDate" type="text" placeholder="Minimum Price">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Maximum Price</label>
							<input type="text" name="max_price" class="form-control" placeholder="Maximum Price">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Discount</label>
							<input type="text" name="discount" class="form-control" placeholder="Discount">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Website</label>
							<input type="text" name="website" class="form-control" placeholder="Website">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Facebook Link</label>
							<input type="text" name="facebook_link" class="form-control" placeholder="Facebook Link">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Twitter Link</label>
							<input type="text" name="twitter_link" class="form-control" placeholder="Twitter Link">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Instagram Link</label>
							<input type="text" name="instagram_link" class="form-control" placeholder="Instagram Link">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Linkedin Link</label>
							<input type="text" name="linkedin_link" class="form-control" placeholder="Linkedin Link">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Facilities</label>
							<select name="facilities[]" id="" multiple="multiple" class="multiple form-control">
								<option value="">Select Facilities</option>
								@foreach($facilites as $facility)
								<option value="{{ $facility->id }}">
									{{ $facility->facility_name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Images(Multiple)</label>
						<input type="file" name="images[]" class="form-control" multiple>
					</div>
					<div class="col-md-6">
						<label for="">Description</label>
						<textarea name="description" id="" cols="30" rows="1" class="form-control"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-block">Add</button>
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
</script>
@endpush