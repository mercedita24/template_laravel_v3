@extends('layouts.public.app')

@section('title')
    Login
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-5">
            <div class="card">

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h4 class="mb-3 f-w-400 font-weight-bold h5 text-verde text-center">INICIAR SESIÓN</h4>

                        <div class="form-group mb-3">
                            <label for="email" class="floating-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="floating-label">Contraseña <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <button class="btn w-100 btn-primary mb-4 rounded">Iniciar Sesión</button>

                        <div class="text-center">
                            <p class="mb-2 text-muted">
                                ¿Olvidó su contraseña? <a href="{{ route('password.request') }}" class="fw-bold">Reiniciar</a>
                            </p>
                        </div>
                        <div class="text-center">
                            <p class="mb-2 text-muted">
                                ¿No tiene cuenta? <a href="{{ url('register') }}" class="fw-bold">Registrarse</a>
                            </p>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
