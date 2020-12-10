<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Comentario;
use Illuminate\Http\Request;
use DB;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = DB::table('noticias')->paginate(5);

        return view('noticia.index', ['noticias' => $noticias]);
    }
    
    public function create()
    {
        return view('noticia.create');
    }
    
    public function store(Request $request)
    {
        try{
            $noticia = new Noticia();
            
            $request->validate([
                'titulo' => 'required',
                'texto' => 'required',
                'autor' => 'required',
                'fecha' => 'required',
            ]);    
            
            $noticia->titulo = $request->titulo;
            $noticia->texto = $request->texto;
            $noticia->autor = $request->autor;
            $noticia->fecha = $request->fecha;
            
            $noticia->save();
    
            return redirect()->route('noticia.index')
            ->with('success','noticia creada!');
        }catch(\Exception $e){
            dd($e);
        }
    }
    
    public function show($id)
    {
        $comentarios = DB::select('SELECT * FROM `comentarios` WHERE `idNoticia` = ' . $id);
        //dd($comentarios);
        $noticia = Noticia::find($id);
        return view('noticia.show',compact('noticia', 'comentarios'));
    }
    
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        return view('noticia.edit',compact('noticia'));
    }
    
    public function update(Request $request, $id)
    {
        $noticia = Noticia::find($id);
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha' => 'required',
        ]);

        $noticia->update($request->all());
  
        return redirect()->route('noticia.index')
                        ->with('success','noticia editada!');
    }
    
    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
  
        return redirect()->route('noticia.index')
                        ->with('success','noticia borrada!');
    }
}
