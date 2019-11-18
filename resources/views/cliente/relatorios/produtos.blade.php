<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço de Compra</th>
            <th>Preço de Venda</th>
            <th>Vencimento</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->precocompra }}</td>
                <td>{{ $p->precovenda }}</td>
                <td>{{ $p->datavencimento }}</td>
                <td>{{ $p->descricao }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


