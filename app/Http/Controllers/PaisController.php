<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Continente;
use App\PaisBandeira;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::orderBy('nome')->paginate(5);

        return view('pais.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continentes = Continente::all();

        return view('pais.create', compact('continentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação de campos obrigatórios
        $regras = [
            'nome' => 'required',
            'continente' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);
        // Validação de campos obrigatórios

        $pais = new Pais;
        $pais->nome = $request->nome;
        $pais->fk_continente_id = $request->continente;
        $pais->capital = $request->capital;
        
        if($pais->area != ''){
            $pais->area = str_replace(",", ".", $request->area);
        }


        $nomePais = $request->nome;

        // Verifica se país já existe para não inserir repetido
        if (DB::table('pais')->where('nome', '=', $nomePais)->get()->count()) {
            return redirect()->back()->with('msg-warning', 'País já cadastrado!');
        } else {
            //dd(DB::table('pais')->where('nome', '=', $nomePais)->get()->count());
            $pais->save();
        }


        // Upload de imagem
        if ($request->hasFile('image')) {
            $bandeira = $this->uploadBandeira($request);

            PaisBandeira::create([
                'nome' => $bandeira,
                'fk_pais_id' => $pais->id
            ]);
        }

        return redirect('/pais/index')->with('msg', 'País cadastrado com sucesso!');
    }

    public function uploadBandeira(Request $request) {
        $bandeira  = $request->file('image');

        $uploadBandeira = $bandeira->store('bandeiras', 'public');

        return $uploadBandeira;
    }

    public function removeBandeira(Request $request) {

        $bandeira = $request->get('imagemBandeira');

        // Remover imagem da pasta
        if (Storage::disk('public')->exists($bandeira)) {
            Storage::disk('public')->delete($bandeira);
        }

        // Remover imagem do banco
        $deletarImagem = PaisBandeira::where('nome', $bandeira);
        $deletarImagem->delete();

        return redirect('/pais/index')->with('msg', 'Bandeira removida com sucesso!');
    }

    public function show($id)
    {
        $pais = Pais::find($id);

        return view('pais.show', compact('pais'));
    }

    public function edit($id)
    {
        $pais = Pais::find($id);
        $continentes = Continente::all();

        return view('pais.edit', compact('pais', 'continentes'));
    }

    public function update(Request $request)
    {
        $regras = [
            'nome' => 'required',
            //'continente' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);

        $data = $request->all();

        // Upload de imagem
        if ($request->hasFile('image')) {
            $bandeira = $this->uploadBandeira($request);

            PaisBandeira::create([
                'nome' => $bandeira,
                'fk_pais_id' => $request->id
            ]);
        }

        Pais::find($request->id)->update($data);

        return redirect('/pais/index')->with('msg', 'País atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Pais::find($id)->delete();

        return redirect('/pais/index')->with('msg', 'País excluído com sucesso!');
    }
}
