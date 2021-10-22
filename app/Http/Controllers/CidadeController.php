<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Pais;
use App\CidadePostal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::orderBy('nome')->paginate(5);

        
        return view('cidade.index', compact('cidades'));
    }
    
    public function create()
    {
        $paises = Pais::all();
        
        return view('cidade.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'pais' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);

        $cidade = new Cidade;

        $cidade->nome = $request->nome;
        $cidade->area = $request->area;
        $cidade->fundacao = $request->fundacao;
        $cidade->fk_pais_id = $request->pais;

        $nomeCidade = $request->nome;

        // Verifica se cidade já existe para não inserir repetido
        if (DB::table('cidades')->where('nome', '=', $nomeCidade)->get()->count()) {
            return redirect()->back()->with('msg-warning', 'Cidade já cadastrada!');
        } else {
            //dd(DB::table('continentes')->where('nome', '=', $nomeContinente)->get()->count());
            $cidade->save();
        }



        // Upload de imagem
        if ($request->hasFile('image')) {
            $postal = $this->uploadPostal($request);

            CidadePostal::create([
                'nome' => $postal,
                'fk_cidade_id' => $cidade->id
            ]);
        }

        return redirect('/cidade/index')->with('msg', 'Cidade cadastrada com sucesso!');
    }

    public function uploadPostal(Request $request) {
        $postal = $request->file('image');

        $uploadPostal = $postal->store('postais', 'public');

        return $uploadPostal;
    }

    public function removePostal(Request $request) {
        $postal = $request->get('imagemPostal');

        // Remover imagem da pasta
        if (Storage::disk('public')->exists('postal')) {
            Storage::disk('public')->delete('postal');
        }

        // Remover imagem do banco
        $deletarImagem = CidadePostal::where('nome', $postal);
        $deletarImagem->delete();

        return redirect('/cidade/index')->with('msg', 'Cartão postal removido com sucesso!');
    }

    public function show($id)
    {
        $cidade = Cidade::find($id);
        $fundacaoFormatada = date('d/m/Y', strtotime($cidade->fundacao));

        return view('cidade.show', compact('cidade', 'fundacaoFormatada'));
    }

    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $paises = Pais::all();

        return view('cidade.edit', compact('cidade', 'paises'));
    }

    public function update(Request $request)
    {
        $regras = [
            'nome' => 'required',
            //'pais' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório'
        ];

        $request->validate($regras, $feedback);

        $data = $request->all();

        // Upload de imagem
        if ($request->hasFile('image')) {
            $postal = $this->uploadPostal($request);

            CidadePostal::create([
                'nome' => $postal,
                'fk_cidade_id' => $request->id
            ]);
        }

        Cidade::find($request->id)->update($data);

        return redirect('/cidade/index')->with('msg', 'Cidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Cidade::find($id)->delete();

        return redirect('/cidade/index')->with('msg', 'Cidade excluída com sucesso!');
    }
}
