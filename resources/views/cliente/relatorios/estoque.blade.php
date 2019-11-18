<table id="table">
    <thead>
        <tr>
            <th class="text-left">Produto</th>
            <th class="text-left">Quantidade Mínima</th>
            <th class="text-left">Quantidade Máxima</th>
            <th class="text-left">Quantidade Atual</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $p)
            <tr>
                <td class="text-left">{{ $p->nome }}</td>
                <td class="text-left">{{ $p->qtdmin }}</td>
                <td class="text-left">{{ $p->qtdmax }}</td>
                <td class="text-left">{{ $p->qtdatual }}</td>
            </tr>
        @endforeach
    </tbody>
</table>