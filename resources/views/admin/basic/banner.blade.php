@extends('admin.layouts.app')
@section('title','Banner')

@push('css')

@endpush

@section('content')

<div class="col-md-12" style="margin-top: 10px;">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">All Banners</h5>
			<a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="float: right;">
				<i class="fa fa-plus"></i>
				Add New
			</a>
			<div class="modal fade" id="modal-id">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">New Banner</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							
						</div>
						<form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label for="">Banner Title</label>
									<input type="text" name="title" class="form-control" placeholder="Banner Title">
								</div>
								<div class="form-group">
									<label for="">Banner</label>
									<input type="file" name="image" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="tile-body">

			<table class="table table-bordered table-striped text-nowrap text-sm-center mt-5">
		        <thead>
			        <tr>
				    <th>Sl.no</th>
				     <th>Title</th>
				     <th>Banner</th>
				     <th>Action</th>
			        </tr>
		</thead>
		<tbody>
			@foreach($banners as $banner)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $banner->title }}</td>
				<td>
					<img src="{{ asset('images/banner/'.$banner->image) }}" class="img-responsive" alt="Image" style="height: 100px;width: 100px;">
				</td>
				<td>
					<a class="btn btn-success" data-toggle="modal" href='#edit-banner{{ $banner->id }}'>
						<i class="fa fa-edit"></i>
					</a>
					<div class="modal fade" id="edit-banner{{ $banner->id }}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Update Banner</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
								</div>
								<form action="{{ route('admin.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="modal-body text-left">
										<div class="form-group">
											<label for="">Banner Title</label>
											<input type="text" name="title" class="form-control" value="{{ $banner->title }}">
										</div>
										
										<div class="form-group">
											<label for="">Image</label>
											<input type="file" name="image" class="form-control">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $banner->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $banner->id }}" action="{{ route('admin.banner.destroy',$banner->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{{ $banners->links() }}

		</div>
	</div>
</div>
@endsection

@push('js')
<script>
   function deleteItem(id) {
      swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
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
              document.getElementById('delete-form-'+id).submit();
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