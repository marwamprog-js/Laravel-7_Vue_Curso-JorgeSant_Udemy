<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use App\LogAcesso;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{

    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    }

    public function principal() {
        return view('site.sobre-nos');
    }
}
