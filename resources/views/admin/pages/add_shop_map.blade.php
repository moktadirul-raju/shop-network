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
							<select name="country_id" id="country" class="single form-control" onchange="getCity()">
							<option value="">Select Country</option>
							@foreach($countries as $country)
							<option value="{{ $country->id }}">
								{{ $country->country }}
							</option>
							@endforeach
						</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">City</label>
							<select name="city" class="single form-control"
									id="city" onchange="getLatLan()">
								<optgroup>
									<option value="" >Select City</option>
								</optgroup>
							</select>
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
					<div class="col-md-3">
						@php
							$currencies = DB::table('currencies')->get();
						@endphp
						<div class="form-group">
							<label for="">Currency</label>
							<input type="text" name="currency" class="form-control" placeholder="Currency">
							{{-- <select name="currency_id" class="single form-control">
							<option value="">Select Country</option>
							@foreach($currencies as $currency)
							<option value="{{ $currency->id }}">
								{{ $currency->currency }}
							</option>
							@endforeach
						</select> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Minimum Price</label>
							<input class="form-control" name="min_price" id="demoDate" type="text" placeholder="Minimum Price">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Maximum Price</label>
							<input type="text" name="max_price" class="form-control" placeholder="Maximum Price">
						</div>
					</div>
					<div class="col-md-3">
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
							<label for="">Youtube Link</label>
							<input type="text" name="youtube_link" class="form-control" placeholder="Youtube Link">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
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
					<div class="col-md-12">
						<input type="text" id="address-input" name="address_address" class="form-control map-input">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Latitude</label>
						<input type="text" name="lat" id="address-latitude" class="form-control" placeholder="Latitude">
					</div>
					<div class="col-md-3">
						<label for="">Longitude</label>
						<input type="text" name="lan" id="address-longitude" class="form-control" placeholder="Longitude">
					</div>
					<div class="col-md-6">
						<div id="address-map-container" style="width:100%;height:400px; ">
						    <div style="width: 100%; height: 100%" id="address-map"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Saturday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="sat_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="sat_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="sat_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h5>Sunday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="sun_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="sun_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="sun_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Monday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="mon_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="mon_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="mon_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h5>Tuesday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="tues_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="tues_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="tues_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Wednesday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="wed_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="wed_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="wed_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h5>Thursday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="thus_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="thus_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="thus_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Friday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="fri_opening_status" id="" class="form-control">
									<option value="open">Open</option>
									<option value="close">Close</option>
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="fri_opening_time" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="fri_closing_time" class="form-control" placeholder="Time">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-info btn-block mt-5">Add</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('assets/admin/js/map/map.js') }}"></script>
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

	function getLatLan(){
		var selectedText = $("#city option:selected").html();
        alert(selectedText);
		axios.get(`/api/get-city/${id}`)
        .then(function (response) {
            console.log(response.results[0].geometry.location.lat);
     		console.log(response.results[0].geometry.location.lng);
        });
		
	}

	function getCity(){
        $('#city') .find('option') .remove() .end() .append('<option value="">Select City</option>');
        var id = document.getElementById('country').value;

         axios.get(`/api/get-city/${id}`)
        .then(function (response) {
            var list = response.data;
            var select = document.getElementById("city");
            for(i = 0; i < list.length ;i ++){
                var el = document.createElement("option");
                var cities = list[i];
                var cityName = cities.city_name;
                var cityId = cities.id;
                el.textContent = cityName;
                el.value = cityName;
                select.appendChild(el);
            }
        });
    }
</script>
@endpush