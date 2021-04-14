<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuariosController extends Controller
{
    private $server;

    public function __construct()
    {
        $this->server = 'http://localhost:3002/api/user/';
        $this->middleware('check.session');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = session('token', '');

        $usuarios = Http::withHeaders([
            'token' => "Bearer $token",
        ])->get($this->server)->json();

        if(isset($usuarios['error'])){
            session()->forget('token');
            return redirect("/login");
        }

        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.conteudo');
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

        $usuarios = Http::withHeaders([
            'token' => "Bearer $token",
        ])->post( $this->server, [
            'name' => $request->name,
            'password' =>  $request->password,
            'email' =>  $request->email,
        ]);

        if(isset($usuarios['error'])){
            session()->forget('token');
        }

        return redirect('/usuarios');
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
        $token = session('token', '');

        $usuario = Http::withHeaders([
            'token' => "Bearer $token",
        ])->get( $this->server.$id)->json();

        if(isset($usuario['error'])){
            session()->forget('token');
            return redirect('/login');
        }

        return view('usuarios/conteudo', ['usuario' => $usuario]);
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
        $token = session('token', '');

        $usuario = [
            'name' => $request->name,
            'password' =>  $request->password,
            'email' =>  $request->email,
        ];

        $result =  Http::withHeaders([
            'token' => "Bearer $token",
        ])->put( $this->server.$id, $usuario);

        if($result->status() == 401){
            session()->forget('token');
        }

        return redirect('/usuarios');
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
        $result = Http::withHeaders([
            'token' => "Bearer $token",
        ])->delete( $this->server.$id);

        if($result->status()  == 401){
            session()->forget('token');
        }

        return redirect('/usuarios');
    }
}
