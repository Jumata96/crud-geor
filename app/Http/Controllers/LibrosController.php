<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libro;
use App\Models\Biblioteca;
use PhpParser\Node\Stmt\Foreach_;
use PhpParser\Node\Stmt\Return_;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $array =[];
         $libros = libro::orderBy('id', 'desc')->get();  
         foreach ($libros as   $libro) {
            $biblio=null;
           $biblio= Biblioteca::where('id',$libro->idBiblioteca)->get(); 
                   array_push($array,[ 
                     'id'        =>$libro->id,
                     'nombre'    => $libro->nombre,
                     'edicion'      => $libro->edicion,
                     'biblioteca'    =>$biblio[0]->nombre
                ]); 

            //dd($array);
         }
          return response()->json($array); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request,"llego");
        if (!$request->ajax()) return redirect('/'); 
        $libro = new libro();
        $libro->idBiblioteca=$request->idBiblioteca;
        $libro->nombre=$request->nombre;
        $libro->edicion=$request->descripcion;
        $libro->save();
        return true;


   


      


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
 
        if (!$request->ajax()) return redirect('/');
        $libro = libro::findOrFail($request->id);
        $libro->idBiblioteca=$request->idBiblioteca;
        $libro->nombre=$request->nombre;
        $libro->edicion=$request->descripcion;
        $libro->save(); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $libro = libro::find($request->id); 
        $libro->delete(); 
    }
    public function libro($id)
    {
        //
        $libro = libro::find($id); 

       // dd($libro->idBiblioteca); 

        $array =[];
         $libros = libro::orderBy('id', 'desc')->get();   
            $biblio=null;
           $biblio= Biblioteca::where('id',$libro->idBiblioteca)->get(); 
           $biblionot= Biblioteca::all(); 

           //dd($biblionot,$biblio);
                   array_push($array,[ 
                     'id'        =>$libro->id,
                     'nombre'    => $libro->nombre,
                     'edicion'      => $libro->edicion,
                     'biblioteca'    =>$biblio[0]->id,
                     'blibliotecas' =>$biblionot
                ]);  
          return response()->json($array); 
       // dd($libro,$id);
       // $libro->delete(); 
    }
}
