@extends('adminlte::page')

@section('title', 'Configurações')
@section('content_header')
    <h1>Minhas Configurações </h1>
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
            <table class="table table-hover">
                <form action="{{ route('settings.save') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label ">Titulo do site</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" value="{{ $settings['title'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtitle" class="col-sm-2 col-form-label ">Sub-titulo</label>
                        <div class="col-sm-10">
                            <input type="text" name="subtitle" class="form-control" value="{{ $settings['subtitle'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label ">E-mail de
                            contato</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{{ $settings['email'] }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bgcolor" class="col-sm-2 col-form-label ">Cor de
                            fundo</label>
                        <div class="col-sm-10">
                            <input type="color" name="bgcolor" class="form-control" value="{{ $settings['bgcolor'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="textcolor" class="col-sm-2 col-form-label ">Cor da
                            letra</label>
                        <div class="col-sm-10">
                            <input type="color" name="textcolor" class="form-control"
                                value="{{ $settings['textcolor'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </table>
        </div>
    </div>
    {{-- {{ $users->links()}} --}}
@endsection
