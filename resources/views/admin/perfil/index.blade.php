@extends('layouts.admin.index')

@section('title')
    {{ $title = 'Perfil' }}
@endsection

@section('content')
<div class="">
	<div class="container ">
		<a href="{{ url('dashboard') }}" class="btn btn-danger mb-2"><i class="fa fa-arrow-left"></i> Atrás</a>

		<div class="row">
			<div class="col-sm-12 col-md-8">
				<form class="card" method="POST" action="{{ url('perfil/editar') }}">
					@csrf
					<div class="card-header font-weight-bold h4">
						Datos generales
					</div>
					<div class="card-body">
						<div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label  class="floating-label" for="name">Nombre:</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{  old('name') ?? auth()->user()->name ?? '' }}" required>
							{!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
							<label  class="floating-label" for="email">Email:</label>
							<input type="text" name="email" class="form-control" value="{{ old('email') ?? auth()->user()->email ?? '' }}" required id="email">
							{!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
						</div>
                        <div class="form-group  {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <label  class="floating-label" for="phone">Teléfono:</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                value="{{  old('phone') ?? auth()->user()->phone ?? '' }}" required>
							{!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-success">Guardar cambios</button>
					</div>
				</form>
			</div>
            <div class="col-sm-12 col-md-4">
                <form class="card" method="POST" action="{{ url('perfil/editar-pass') }}">
                    @csrf
                    <div class="card-header font-weight-bold h4">
                        Editar Contraseña
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('current_password') ? 'has-error' : ''}}">
                            <label class="floating-label" for="current_password">Contraseña Anterior:</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                            {!! $errors->first('current_password', '<p class="text-danger">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label class="floating-label" for="password">Nueva Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control">
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="password_confirmation">Repetir Nueva Contraseña:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Confirmar</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
<div>
@endsection
