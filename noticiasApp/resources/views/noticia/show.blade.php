@extends('noticia.layout')
   
@section('content')
  
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('noticia.index') }}"> Back</a><br><br>
    </div>
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{$noticia->titulo}}</h1><br>
            </div>
        </div>
    </div>

    <div class="form-group">
        <p>
            {{$noticia->texto}}
        </p><br><br><br><br>
        <label>{{$noticia->autor}}</label><br>
        <label>{{$noticia->fecha}}</label>
    </div>
    
    <div class="form-group">
        <form action="{{ route('comentario.store') }}" method="POST" enctype="multipart/form-data" id="formComentarios" onsubmit="return(checkCaptcha())">
        @csrf
            <input type="hidden" name="idNoticia" value="{{ $noticia->id }}"/>
            <h2>Comentario</h2>
            <textarea class="form-control" rows="3" placeholer="Haga un comentario" name="texto" required></textarea><br>
            Correo: <input type="text" name="correo"/><br><br>
            <h5 id="captchaLabel">Resuelve esta cuenta: </h5>
            <input type="number" class="form-control" placeholder="Resultado" name ="resultado" id="captcha"><br>
            <div class="botones">
                <button type="submit">Comentar</button>
            </div>
            
        </form>
    </div>
    
    <div class="form-group">
        @foreach($comentarios as $comentario)
            <textarea class="form-control" rows="3" name="texto" readonly>{{ $comentario->texto }}</textarea><br>
            <input type="text" class="form-control" value="{{ $comentario->correo }}" name ="correo" readonly>
            <input type="text" class="form-control" value="{{ $comentario->fecha }}" name ="fecha" readonly>
        @endforeach
    </div>
    
    <script>
        var n1, n2, resultado;
        var captcha = document.getElementById("captcha");
        var captchaLabel = document.getElementById("captchaLabel");
        
        window.onload = function(){
            n1 = Math.floor((Math.random() * 10));
            n2 = Math.floor((Math.random() * 10));
            resultado = n1 + n2;
            captchaLabel.innerText = '¿Cuánto es ' + n1 + ' + ' + n2 + '?';
        }
        
        var form = document.getElementById("formComentarios");

        form.addEventListener('submit', function(event) {
            event.preventDefault();
        });
        
        function checkCaptcha(){
            if(resultado != captcha.value){
                alert("Mal!");
                return;
            }else{
                form.submit();
            }
        }
    </script>

@endsection