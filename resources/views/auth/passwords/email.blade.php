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
                    @if (session('status'))
                        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <h4 class="mb-3 f-w-400 font-weight-bold h5 text-verde text-center">Restablecer Constraseña</h4>

                        <div class="form-group mb-3">
                            <label for="email" class="floating-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn w-100 btn-primary mb-4 rounded">Restablecer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
