@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content_header')
    <h1>Minhas Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">nova pagina</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
                @foreach ($pages as $page)
                    <tr>
                        <th>{{ $page->id }}</th>
                        <th>{{ $page->title }}</th>
                        <th style="width: 250px">
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-info">Editar</a>
                            <a href="{{route('pages', $page->slug)}}" class="btn btn-sm btn-success">ver página</a>
                           
                            <form method="POST" class="d-inline" action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                onsubmit="return confirm('Realmente deseja exluir esse usuário?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
    
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{-- {{ $users->links()}} --}}
@endsection
