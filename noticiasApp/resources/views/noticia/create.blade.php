@extends('noticia.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear noticia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('noticia.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your fields<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('noticia.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control"  placeholder="Titulo" name ="titulo">
  </div>
  <div class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" rows="3"placeholer ="Texto" name="texto"></textarea>
  </div>
  <div class="form-group">
    <label for="autor">Autor</label>
    <input type="text" class="form-control"  placeholder="Autor" name ="autor">
  </div>
  <div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" class="form-control"  placeholder="Fecha" name ="fecha">
  </div>
  <button type="submit" class="btn btn-primary">CREAR</button>
</form>

@endsection