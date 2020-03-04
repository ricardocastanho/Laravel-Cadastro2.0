<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria2;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria2::all();
        return view('categorias', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novacategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cats = new Categoria2();
        $cats->nome = $request->input('nomeCategoria');
        $cats->save();
        return redirect('/categorias');
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
        $cats = Categoria2::find($id);
        if(isset($cats)){
            return view('editarcategoria', compact('cats'));
        }
        return redirect('/categorias');
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
        $cats = Categoria2::find($id);
        if(isset($cats)){
            $cats->nome = $request->input('nomeCategoria');
            $cats->save();
        }
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Categoria2::find($id);
        if(isset($cats)){
            $cats->delete();
        }
        return redirect('/categorias');
    }
    public function indexJson()
    {
        $cats = Categoria2::all();
        return json_encode($cats);
    }
}
