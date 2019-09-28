<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de inserir entrada -->
<div class="modal" id="novaentrada" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de  Entrada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cliente.entrada.nova') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="quantidadeent" class="col-md-4 col-form-label text-md-right">Quantidade</label>

                        <div class="col-md-6">
                            <input id="quantidadeent" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade" autofocus>

                            @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motivo" class="col-md-4 col-form-label text-md-right">Motivo</label>

                        <div class="col-md-6">
                            <input id="motivoent" type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo" value="{{ old('motivo') }}" required autocomplete="motivo">

                            @error('motivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de inserir funcionarios -->

<div class="modal" id="novofuncionario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.clientes.inserir') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="firstname" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right">Sobrenome</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar senha</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de inserir saída -->

<div class="modal" id="novasaida" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de Saída</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cliente.saida.nova') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade</label>

                        <div class="col-md-6">
                            <input id="quantidadesai" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade" autofocus>

                            @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motivo" class="col-md-4 col-form-label text-md-right">Motivo</label>

                        <div class="col-md-6">
                            <input id="motivosai" type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo" value="{{ old('motivo') }}" required autocomplete="motivo">

                            @error('motivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de inserir produtos -->
<div class="modal" id="novoproduto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cliente.produtos.novo') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precocompra" class="col-md-4 col-form-label text-md-right">Preço de Compra</label>

                        <div class="col-md-6">
                            <input id="precocompra" type="text" class="money form-control @error('precocompra') is-invalid @enderror" name="precocompra" value="{{ old('precocompra') }}" required autocomplete="precocompra" autofocus>

                            @error('precocompra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precovenda" class="col-md-4 col-form-label text-md-right">Preço de Venda</label>

                        <div class="col-md-6">
                            <input id="precovenda" type="text" class="money form-control @error('precovenda') is-invalid @enderror" name="precovenda" value="{{ old('precovenda') }}" required autocomplete="precovenda">

                            @error('precovenda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="datavencimento" class="col-md-4 col-form-label text-md-right">Data de Validade</label>

                        <div class="col-md-6">
                            <input id="datavencimento" type="text" class="date form-control @error('datavencimento') is-invalid @enderror" name="datavencimento" value="{{ old('datavencimento') }}" required autocomplete="datavencimento">

                            @error('datavencimento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qtdmin" class="col-md-4 col-form-label text-md-right">Quantidade Mínima</label>

                        <div class="col-md-6">
                            <input id="qtdmin" type="number" class="form-control @error('qtdmin') is-invalid @enderror" name="qtdmin" value="{{ old('qtdmin') }}" required autocomplete="qtdmin">

                            @error('qtdmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qtdmax" class="col-md-4 col-form-label text-md-right">Quantidade Máxima</label>

                        <div class="col-md-6">
                            <input id="qtdmax" type="number" class="form-control @error('qtdmax') is-invalid @enderror" name="qtdmax" value="{{ old('qtdmax') }}" required autocomplete="qtdmax">

                            @error('qtdmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                        <div class="col-md-6">
                            <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao">

                            @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
