@extends('layouts.login')

@section('log')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0 ">
        <div class="col-lg-4 mx-auto shadow">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo text-center">
              <img src="../../assets/images/logongadu.png" style="width: 100px;" alt="logo">
            </div>
            <h4>Selamat Datang!</h4>
            <h6 class="font-weight-light">Masuk Untuk Melanjukan</h6>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                    <input style="border-radius: 10px" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input style="border-radius: 10px" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3 offset-md-1">
                        <div class="form-check-label text-muted">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>

                <div class="row ">
                    <button type="submit" class="w-100 btn" style="background-color: #6096B4; color: white;">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
@endsection