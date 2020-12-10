<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = DB::table('comentarios')->paginate(5);

        return view('comentario.index', ['comentarios' => $comentarios]);
    }
    
    public function create()
    {
        return view('comentario.create');
    }
    
    public function store(Request $request)
    {
        try{
            $comentario = new Comentario();
            
            $request->validate([
                'correo' => 'required',
            ]);  
            
            $comentario->idNoticia = $request->idNoticia;
            $comentario->texto = $request->texto;
            $comentario->fecha = Carbon::now()->toDateString();
            $comentario->correo = $request->correo;
            
            $comentario->save();
    
            return back()->with('success','comentario creado!');
        }catch(\Exception $e){
            dd($e);
        }
    }
    
    public function show(comentario $comentario)
    {
        return view('comentario.show',compact('comentario'));
    }
    
    public function edit(comentario $comentario)
    {
        return view('comentario.edit',compact('comentario'));
    }
    
    public function update(Request $request, comentario $comentario)
    {
        
    }
    
    public function destroy(comentario $comentario)
    {
        $comentario->delete();
  
        return redirect()->route('comentario.index')
                        ->with('success','comentario borrada!');
    }
}
