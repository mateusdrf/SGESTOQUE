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
        //retornar produtos com estoque critico
        //retornar produtos com maior movimentação
        //retornar por mes a quantidade de entradas e saidas de produtos

        $user     = Auth::guard('cliente')->user()->id;
        $cliente  = \App\Cliente::Find($user);
        $produtos = \App\Produto::where('cliente_id', $cliente->cliente_id)->where('isactive', '<>', 1)->get();

        $estoquecritico = array();
        $maioresmovimentacoes = array();

        foreach($produtos as $p){
            $entradas = \App\Entrada::where('produto_id', $p->id)->get();
            $saidas   = \App\Saida::where('produto_id', $p->id)->get();

            $entradasQtd = collect($entradas)->sum('quantidade');
            $saidasQtd   = collect($saidas)->sum('quantidade');

            $p->qtdatual = $entradasQtd - $saidasQtd;

            if($p->qtdatual <= $p->qtdmin){
                array_push($estoquecritico, $p);
            }
        }

        $entradas = \App\Entrada::where('cliente_id', $cliente->cliente_id)->select(\DB::raw('count(id) as `data`'), \DB::raw('MONTH(created_at) mes'))->groupby('mes')->get();
        $saidas   = \App\Saida::where('cliente_id', $cliente->cliente_id)->select(\DB::raw('count(id) as `data`'), \DB::raw('MONTH(created_at) mes'))->groupby('mes')->get();

        return view('cliente.home')
            ->with('estoquecritico', json_encode($estoquecritico))
            ->with('entradas', json_encode($entradas))
            ->with('saidas', json_encode($saidas));
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
