@extends('layouts.app')
@section('title', 'Upazila Page')
@push('css')

@endpush

@section('content')
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Upazila ( {{ $upazilas->count() }})</h2>
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
                @if(isset($upazila))
                    <form action="{{ route('admin.upazila.update',$upazila->id) }}" method="POST" class="form-inline">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <select name="district_id" id="district" class="form-control">
                                <option value="{{ $upazila->district->id }}">{{ $upazila->district->english_name }}</option>
                        </select>
                        <input type="test" name="english_name" class="form-control" value="{{ $upazila->english_name }}">
                        <input type="test" name="bangla_name" class="form-control" value="{{ $upazila->bangla_name }}">
                    </div>
                    &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </form>
                @else
                    <form action="{{ route('admin.upazila.store') }}" method="POST" class="form-inline">
                        @csrf
                        <div class="form-group mb-2">
                            <select name="district_id" id="district" class="form-control">
                                <option value="">Select District</option>
                            </select>
                            <input type="test" name="english_name" class="form-control" placeholder="English Name">
                            <input type="test" name="bangla_name" class="form-control" placeholder="Bangla Name">
                        </div>
                        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Add New</button>
                    </form>
                @endif
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-left nowrap">
                            <th>Serial No.</th>
                            <th>Division Name</th>
                            <th>District Name</th>
                            <th>English Name</th>
                            <th>Bangla Name</th>
                            <th>Website</th>
                            <th>Unions</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($upazilas as $upazila)
                        <tr class="text-left nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $upazila->district->division->english_name }}</td>
                            <td>{{ $upazila->district->english_name }}</td>
                            <td>{{ $upazila->english_name }}</td>
                            <td>{{ $upazila->bangla_name }}</td>
                            <td>{{ $upazila->url }}</td>
                            <td>{{ $upazila->unions->count() }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.upazila.show',$upazila->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.upazila.edit',$upazila->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="takePermission()" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></a>
                                 <form action="{{ route('admin.upazila.destroy',$upazila->id) }}" method="POST" id="upazila-delete">
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
    </section><!-- End About Us Section -->

@endsection

@push('js')
<script>
    function takePermission(){
        confirm('Are you suer');
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

