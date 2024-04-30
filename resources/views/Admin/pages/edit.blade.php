@extends('adminlte::page')

@section('title', 'editar Paginas')
@section('content_header')
    <h1>Editar Página </h1>
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
            <form method="POST" action="{{ route('pages.update', ['page' => $page->id]) }}" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title"  class="col-sm-2 col-form-label">Titulo da página</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value='{{$page->title}}'class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="body" class="col-sm-2 col-form-label ">Body</label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control bodyfield" >{{$page->body}}</textarea>
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

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        heigth:300,
        menubar:false,
        plugins:['link', 'image', 'table', 'autoresize', 'lists'],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alingleft alingcenter alingright alingjustify | table | link image | bullist numlist'
    })
</script> --}}

@endsection
