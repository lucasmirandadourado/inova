<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projeto;
use App\Cliente;
use App\Arquiteta;

class ProjetoController extends Controller
{
    public function index()
    {
        $projeto = new Projeto;
        $listaProjeto = $projeto->getListaProjetos(10);
        return view("projeto.index");
    }

    public function create()
    {
        return view("projeto.criar");
    }

    public function store(Request $request)
    {
        $projeto = new Projeto([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'endereco' => $request->get('endereco'),

        ]);
        $projeto->save();

        return redirect('projeto');
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
    public function update(Request $request, $id)
    {
        //
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
    }

    
    public function ajaxProjeto(Request $request)
    {
        $projetos = DB::table('projetos')
        ->join('arquitetas', 'arquitetas.id', '=', 'projetos.arquiteta_id')
        ->join('clientes', 'clientes.id', '=', 'projetos.cliente_id')->get();

        return response()->json($projetos);
    }
}
