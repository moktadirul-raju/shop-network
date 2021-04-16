@extends('admin.layouts.app')
@section('title','Edit Shop')

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
							<select name="country_id" id="country" class="single form-control" style="width: 100%;" 
								onchange="getCity()">
							<optgroup>
                                <option value="{{ $shop->country_id }}">
                                    {{ $shop->country->country }}
                                </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->country }}</option>
                                @endforeach
                            </optgroup>
						</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">City</label>
							<select name="city" class="single form-control"
                                        id="city">
                                    <optgroup>
                                        <option value="{{ $shop->city != null? $shop->city : '' }}" >
                                            {{ $shop->city != null? $shop->city : '' }}
                                        </option>
                                    </optgroup>
                                </select>
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
					@php
						$currencies = DB::table('currencies')->get();
					@endphp
					<div class="col-md-3">
						<label for="">Currency</label>
						<input type="text" name="currency" value="{{ $shop->currency }}" class="form-control">
						{{-- <select name="currency_id" id="" class="single form-control" style="width: 100%;">
							@if($shop->currency_id != null)
								<option value="{{ $shop->currency_id }}">{{ $shop->currency->currency }}</option>
							@else
								<option value="">Select Currency</option>
							@endif	
							@foreach($currencies as $currency)
							<option value="{{ $currency->id }}">
								{{ $currency->currency }}
							</option>
							@endforeach
						</select> --}}
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Minimum Price</label>
							<input class="form-control" name="min_price" id="demoDate" type="text" value="{{ $shop->min_price }}">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Maximum Price</label>
							<input type="text" name="max_price" class="form-control" value="{{ $shop->max_price }}">
						</div>
					</div>
					<div class="col-md-3">
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
						<textarea name="description" id="" cols="30" rows="1" class="form-control">{{ $shop->description }}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="">Latitude</label>
						<input type="text" name="lat" class="form-control" value="{{ $shop->lat }}">
					</div>
					<div class="col-md-3">
						<label for="">Longitude</label>
						<input type="text" name="lan" class="form-control" value="{{ $shop->lan }}">
					</div>
					<div class="col-md-6">
						<h2>Map View</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h5>Saturday</h5><hr>
						<div class="row">
							<div class="col-md-4">
								<label for="">Status</label>
								<select name="sat_opening_status" id="" class="form-control">
									@if(sizeof($shop->saturday) > 0)
									<option value="{{ $shop->saturday[0]->opening_status }}">
										{{ $shop->saturday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->saturday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->saturday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="sat_opening_time" class="form-control" value="{{ sizeof($shop->saturday) > 0 ? $shop->saturday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="sat_closing_time" class="form-control" value="{{ sizeof($shop->saturday) > 0 ? $shop->saturday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->sunday) > 0)
									<option value="{{ $shop->sunday[0]->opening_status }}">
										{{ $shop->sunday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->sunday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->sunday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="sun_opening_time" class="form-control" value="{{ sizeof($shop->sunday) > 0 ? $shop->sunday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="sun_closing_time" class="form-control" value="{{ sizeof($shop->sunday) > 0 ? $shop->sunday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->monday) > 0)
									<option value="{{ $shop->monday[0]->opening_status }}">
										{{ $shop->monday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->monday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->monday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="mon_opening_time" class="form-control" value="{{ sizeof($shop->monday) > 0 ? $shop->monday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="mon_closing_time" class="form-control" value="{{ sizeof($shop->monday) > 0 ? $shop->monday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->tuesday) > 0)
									<option value="{{ $shop->tuesday[0]->opening_status }}">
										{{ $shop->tuesday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->tuesday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->tuesday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="tues_opening_time" class="form-control" value="{{ sizeof($shop->tuesday) > 0 ? $shop->tuesday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="tues_closing_time" class="form-control" value="{{ sizeof($shop->tuesday) > 0 ? $shop->tuesday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->wednesday) > 0)
									<option value="{{ $shop->wednesday[0]->opening_status }}">
										{{ $shop->wednesday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->wednesday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->wednesday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="wed_opening_time" class="form-control" value="{{ sizeof($shop->wednesday) > 0 ? $shop->wednesday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="wed_closing_time" class="form-control" value="{{ sizeof($shop->wednesday) > 0 ? $shop->wednesday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->thursday) > 0)
									<option value="{{ $shop->thursday[0]->opening_status }}">
										{{ $shop->thursday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->thursday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->thursday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="thus_opening_time" class="form-control" value="{{ sizeof($shop->thursday) > 0 ? $shop->thursday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="thus_closing_time" class="form-control" value="{{ sizeof($shop->thursday) > 0 ? $shop->thursday[0]->closing_time : ''}}">
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
									@if(sizeof($shop->friday) > 0)
									<option value="{{ $shop->friday[0]->opening_status }}">
										{{ $shop->friday[0]->opening_status == 'open' ? 'Open' : 'Close' }}
										@if($shop->friday[0]->opening_status == 'open')
										<option value="close">Close</option>
										@elseif($shop->friday[0]->opening_status == 'close')
										<option value="open">Open</option>
										@endif
									</option>
									@else 
									<option value="open">Open</option>
									<option value="close">Close</option>
									@endif
								</select>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Opening Time</label>
									<input type="text" name="fri_opening_time" class="form-control" value="{{ sizeof($shop->friday) > 0 ? $shop->friday[0]->opening_time : ''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Closing Time</label>
									<input type="text" name="fri_closing_time" class="form-control" value="{{ sizeof($shop->friday) > 0 ? $shop->friday[0]->closing_time : ''}}">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-block mt-5">Update</button>
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
<script>
	function getCity(){
        $('#city') .find('option') .remove() .end() .append('<option value="">Select City</option>');
        var id = document.getElementById('country').value;

         axios.get(`/api/get-city/${id}`)
        .then(function (response) {
            var list = response.data;
            console.log(list);
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