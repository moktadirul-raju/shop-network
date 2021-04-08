@extends('admin.layouts.app')
@section('title',$shop->title)

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">Details</h5>
			<a style="float: right;" href="{{ route('admin.approve-reject',['shop'=>$shop->id,'status'=>1]) }}" class="btn btn-success">
			<i class="fa fa-check"></i>Approve</a>
			<a style="float: right;" href="{{ route('admin.approve-reject',['shop'=>$shop->id,'status'=>2]) }}" class="btn btn-danger">
				<i class="fa fa-close"></i>
			Reject</a>&npsp;
		</div>
		<div class="tile-body">
			<table class="table table-bordered table-striped  text-nowrap">
				<thead>
					<tr>
						<th>Current Status</th>
						<th>
							@if($shop->approve_status == 1)
								<button class="btn btn-success">Approved</button>
							@elseif($shop->approve_status == 0)	
							<button class="btn btn-warning">Pending</button>
							@endif
						</th>
					</tr>
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
						<th>Division</th>
						<th>{{ $shop->division_id != null ? $shop->division->english_name : '' }}</th>
					</tr>
					<tr>
						<th>District</th>
						<th>{{ $shop->district_id != null ? $shop->district->english_name : '' }}</th>
					</tr>
					<tr>
						<th>Upazila</th>
						<th>{{ $shop->upazila_id != null ? $shop->upazila->english_name : '' }}</th>
					</tr>
					<tr>
						<th>Address</th>
						<th>{{ $shop->address }}</th>
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
						<th>Discount Code</th>
						<th>
							<img src="{{ asset($shop->discount_qrcode) }}" class="img-responsive" alt="Image">
						</th>
					</tr>

				</thead>
			</table>
		</div>
	</div>
</div>
@endsection