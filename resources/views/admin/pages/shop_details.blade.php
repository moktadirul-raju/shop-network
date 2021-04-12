@extends('admin.layouts.app')
@section('title','Shop Details')

@section('content')
<div class="col-md-12">
	@if(isset($shop))
		<div class="tile">
			<div class="tile-header">
				<h5 style="float: left;">Details</h5>
				<a style="float: right;" href="{{ route('admin.approve-reject',['shop'=>$shop->id,'status'=>1]) }}" class="btn btn-success btn-sm">
				<i class="fa fa-check"></i>Approve</a>
				<a style="float: right;" href="{{ route('admin.approve-reject',['shop'=>$shop->id,'status'=>2]) }}" class="btn btn-danger btn-sm">
					<i class="fa fa-close"></i>
				Reject</a>
			</div>
			<div class="tile-body">
				<table class="table table-bordered table-striped  text-nowrap">
					<thead>
						<tr>
							<th>Current Status</th>
							<th>
								@if($shop->approve_status == 1)
									<button class="btn btn-success btn-sm">Approved</button>
								@elseif($shop->approve_status == 0)	
								<button class="btn btn-warning btn-sm">Pending</button>
								@elseif($shop->approve_status == 2)	
								<button class="btn btn-danger btn-sm">Rejected</button>
								@endif
							</th>
						</tr>
						<th>Review/Comments</th>
						<th>
							<a href="{{ route('admin.review',$shop->id) }}" class="btn btn-info btn-sm">Reviews</a>
							<a href="{{ route('admin.comments',$shop->id) }}" class="btn btn-primary btn-sm">Comments</a>
						</th>
						<tr>
							<th>User</th>
							<th>{{ $shop->user->name }}</th>
						</tr>
						<tr>
							<th>Category</th>
							<th>{{ $shop->category->category }}</th>
						</tr>
						<tr>
							<th>Facilities</th>
							<th>
								@foreach($shop->facilities as $facility)
									<span style="border: 1px solid green;border-radius: 40px;padding:5px;margin-left: 5px;">
										{{ $facility->facility_name }}
									</span>
								@endforeach
							</th>
						</tr>
						<tr>
							<th>Title</th>
							<th>{{ $shop->title }}</th>
						</tr>
						<tr>
							<th>Established Date</th>
							<th>{{ $shop->established_date }}</th>
						</tr>
						<tr>
							<th>Country</th>
							<th>
								{{ $shop->country_id != null ? $shop->country->country: '' }}</th>
						</tr>
						<tr>
							<th>City</th>
							<th>{{ $shop->city != null ? $shop->city: '' }}</th>
						</tr>
						<tr>
							<th>Street Address</th>
							<th>{{ $shop->street_address != null ? $shop->street_address : '' }}</th>
						</tr>
						<tr>
							<th>Additional Address</th>
							<th>{{ $shop->additional_address != null ? $shop->additional_address : '' }}</th>
						</tr>
						<tr>
							<th>Zip Code</th>
							<th>{{ $shop->zip_code != null ? $shop->zip_code : '' }}</th>
						</tr>
						<tr>
							<th>Phone</th>
							<th>{{ $shop->phone }}</th>
						</tr>
						<tr>
							<th>Fax</th>
							<th>{{ $shop->fax }}</th>
						</tr>
						<tr>
							<th>Email</th>
							<th>{{ $shop->email }}</th>
						</tr>
						<tr>
							<th>Website</th>
							<th>{{ $shop->website }}</th>
						</tr>
						<tr>
							<th>Facebook Link</th>
							<th>{{ $shop->facebook_link != null? $shop->facebook_link : '' }}</th>
						</tr>
						<tr>
							<th>Twitter Link</th>
							<th>{{ $shop->twitter_link != null? $shop->twitter_link : '' }}</th>
						</tr>
						<tr>
							<th>Instagram Link</th>
							<th>{{ $shop->instagram_link != null? $shop->instagram_link : '' }}</th>
						</tr>
						<tr>
							<th>Linkedin Link</th>
							<th>{{ $shop->linkedin_link != null? $shop->linkedin_link : '' }}</th>
						</tr>
						<tr>
							<th>Youtube Link</th>
							<th>{{ $shop->youtube_link != null? $shop->youtube_link : '' }}</th>
						</tr>
						<tr>
							<th>Description</th>
							<th>{{ $shop->description }}</th>
						</tr>
						<tr>
							<th>Minimum Price</th>
							<th>{{ $shop->min_price }}</th>
						</tr>
						<tr>
							<th>Maximum Price</th>
							<th>{{ $shop->max_price }}</th>
						</tr>
						<tr>
							<th>Discount</th>
							<th>{{ $shop->discount }}</th>
						</tr>
						<tr>
							<th>Discount Link</th>
							<th>
								{{ $shop->discount_qrcode_link != null ? $shop->discount_qrcode_link : '' }}
							</th>
						</tr>
						<tr>
							<th>Discount Code</th>
							<th>
								<img src="{{ asset($shop->discount_qrcode_image) }}" class="img-responsive" alt="Image">
							</th>
						</tr>
						<tr>
							<th>Saturday</th>
							<th>
								@if(sizeof($shop->saturday)>0)
								{{ $shop->saturday[0]->opening_status }},
								{{ $shop->saturday[0]->opening_time }}-
								{{ $shop->saturday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Sunday</th>
							<th>
								@if(sizeof($shop->sunday)>0)
								{{ $shop->sunday[0]->opening_status }},
								{{ $shop->sunday[0]->opening_time }}-
								{{ $shop->sunday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Monday</th>
							<th>
								@if(sizeof($shop->monday)>0)
								{{ $shop->monday[0]->opening_status }},
								{{ $shop->monday[0]->opening_time }}-
								{{ $shop->monday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Tuesday</th>
							<th>
								@if(sizeof($shop->tuesday)>0)
								{{ $shop->tuesday[0]->opening_status }},
								{{ $shop->tuesday[0]->opening_time }}-
								{{ $shop->tuesday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Wednesday</th>
							<th>
								@if(sizeof($shop->wednesday)>0)
								{{ $shop->wednesday[0]->opening_status }},
								{{ $shop->wednesday[0]->opening_time }}-
								{{ $shop->wednesday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Thursday</th>
							<th>
								@if(sizeof($shop->thursday)>0)
								{{ $shop->thursday[0]->opening_status }},
								{{ $shop->thursday[0]->opening_time }}-
								{{ $shop->thursday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
						<tr>
							<th>Friday</th>
							<th>
								@if(sizeof($shop->friday)>0)
								{{ $shop->friday[0]->opening_status }},
								{{ $shop->friday[0]->opening_time }}-
								{{ $shop->friday[0]->closing_time }}
								@else
								{{ '' }}
								@endif
							</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	@else
		<div class="alert alert-danger">
			<p>No Shop Found:)</p>
		</div>
	@endif
</div>
@endsection