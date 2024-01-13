<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function principal() {

        return view('site.contato');
    }

    public function mensagem(Request $request) {

        $contato = new SiteContato();


        /* Forma de pegar dados da requisição 
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());
        $contato->save();
        */

        // $contato->fill($request->all());
        // $contato->save();

        $contato->create($request->all());

        return redirect()->route('site.contato');


    }
}
