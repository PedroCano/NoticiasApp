@extends('noticia.layout')
@section('content')
      <div class="noticias">
    @foreach ($noticias as $noticia)
          <h1>{{ $noticia->titulo }}</h1>
          <p>{{ $noticia->texto }}</p>
          <label>{{ $noticia->autor }}</label>
          <label>{{ $noticia->fecha }}</label>
          <br><br>
          <form action="{{ route('noticia.destroy',$noticia->id) }}" method="POST">
            
            <a class="btn btn-info" href="{{ route('noticia.show',$noticia->id) }}">Show</a>
            
            <a class="btn btn-primary" href="{{ route('noticia.edit',$noticia->id) }}">Edit</a>

            @csrf
            @method('DELETE')
    
            <button type="submit" class="btn btn-danger">Delete</button>
            <br><br><br><br>
            </form>
          </td>
        </tr>
    @endforeach
      </div>
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('noticia.create') }}">Crear nueva noticia</a>
                </div>
            </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection