@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo-dark.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="firstname" placeholder="firstname">
                  @error('firstname')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="lastname">
                  @error('lastname')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                  @error('email')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                  @error('password')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="confirm" placeholder="Password">
                  @error('confirm')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="file" class="form-control form-control-lg" id="exampleInputPassword1" name="image">
                  @error('image')
                  <p>{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <input type="submit" class="btn btn-primary" value="submit">
                                    
   
                  </div>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@endsection
