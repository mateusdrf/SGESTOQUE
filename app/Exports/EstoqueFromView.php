<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstoqueFromView implements FromCollection, WithHeadings
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
            ->select('nome', 'descricao', 'qtdatual')
            ->get();

        foreach($produtos as $p){
            $entradas = \App\Entrada::where('produto_id', $p->id)->get();
            $saidas   = \App\Saida::where('produto_id', $p->id)->get();

            $entradas = collect($entradas)->sum('quantidade');
            $saidas   = collect($saidas)->sum('quantidade');

            $p->qtdatual = $entradas - $saidas;
        }
        return $produtos;        
    }

    public function headings(): array
    {
        return [
            'Produto',
            'Descrição',
            'Quantidade Atual'
        ];
    }
}
