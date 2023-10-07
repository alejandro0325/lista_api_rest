<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(){
        return Estudiante::all();
    }

    public function store (Request $request){
      
        $inputs = $request->input();
        $respuesta = Estudiante::create($inputs);
        return $inputs;
    }

    public function update (Request $request,$id){
      
        $e= Estudiante::find($id);
        if(isset($e)){
            $e -> nombre = $request -> nombre;
            $e -> apellido = $request -> apellido;
            $e -> foto = $request -> foto;
            if ($e->save()){
                return response()->json([
                    "data"=>$e,
                    "mensaje"=>"estudiante actualizado con exito.",
                ]);
            }
            else{
                return response()->json([
                    "error"=>true,
                    "mensaje"=>"no se actualizo el estudiante."
                ]);
            }
        }
        else{
            return response()->json([
                "error"=>true,
                "mensaje"=>"no existe el estudiante.",
            ]);
        }
        return $e;

    }
    public function destroy($id){
        $e = Estudiante::find($id);
        if(isset($e)){
            $res=Estudiante::destroy($id);
            if($res){
            return response()->json([
                "data"=>$e,
                "mensaje"=>"Estudiante eliminado con exito.",
            ]);
            }
        }else{
            return response()->json([
                "error"=>true,
                "mensaje"=>"no existe el estudiante",
            ]);
        }
    }
}
