<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        // $produtos = \App\Produto::where('isactive', '<>', 1)->get();

        // foreach($produtos as $p){
        //     $entradas = \App\Entrada::where('produto_id', $p->id)->get();
        //     $saidas   = \App\Saida::where('produto_id', $p->id)->get();

        //     $entradas = collect($entradas)->sum('quantidade');
        //     $saidas   = collect($saidas)->sum('quantidade');

        //     $p->qtdatual = $entradas - $saidas;
        // }

        // $produtos = collect($produtos)->sortBy('qtdatual')->take(10);

        return view('admin.home');
            // ->with('produtos', $produtos);
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListaClientes() {
        $clientes = \App\Cliente::where('isadmin', true)->where('isvalid', true)->get();

        return view('admin.clientes')->with('clientes', $clientes);
    }

    /**
     * insere novo cliente.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function InserirCliente(Request $req) {

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $cliente = new \App\Cliente();
        $cliente->firstname  = $req['firstname'];
        $cliente->lastname   = $req['lastname'];
        $cliente->email      = $req['email'];
        $cliente->isadmin    = true;
        $cliente->isvalid    = true;
        $cliente->password   = Hash::make($req['password']);
        $cliente->save();

        return back();
    }

    /**
     * Edita funcionário
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditarCliente(Request $req) {
        $cliente = \App\Cliente::Find($req['id']);

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($req['email'] == $cliente->email){
            $cliente->email = $req['email'];
        } else{
            $validateEmail = \App\Cliente::where('email', $req['email'])->count();
            if($validateEmail > 0){
                return back()->withInput();
            }else{
                $cliente->email = $req['email'];
            }
        }
        
        $cliente->firstname = $req['firstname'];
        $cliente->lastname  = $req['lastname'];
        $cliente->password  = Hash::make($req['password']);
        $cliente->save();

        return back();
    }

    /**
     * Deleta funcionario
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function DeletarCliente(Request $req) {

        //$validateProdutos = \App\Produto::where('', $req['id'])->count();

        $cliente = \App\Cliente::Find($req['id']);
        $cliente->isvalid = false;
        $cliente->save();

        return back();
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListaAdmins() {
        $admins = \App\Admin::where('isvalid', 1)->get();

        return view('admin.admins')->with('admins', $admins);
    }

    /**
     * Admin insert user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function InserirAdmin(Request $req) {

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = Auth::guard('admin')->user()->id;

        \App\Admin::create([
            'firstname'  => $req['firstname'],
            'lastname'   => $req['lastname'],
            'email'      => $req['email'],
            'isvalid'    => true,
            'password'   => Hash::make($req['password']),
        ]);
        return back();
    }

    /**
     * Edita admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditarAdmin(Request $req) {
        $admin = \App\Admin::Find($req['id']);

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($req['email'] == $admin->email){
            $admin->email = $req['email'];
        } else{
            $validateEmail = \App\Admin::where('email', $req['email'])->count();
            if($validateEmail > 0){
                return back();
            }else{
                $admin->email = $req['email'];
            }
        }
        
        $admin->firstname = $req['firstname'];
        $admin->lastname  = $req['lastname'];
        $admin->password  = Hash::make($req['password']);
        $admin->save();

        return back();
    }

     /**
     * Deleta admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function DeletarAdmin(Request $req) {
        $admin = \App\Admin::Find($req['id']);
        $admin->isvalid = false;
        $admin->save();

        return back();
    }

}
