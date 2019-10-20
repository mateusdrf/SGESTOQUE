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
     * Lista Funcionarios
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarFuncionarios() {
        $funcionarios = \App\Cliente::where('isadmin', 0)->where('isvalid', 1)->get();
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

        $user = Auth::guard('cliente')->user()->id;

        \App\Cliente::create([
            'firstname'  => $req['firstname'],
            'lastname'   => $req['lastname'],
            'email'      => $req['email'],
            'cliente_id' => $user,
            'isadmin'    => false,
            'isvalid'    => true,
            'password'   => Hash::make($req['password']),
        ]);
        return back()->withInput();
    }


    /**
     * Edita funcionário
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditarFuncionario(Request $req) {
        $funcionario = \App\Cliente::Find($req['id']);

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($req['email'] == $funcionario->email){
            $funcionario->email = $req['email'];
        } else{
            $validateEmail = \App\Cliente::where('email', $req['email'])->count();
            if($validateEmail > 0){
                return back()->withInput();
            }else{
                $funcionario->email = $req['email'];
            }
        }
        
        $funcionario->firstname = $req['firstname'];
        $funcionario->lastname  = $req['lastname'];
        $funcionario->password  = Hash::make($req['password']);
        $funcionario->save();

        return back()->withInput();
    }

     /**
     * Deleta funcionario
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function DeletarFuncionario(Request $req) {
        $funcionario = \App\Cliente::Find($req['id']);
        $funcionario->isvalid = false;
        $funcionario->save();

        return back()->withInput();
    }
}
