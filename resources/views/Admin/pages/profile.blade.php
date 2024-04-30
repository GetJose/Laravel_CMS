@extends('adminlte::page')

@section('title', 'editar Usuarios')
@section('content_header')
    <h1>Editar Perfil </h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <h5>
                <i class="icon fas fa-ban"></i>
                Ocorreu um erro!
            </h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('profile-action') }}" class="form-horizontal">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label @error('name')  is-invalid  @enderror">Nome
                        Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value='{{ $user->name }}'class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email"
                        class="col-sm-2 col-form-label @error('email')  is-invalid  @enderror">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value='{{ $user->email }}' class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label @error('password')  is-invalid  @enderror">Sua
                        Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirma"
                        class="col-sm-2 col-form-label @error('password')  is-invalid  @enderror">Confirme sua Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
{{-- @extends('adminlte::page')

@section('title', 'Perfil')
@section('content_header')
    <h1> Perfil
    </h1>
@endsection

@section('content')
    <div class="card card-primary card-outline" style="width: 400px; margin:auto">

        <div class="card-body box-profile">
            <h2 class="text-center">Nome:</h2>
            <h3 class="profile-username text-center">{{ $loggedUser->name }}</h3>
            <br>
            <hr>
            <h2 class="text-center">E-mail:</h2>
            <h4 class="text-center">{{ $loggedUser->email }}</h4>
            <br>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>

    </div>

@endsection --}}
