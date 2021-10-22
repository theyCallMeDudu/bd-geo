<?php

namespace App\Http\Controllers;

use App\Continente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContinenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $continentes = Continente::orderBy('nome')->paginate(5);

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
        $regras = [
            'nome' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);
        
        $continente = new Continente;

        $continente->nome = $request->nome;

        $nomeContinente = $request->nome;

        // Verifica se continente já existe para não inserir repetido
        if (DB::table('continentes')->where('nome', '=', $nomeContinente)->get()->count()) {
            return redirect()->back()->with('msg-warning', 'Continente já cadastrado!');
        } else {
            //dd(DB::table('continentes')->where('nome', '=', $nomeContinente)->get()->count());
            $continente->save();
        }
        

        return redirect('/continente/index')->with('msg', 'Continente cadastrado com sucesso!');
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
        $regras = [
            'nome' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);
        
        $data = $request->all();

        Continente::find($request->id)->update($data);

        return redirect('/continente/index')->with('msg', 'Continente atualizado com sucesso!');
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

        return redirect('/continente/index')->with('msg', 'Continente excluído com sucesso!');
    }
}
