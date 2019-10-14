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
        return view('admin.home');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListaClientes() {
        //$clientes = \App\Cliente::where('isadmin', true)->get();

        return view('admin.clientes');
    }

    /**
     * Show the Admin dashboard.
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
        $cliente->cliente_id = $cliente->id;
        $cliente->save();

        return view('admin.clientes');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListaAdmins() {
        $admins = \App\Admin::all();

        return view('admin.admins');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function InserirAdmin(Request $req) {

        $validatedData = $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        \App\Admin::create([
            'firstname' => $req['firstname'],
            'lastname'  => $req['lastname'],
            'email'     => $req['email'],
            'isvalid'   => true,
            'password'  => Hash::make($req['password']),
        ]);
        return view('admin.admins');
    }
}
