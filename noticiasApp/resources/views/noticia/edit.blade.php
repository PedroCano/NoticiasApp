@extends('noticia.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar noticia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('noticia.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your fields.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{ route('noticia.update',$noticia->id) }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" value="{{ $noticia->titulo }}" placeholder="Enter Topic" name ="titulo">
  </div>
  <div class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" rows="3" name="texto">{{ $noticia->texto }}</textarea>
  </div>
  <div class="form-group">
    <label for="autor">Autor</label>
    <input type="text" class="form-control" value="{{ $noticia->autor }}" placeholder="Enter Categorie" name ="autor">
  </div>
  <div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" value="{{ $noticia->fecha }}" placeholder="Enter Categorie" name ="fecha">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection