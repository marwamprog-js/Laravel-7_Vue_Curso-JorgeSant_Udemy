<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        // dd($request);

        if($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        
        //Regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Mensagens de feedback
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        //recuperamos os paramentros do usuário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar
        $user = new User();        
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()->first();

        //Validando se usuário existe no  BANCO
        if(isset($usuario->name)) {
            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }


    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
