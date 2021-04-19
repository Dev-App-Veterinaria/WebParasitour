<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    private $server;

    public function __construct()
    {
        $this->server = env("SERVER_ADDRESS").'article/';
        $this->middleware('check.session');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->server);
        $artigos = $response->json();

        return view('artigos/index', ['artigos'=>$artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artigos/conteudo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastro = [
            'name' => $request->input('nome'),
            'doi' => $request->input('doi'),
            'citation' => $request->input('citacao'),
            'disease' => $request->input('doenca'),
            'state' => $request->input('estados'),
        ];

        Http::post($this->server, $cadastro);

        if($cadastro){
            return redirect('/artigos');
        }
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
        $artigo = Http::get($this->server.$id);

        return view('artigos/conteudo', ['artigo' => $artigo]);
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
        $artigo = [
            'name' => $request->input('nome'),
            'doi' => $request->input('doi'),
            'citation' => $request->input('citacao'),
            'disease' => $request->input('doenca'),
            'state' => $request->input('estados'),
        ];

        Http::put($this->server.$id, $artigo);

        return redirect('/artigos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete($this->server.$id);
        return redirect('/artigos');
    }
}
