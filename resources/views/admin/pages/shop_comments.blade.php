@extends('admin.layouts.app')
@section('title','Shop Comments')

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
			<h2>Comments of {{ $shop->title }}</h2>
		</div>
		<div class="tile-body">
			<table class="table table-bordered table-striped">
				<thead>
					@foreach($shop->comments as $comment)
					    <tr>
					    	<th>{{ $comment->user->name }}</th>
					        <th>{{ $comment->comment }}</th>
					    </tr>
					@endforeach
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection