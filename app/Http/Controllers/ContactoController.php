<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; //importamos los mensajes de sesion


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conctactos =Contacto::all();
        //retornamos la vista index
        return view('contacto.index')->with('contactos',$conctactos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacto.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos los datos que vienen del formulario que
        $request->validate(['nombre'=>'required|min:3','apellido'=>'required|min:3','celular'=>'required|min:9','correo'=>'required|email',"direccion"=>'required|min:5']);
        // return ("guardamos ?");
        // insertamos los datos
        $contacto =Contacto::create($request->only('nombre','apellido','celular','correo','direccion','comentario'));
        //creamos sesion para los mensajes de sesion pero antes importamos arriba
        Session::flash('mensaje', 'Contacto registrado');
        return redirect()->route('contacto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //retornamos al formulario la variable $contacto
        return view('contacto.formulario')->with('contacto', $contacto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //validamos los datos que vienen del formulario que
        $request->validate(['nombre'=>'required|min:3','apellido'=>'required|min:3','celular'=>'required|min:9','correo'=>'required|email',"direccion"=>'required|min:5']);
        // return ("guardamos ?");
        // actualizamos los datos
        // $contacto trae los datos del formulario->campo y por request llenamos los datos en el modelo y con save guardamos
        $contacto->nombre = $request['nombre'];
        $contacto->apellido = $request['apellido'];
        $contacto->celular = $request['celular'];
        $contacto->correo = $request['correo'];
        $contacto->direccion = $request['direccion'];
        $contacto->comentario = $request['comentario'];
        $contacto->save();
        //creamos sesion para los mensajes de sesion pero antes importamos arriba
        Session::flash('mensaje', 'Registrado Actualizado');
        return redirect()->route('contacto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
        $contacto->delete();
        Session::flash('mensaje', 'Registrado eliminado');
        return redirect()->route('contacto.index');
    }
}