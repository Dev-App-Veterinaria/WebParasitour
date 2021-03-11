<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoencaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $servidor = 'http://localhost:3001/api/disease';
        $doencas = Http::get($servidor)->json();
        return view('doencas.list', ['doencas'=>$doencas]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doencas.Conteudo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post( 'localhost:3001/api/disease/', [
            'name' => $request->name,
            'etiologicalAgent' =>  $request->etiologicalAgent,
            'scientificName' =>  $request->scientificName,
            'vector' =>  $request->vector,
            'lifeCycle' =>  $request->lifeCycle,
            'transmission' =>  $request->transmission,
            'clinicalManifestation' =>  $request->clinicalManifestation,
            'complications' =>  $request->complications,
            'distribution' =>  $request->distribution,
            'states' =>  $request->states,
        ]);
        return redirect('/doencas');
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
        $servidor = 'http://localhost:3001/api/disease';
        $endereco = '$servidor';
        $endereco = $endereco .  '$id';
        $deletar = Http::delete('$endereco');
        return redirect('/doencas');
    }
}
