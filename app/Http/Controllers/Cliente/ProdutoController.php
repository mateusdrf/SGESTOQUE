<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Show Produtos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarProdutos() {
        $produtos = \App\Produto::where('cliente_id', Auth::id())->where('isactive', '!=', 1)->get();

        return view('cliente.produtos')->with('produtos', $produtos);
    }

    /**
     * Cria Produtos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovoProduto(Request $req) {
        $validatedData = $req->validate([
            'nome'        => ['required', 'string', 'max:255'],
            'precocompra' => ['required', 'string', 'max:255'],
            'precovenda'  => ['required', 'string', 'max:255'],
            'qtdmin'      => ['required', 'string', 'max:255'],
            'qtdmax'      => ['required', 'string', 'max:255'],
        ]);

        \App\Produto::create([
            'cliente_id'     => Auth::id(),
            'nome'           => $req['nome'],
            'precocompra'    => $req['precocompra'],
            'precovenda'     => $req['precovenda'],
            'datavencimento' => $req['datavencimento'],
            'qtdmin'         => $req['qtdmin'],
            'qtdmax'         => $req['qtdmax'],
            'descricao'      => $req['descricao'],
        ]);
        return $this->ListarProdutos();
    }

    /**
     * Edita Produtos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditarProduto(Request $req) {
        $validatedData = $req->validate([
            'nome'        => ['required', 'string', 'max:255'],
            'precocompra' => ['required', 'string', 'max:255'],
            'precovenda'  => ['required', 'string', 'max:255'],
            'qtdmin'      => ['required', 'string', 'max:255'],
            'qtdmax'      => ['required', 'string', 'max:255'],
        ]);

        $produto = \App\Produto::Find($req['id']);
        $produto->cliente_id     = Auth::id();
        $produto->nome           = $req['nome'];
        $produto->precocompra    = $req['precocompra'];
        $produto->precovenda     = $req['precovenda'];
        $produto->datavencimento = $req['datavencimento'];
        $produto->qtdmin         = $req['qtdmin'];
        $produto->qtdmax         = $req['qtdmax'];
        $produto->descricao      = $req['descricao'];

        $produto->save();

        return $this->ListarProdutos();
    }

    /**
     * Edita Produtos
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function DeletarProduto(Request $req) {
        $produto = \App\Produto::Find($req['id']);
        $produto->isactive = 1;
        $produto->save();

        return $this->ListarProdutos();
    }


    /*----------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Entradas-------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Show Entradas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarEntradas() {

        //Mandar o id do produto para vincular dps
        return view('cliente.entradas');
    }

    /**
     * Cria Entradas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovaEntrada(Request $req) {
        $validatedData = $req->validate([
            'motivo'     => ['required', 'string', 'max:500'],
            'quantidade' => ['required', 'number'],
        ]);

        \App\Entrada::create([
            'cliente_id'     => Auth::id(),
            'produto_id'     => $req['produto_id'],
            'motivo'         => $req['motivo'],
            'quantidade'     => $req['quantidade'],
        ]);

        return view('cliente.entradas');
    }

    /*--------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Saídas-------------------------------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Show Saidas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarSaidas() {
        return view('cliente.saidas');
    }

    /**
     * Cria Saidas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovaSaida(Request $req) {
        $validatedData = $req->validate([
            'motivo'     => ['required', 'string', 'max:500'],
            'quantidade' => ['required', 'number'],
        ]);

        \App\Entrada::create([
            'cliente_id'     => Auth::id(),
            'produto_id'     => $req['produto_id'],
            'motivo'         => $req['motivo'],
            'quantidade'     => $req['quantidade'],
        ]);

        return view('cliente.saidas');
    }

    
    /*---------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Estoque-------------------------------------------------------------------*/
    /*---------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Show Estoque
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ListarEstoque() {
        $produtos = \App\Produto::where('cliente_id', Auth::id())->get();
        
        return view('cliente.estoque')->with('produtos', $produtos);
    }
}
