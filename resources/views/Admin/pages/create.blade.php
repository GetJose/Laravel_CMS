 @extends('adminlte::page')

 @section('title', 'Adicionar Paginas')
 @section('content_header')
     <h1>Nova página </h1>
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
             <form method="POST" action="{{ route('pages.store') }}" class="form-horizontal">
                 @csrf
                 <div class="form-group row">
                     <label for="title" class="col-sm-2 col-form-label ">Titulo da página</label>
                     <div class="col-sm-10">
                         <input type="text" name="title" class="form-control">
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="body" class="col-sm-2 col-form-label ">Body</label>
                     <div class="col-sm-10">
                         <textarea name="body" class="form-control" ></textarea>
                    </div>
                </div>
                
            
                    <div class="form-group row">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="cadastrar" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>



@endsection
