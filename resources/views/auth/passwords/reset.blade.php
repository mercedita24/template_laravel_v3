@extends('layouts.public.app')

@section('title')
    Restablecer Contraseña
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-5">
            <div class="card">

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <h4 class="mb-3 f-w-400 font-weight-bold h5 text-verde text-center">Restablecer Contraseña</h4>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <label for="email" class="floating-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="floating-label">Contraseña <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="floating-label">Confirmar Contraseña <span class="text-danger">*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button class="btn w-100 btn-primary mb-4 rounded">Restablecer Contraseña</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
