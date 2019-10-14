<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    protected $redirectTo = '/cliente/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cliente.auth:cliente');
    }

    /**
     * Show the Cliente dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('cliente.home');
    }

    /*--------------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Funcionarios-------------------------------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Show Funcionarios
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarFuncionarios() {
        $funcionarios = \App\Cliente::where('isadmin', 0)->get();
        return view('cliente.funcionarios')->with('funcionarios', $funcionarios);
    }

    /**
     * Cadastro funcionário
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovoFuncionario(Request $req) {
        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = \App\Cliente::getUserLogged();

        \App\Cliente::create([
            'firstname'  => $req['firstname'],
            'lastname'   => $req['lastname'],
            'email'      => $req['email'],
            'cliente_id' => $user->id,
            'isadmin'    => false,
            'isvalid'    => true,
            'password'   => Hash::make($req['password']),
        ]);
        return back()->withInput();
    }
}
