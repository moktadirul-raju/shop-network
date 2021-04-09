@extends('admin.layouts.app')
@section('title','Paypal Info')

@section('content')
<div class="col-md-12">
	<div class="tile">
		<div class="tile-header">
            <h2>Paypal Information</h2>
		</div>
		<div class="tile-body">
			<form action="{{ route('admin.paypal-info-update') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					      <label for="">Paypal Environment</label>
					      <input type="text" name="environment" value="{{ $paypalInfo->environment }}" class="form-control">
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					      <label for="">Paypal Public Key</label>
					      <input type="text" name="public_key" value="{{ $paypalInfo->public_key }}" 
					          class="form-control">
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					        <label for="">Paypal Merchant ID</label>
					        <input type="text" name="merchant_id" value="{{ $paypalInfo->merchant_id }}" 
					        class="form-control">
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					        <label for="">Paypal Private Key</label>
					        <input type="text" name="private_key" value="{{ $paypalInfo->private_key }}" 
					        class="form-control">
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">
								Is Paypal Enabled?
                            </label>
                            <select name="paypal_enabled" id="" class="form-control">
                            	<option value="{{ $paypalInfo->paypal_enabled }}">{{ $paypalInfo->paypal_enabled == 'yes'? 'Yes' : 'No' }}</option>
                            	@if($paypalInfo->paypal_enabled == 'yes')
                            	    <option value="no">No</option>
                            	@elseif(($paypalInfo->paypal_enabled == 'no'))
                            	    <option value="yes">Yes</option>
                            	@endif
                            </select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for=""></label>
							<button type="submit" class="btn btn-info btn-block">Update</button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection