@extends('admin.layouts.app')
@section('title','Shop Reviews')

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			<h2>Reviews of {{ $shop->title }}</h2><hr>
		</div>
		<div class="tile-body">
			<table class="table table-bordered table-striped">
				<thead>
					@foreach($shop->reviews as $review)
					    <tr>
					    	<th>{{ $review->user->name }}</th>
					    	<th>
					    		@for($i = 1 ;$i <= $review->rating;$i ++)
                                    <i class="fa fa-star" style="color: orange;"></i>
                                @endfor
					    	</th>
					        <th>{{ $review->review }}</th>
					    </tr>
					@endforeach
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection