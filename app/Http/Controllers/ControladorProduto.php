<?php

namespace App\Http\Controllers;

use App\Categoria2;
use Illuminate\Http\Request;
use App\Produto2;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        $cats = Categoria2::all();
        $prod = Produto2::all();
        return view('produtos', compact('prod', 'cats'));
    }

    public function index()
    {
        $prod = Produto2::all();
        return $prod->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('novoproduto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produto2();
        $prod->nome = $request->input('nome');
        $prod->preco = $request->input('preco');
        $prod->estoque = $request->input('estoque');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return json_encode($prod);
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
        $cats = Categoria2::all();
        $prod = Produto2::find($id);
        if(isset($prod)){
            return view('editarproduto', compact('prod', 'cats'));
        }
        return redirect('/produtos');
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
        $prod = Produto2::find($id);
        if(isset($prod)){
            $prod->nome = $request->input('nomeProduto');
            $prod->estoque = $request->input('unidadesEstoque');
            $prod->preco = $request->input('preco');
            $prod->categoria_id = $request->input('categoria');
            $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto2::find($id);
        if(isset($prod)){
            $prod->delete();
        }
        //return redirect('/produtos');
    }
}
