@extends('admin.layouts.app')
@section('title','All User')
@section('page-title','All User')

@push('css')

@endpush

@section('content')
<div class="col-md-12">
  <div class="tile">
    <div class="tile-body">
      <div class="table-responsive">
      	<table class="table table-hover table-bordered text-nowrap" id="usersTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
          </tr>
          <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
    <script type="text/javascript">$('#usersTable').DataTable();</script>
@endpush