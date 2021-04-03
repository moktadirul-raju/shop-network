@extends('layouts.app')
@section('title', 'Union Page')
@push('css')

@endpush

@section('content')
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Unions ( {{ $unions->count() }})</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    @include('admin.menus')
                </div>
            </div>
            <div class="col-md-9">
                @if(Session::has('message'))
                    <p class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</p>
                @endif
                 @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-left nowrap">
                            <th>Serial No.</th>
                            <th>Upazila Name</th>
                            <th>English Name</th>
                            <th>Bangla Name</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unions as $union)
                        <tr class="text-left nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $union->upazila->english_name }}</td>
                            <td>{{ $union->english_name }}</td>
                            <td>{{ $union->bangla_name }}</td>
                            <td>{{ $union->url }}</td>
                            <td>
                                <a href="{{ route('admin.union.edit',$union->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="takePermission()" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></a>
                                 <form action="{{ route('admin.union.destroy',$union->id) }}" method="POST" id="upazila-delete">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $unions->links() }} --}}
            </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

@endsection

@push('js')
<script>
    function takePermission(){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
        document.getElementById('upazila-delete').submit();
    }

    function getDistrict() {
        $('#district').find('option').remove().end().append('<option value="">Select District</option>');
        var id = document.getElementById('division').value;
        axios.get(`/api/districts/${id}`)
            .then(function (response) {
                var list = response.data.data;
                var select = document.getElementById("district");
                for (i = 0; i < list.length; i++) {
                    var el = document.createElement("option");
                    var districts = list[i];
                    var districtName = districts.english_name;
                    var districtId = districts.id;
                    el.textContent = districtName;
                    el.value = districtId;
                    select.appendChild(el);
                }
            });
    }
    function getUpazila() {
        $('#thana').find('option').remove().end().append('<option value="">Select Thana</option>');
        var id = document.getElementById('district').value;
        axios.get(`/api/upazilas/${id}`)
            .then(function (response) {
                var list = response.data.data;
                var select = document.getElementById("thana");
                for (i = 0; i < list.length; i++) {
                    var el = document.createElement("option");
                    var thanas = list[i];
                    var thanaName = thanas.THANA_NAME;
                    var thanaId = thanas.THANA_ID;
                    el.textContent = thanaName;
                    el.value = thanaId;
                    select.appendChild(el);
                }
            });
    }

</script>
@endpush

