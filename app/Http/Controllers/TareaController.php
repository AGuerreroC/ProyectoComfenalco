<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\User;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->middleware('auth');
        $tareas=Tarea::orderBy('id','DESC')->paginate(3);
        return view('tarea.index',compact('tareas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('tarea.create');
        $usuarios = User::all();
        return view('tarea.create',compact('usuarios'));
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
        $this->validate($request,[ 'tarea'=>'required', 'descripcion'=>'required', 'autor'=>'required', 'estado'=>'required', 'usuario'=>'required', 'fechavencimiento'=>'required']);
        Tarea::create($request->all());
        return redirect()->route('tarea.index')->with('success','Registro creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas=Tarea::find($id);
        return  view('tarea.show',compact('tareas'));

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
        $tarea=tarea::find($id);
        $usuarios = User::all();
        return view('tarea.edit',compact('tarea','usuarios'));
       // return view('tarea.edit',compact('usuarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'tarea'=>'required', 'descripcion'=>'required', 'autor'=>'required', 'estado'=>'required','usuario'=>'required', 'fechavencimiento'=>'required']);

        tarea::find($id)->update($request->all());
        return redirect()->route('tarea.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Tarea::find($id)->delete();
        return redirect()->route('tarea.index')->with('success','Registro eliminado satisfactoriamente');
    }


    /**
     * Ejemplo de método REST 
     *
     * @return \Illuminate\Http\Response
     */

    public function getTareas(){
        $tareas=Tarea::all();
        return response()->json($tareas);
    }

    public function getUsuarios(){
        $usuarios=Usuario::all();
        return response()->json($usuarios);
    }
}
