@extends('plantilla.inicio')

@section('title')
    Actualizar Usuario
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
    @endif
    <form class="row g-3 needs-validation" novalidate action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="validationCustom01" name="name" value="{{ old('name', $user->name) }}">
            <div class="invalid-feedback">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control @error('ap_paterno') is-invalid @enderror" 
                   id="validationCustom02" name="ap_paterno" value="{{ old('ap_paterno', $user->ap_paterno) }}" required>
            <div class="invalid-feedback">
                @error('ap_paterno')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control @error('ap_materno') is-invalid @enderror" 
                   id="validationCustom03" name="ap_materno" value="{{ old('ap_materno', $user->ap_materno) }}">
            <div class="invalid-feedback">
                @error('ap_materno')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Teléfono</label>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                    id="validationCustom04" name="telefono" value="{{ old('telefono', $user->telefono) }}">
            <div class="invalid-feedback">
                @error('telefono')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Correo</label>
            <input type="text" class="form-control @error('correo') is-invalid @enderror" 
                    id="validationCustom05" name="correo" value="{{ old('correo', $user->correo) }}">
            <div class="invalid-feedback">
                @error('correo')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-success" type="submit">Actualizar Usuario</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
