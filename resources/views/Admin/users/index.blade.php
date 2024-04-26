@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content_header')
    <h1>Meus Usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">novo usuário</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                            @if ($loggedUser->id !=  $user->id)
                                
                           
                            <form method="POST" class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                onsubmit="return confirm('Realmente deseja exluir esse usuário?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                            @endif
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{-- {{ $users->links()}} --}}
@endsection
