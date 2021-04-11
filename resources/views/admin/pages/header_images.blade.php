@extends('admin.layouts.app')
@section('title','Header Images')

@push('css')

@endpush

@section('content')

<div class="col-md-12" style="margin-top: 10px;">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">All Header Imagess</h5>
			<a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="float: right;">
				<i class="fa fa-plus"></i>
				Add New
			</a>
			<div class="modal fade" id="modal-id">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">New Header Images</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							
						</div>
						<form action="{{ route('admin.header-image.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label for="">Header Image</label>
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
				     <th>Header Images</th>
				     <th>Action</th>
			        </tr>
		</thead>
		<tbody>
			@foreach($images as $image)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>
					<img src="{{ asset($image->image) }}" class="img-responsive" alt="Image" style="height: 100px;width: 100px;">
				</td>
				<td>
					<a class="btn btn-success" data-toggle="modal" href='#edit-header-image{{ $image->id }}'>
						<i class="fa fa-edit"></i>
					</a>
					<div class="modal fade" id="edit-header-image{{ $image->id }}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Update Header Image</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
								</div>
								<form action="{{ route('admin.header-image.update',$image->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="modal-body text-left">
										
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
					<button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $image->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $image->id }}" action="{{ route('admin.header-image.destroy',$image->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{{ $images->links() }}

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