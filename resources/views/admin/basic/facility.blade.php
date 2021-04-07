@extends('admin.layouts.app')
@section('title','Facility')

@push('css')

@endpush

@section('content')

<div class="col-md-12" style="margin-top: 10px;">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">All Facilities</h5>
			<a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="float: right;">
				<i class="fa fa-plus"></i>
				Add New
			</a>
			<div class="modal fade" id="modal-id">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">New Facility</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							
						</div>
						<form action="{{ route('admin.facility.store') }}" method="POST">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label for="">Facility Name</label>
									<input type="text" name="facility_name" class="form-control" placeholder="Facility Name">
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

			<table class="table table-bordered table-striped text-nowrap text-center mt-5 text-xsmall">
		        <thead>
			        <tr>
				    <th>Sl.no</th>
				     <th>Facility Name</th>
				     <th>Action</th>
			        </tr>
		</thead>
		<tbody>
			@foreach($facilites as $facility)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $facility->facility_name }}</td>
				<td>
					<a class="btn btn-success" data-toggle="modal" href='#edit-facility{{ $facility->id }}'>
						<i class="fa fa-edit"></i>
					</a>
					<div class="modal fade" id="edit-facility{{ $facility->id }}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Update Facility</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
								</div>
								<form action="{{ route('admin.facility.update',$facility->id) }}" method="POST">
									@csrf
									@method('PUT')
									<div class="modal-body text-left">
										<div class="form-group">
											<label for="">Facility Name</label>
											<input type="text" name="facility_name" class="form-control" value="{{ $facility->facility_name }}">
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
					<button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $facility->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $facility->id }}" action="{{ route('admin.facility.destroy',$facility->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
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