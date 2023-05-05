@extends('layouts.public.app')

@section('title')
    Confirmar Contraseña
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-5">
            <div class="card">

                <div class="card-body p-5">
                    <h4 class="mb-3 f-w-400 font-weight-bold h5 text-verde text-center">Por favor confirme su contraseña antes de continuar</h4>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="password" class="floating-label">Contraseña <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn w-100 btn-primary mb-4 rounded">Confirmar Contraseña</button>

                        <div class="text-center">
                            <p class="mb-2 text-muted">
                                ¿Olvidó su contraseña? <a href="{{ route('password.request') }}" class="fw-bold">Reiniciar</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
