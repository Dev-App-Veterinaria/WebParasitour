<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoencaController extends Controller
{

    private $server;

    public function __construct()
    {
        $this->server = env("SERVER_ADDRESS").'disease/';
        $this->middleware('check.session');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //$servidor = '172.17.0.1:3001/api/disease';
        //$doencas = Http::get($servidor)->json();

        $doencas = Http::get($this->server)->json();

        return view('doencas.index', ['doencas'=>$doencas]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doencas.conteudo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = session('token', '');
        $doencas = Http::withHeaders([
            'token' => "Bearer $token",
        ])->post( 'localhost:3002/api/disease/', [
            'name' => $request->nome,
            'etiologicalAgent' =>  $request->etiologicalAgent,
            'scientificName' =>  $request->scientificName,
            'vector' =>  $request->vector,
            'lifeCycle' =>  $request->lifeCycle,
            'transmission' =>  $request->transmission,
            'clinicalManifestation' =>  $request->clinicalManifestation,
            'complications' =>  $request->complications,
            'distribution' =>  $request->distribution,
            'states' =>  $request->estados,
        ]);
        $status = $doencas->status(); 
        if($status == 401){
            session()->forget('token');
        }

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
        $doenca = Http::get($this->server.$id);

        return view('doencas/conteudo', ['doenca' => $doenca]);
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
        $doencas = [
            'name' => $request->nome,
            'etiologicalAgent' =>  $request->etiologicalAgent,
            'scientificName' =>  $request->scientificName,
            'vector' =>  $request->vector,
            'lifeCycle' =>  $request->lifeCycle,
            'transmission' =>  $request->transmission,
            'clinicalManifestation' =>  $request->clinicalManifestation,
            'complications' =>  $request->complications,
            'distribution' =>  $request->distribution,
            'states' =>  $request->estados,
        ];

        $token = session('token', '');
        Http::withHeaders(['token'=>"Bearer $token"])->put($this->server.$id, $doencas);

        return redirect('/doencas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = session('token', '');
        Http::withHeaders(['token'=>"Bearer $token"])->delete($this->server . $id);
        return redirect('/doencas');
    }
}
