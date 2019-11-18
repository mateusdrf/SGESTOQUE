<?php

namespace App\Exports;

use App\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdutoFromView implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user     = \Auth::guard('cliente')->user()->id;
        $cliente  = \App\Cliente::Find($user);
        $produtos = \App\Produto::where('cliente_id', $cliente->cliente_id)
            ->where('isactive', '<>', 1)
            ->select('id', 'nome', 'precocompra', 'precovenda', 'descricao')
            ->get();
        return $produtos;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Preco Compra',
            'Preco Venda',
            'Descrição'
        ];
    }
}
