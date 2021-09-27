<?php

namespace App\Http\Controllers;

use App\Continente;
use Illuminate\Http\Request;

class ContinenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continentes = Continente::all();

        return view('continente.index', compact('continentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('continente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $continente = new Continente;

        $continente->nome = $request->nome;
        $continente->save();

        return redirect('/continente/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function show(Continente $continente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $continente = Continente::find($id);

        return view('continente.edit', compact('continente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        Continente::find($request->id)->update($data);

        return redirect('/continente/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Continente  $continente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Continente::find($id)->delete();

        return redirect('/continente/index');
    }
}