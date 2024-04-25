@extends('adminlte::page')

@section('title', 'editar Usuarios')
@section('content_header')
    <h1>Editar Usuário </h1>
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
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name"  class="col-sm-2 col-form-label @error('name')  is-invalid  @enderror">Nome
                        Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value='{{$user->name}}'class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email"
                        class="col-sm-2 col-form-label @error('email')  is-invalid  @enderror">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value='{{$user->email}}' class="form-control">
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
