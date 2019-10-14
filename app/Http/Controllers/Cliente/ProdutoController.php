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
        $user = Auth::guard('cliente')->user()->id;
        $cliente = \App\Cliente::Find($user);
        $produtos = \App\Produto::where('cliente_id', $cliente->cliente_id)->where('isactive', '<>', 1)->get();

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
            'cliente_id'     => Auth::guard('cliente')->user()->id,
            'nome'           => $req['nome'],
            'precocompra'    => $req['precocompra'],
            'precovenda'     => $req['precovenda'],
            'datavencimento' => $req['datavencimento'],
            'qtdmin'         => $req['qtdmin'],
            'qtdmax'         => $req['qtdmax'],
            'descricao'      => $req['descricao'],
        ]);
        return back()->withInput();
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
        $produto->nome           = $req['nome'];
        $produto->precocompra    = $req['precocompra'];
        $produto->precovenda     = $req['precovenda'];
        $produto->datavencimento = $req['datavencimento'];
        $produto->qtdmin         = $req['qtdmin'];
        $produto->qtdmax         = $req['qtdmax'];
        $produto->descricao      = $req['descricao'];

        $produto->save();

        return back()->withInput();
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

        return back()->withInput();
    }


    /*----------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Entradas-------------------------------------------------------------------*/
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Cria Entradas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovaEntrada(Request $req) {
        $validatedData = $req->validate([
            'motivoent'     => ['required', 'string', 'max:500'],
            'quantidadeent' => ['required'],
        ]);

        \App\Entrada::create([
            'cliente_id'     => Auth::guard('cliente')->user()->id,
            'produto_id'     => $req['idprodent'],
            'motivo'         => $req['motivoent'],
            'quantidade'     => $req['quantidadeent'],
        ]);

        return back()->withInput();
    }

    /*--------------------------------------------------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------Saídas-------------------------------------------------------------------*/
    /*--------------------------------------------------------------------------------------------------------------------------------------------*/

    /**
     * Cria Saidas
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function NovaSaida(Request $req) {
        $validatedData = $req->validate([
            'motivosai'     => ['required', 'string', 'max:500'],
            'quantidadesai' => ['required'],
        ]);

        \App\Saida::create([
            'cliente_id'     => Auth::guard('cliente')->user()->id,
            'produto_id'     => $req['idprodsai'],
            'motivo'         => $req['motivosai'],
            'quantidade'     => $req['quantidadesai'],
        ]);

        return back()->withInput();
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
        $user     = Auth::guard('cliente')->user()->id;
        $cliente  = \App\Cliente::Find($user);
        $produtos = \App\Produto::where('cliente_id', $cliente->cliente_id)->where('isactive', '<>', 1)->get();

        foreach($produtos as $p){
            $entradas = \App\Entrada::where('produto_id', $p->id)->get();
            $saidas   = \App\Saida::where('produto_id', $p->id)->get();

            $entradas = collect($entradas)->sum('quantidade');
            $saidas   = collect($saidas)->sum('quantidade');

            $p->qtdatual = $entradas - $saidas;
        }

        return view('cliente.estoque')->with('produtos', $produtos);
    }
}
