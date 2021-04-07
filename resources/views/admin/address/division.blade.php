@extends('admin.layouts.app')
@section('title', 'Division Page')
@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="tile-header">
            <h5 style="float: left;">Divisions</h5>
            <span style="float: right;">
                 @if(isset($division))
         <form action="{{ route('admin.division.update',$division->id) }}" method="POST" class="form-inline">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <input type="test" name="english_name" class="form-control" value="{{ $division->english_name }}">
            <input type="test" name="bangla_name" class="form-control" value="{{ $division->bangla_name }}">
        </div>
        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
    </form>
    @else
        <form action="{{ route('admin.division.store') }}" method="POST" class="form-inline text-right">
            @csrf
            <div class="form-group mb-2">
                <input type="test" name="english_name" class="form-control" placeholder="English Name">
                <input type="test" name="bangla_name" class="form-control" placeholder="Bangla Name">
            </div>
            &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Add New</button>
        </form>
    @endif
            </span>
        </div>
        <div class="tile-body">
       <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>English Name</th>
                <th>Bangla Name</th>
                <th>District</th>
                <th>View District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisions as $division)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $division->english_name }}</td>
                <td>{{ $division->bangla_name }}</td>
                
                
                <td>
                    {{ $division->districts->count() }}
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.division.show',$division->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.division.edit',$division->id) }}" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $division->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $division->id }}" action="{{ route('admin.division.destroy',$division->id) }}" method="POST" style="display: none;">
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

