@extends('layouts.app')
@section('title','Registration')
@push('css')
	{{-- expr --}}
@endpush

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Registration</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-3">
            <div class="col-lg-2"></div>
          <div class="col-lg-8 mt-2 mt-lg-0">
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <form method="POST" action="{{ route('user-register') }}" onsubmit="return validate()">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" autofocus>
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input name="confirm_password" id="confirmPassword" type="password" class="form-control @error('confirm_password') is-invalid @enderror" onkeypress="show()">
                    @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p id="message"></p>
                </div>

                <div class="form-group">
                    <span style="float: left">
                        <button type="submit" class="btn btn-primary" style="background: #00ada7;border: 1px solid #00ada7;">
                            {{ __('Registration') }}
                        </button>
                    </span>
                    <span style="float: right">
                        <p>Already have an account ?
                            <a href="{{ route('login') }}">Login here</a>
                        </p>
                    </span>
                </div>
            </form>

          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection

@push('js')
	<script>
        function validate(){
            var name = document.getElementById('name');
            var mobile = document.getElementById('mobile');
            var password = document.getElementById('password');
            var confirmPassword = document.getElementById('confirmPassword');
            var message = document.getElementById('message');
            if(name.value.trim() == ""){
                name.style.border = '1px solid red';
                return false;
            } else if(mobile.value.trim() == ""){
                mobile.style.border = '1px solid red';
                return false;
            } else if(password.value.trim() == ""){
                password.style.border = '1px solid red';
                return false;
            } else if(password.value.length < 6){
                password.style.border = '1px solid red';
                message.innerHTML = "Password should at least 6 character";
                message.style.color = 'red';
                return false;
            } else if(confirmPassword.value.trim() == ""){
                confirmPassword.style.border = '1px solid red';
                return false;
            } else if(password.value != confirmPassword.value){
                confirmPassword.style.border = '1px solid red';
                message.innerHTML = "Password Not Matched";
                message.style.color = 'red';
                return false;
            } else{
                return true;
            }
        }

        function show(){
            var password = document.getElementById('password');
            var confirmPassword = document.getElementById('confirmPassword');
            if(password.value == confirmPassword.value){
                var message = document.getElementById('message');
                message.innerHTML = "Password Matched";
                message.style.color = 'green';
            }
        }

    </script>
@endpush





