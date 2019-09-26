@extends('cliente.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="grid">
            <div class="grid-header">
                <div style="width: 10%">Produtos
                    <div class="btn btn-success has-icon" data-toggle="modal" data-target="#novoproduto">
                        <i class="mdi mdi-account-plus-outline"></i>Novo
                    </div>
                </div>
            </div>
            <div class="item-wrapper">
                <div class="table-responsive">
                    <table class="table info-table">
                        <thead>
                            <tr>
                                <th class="text-left">Código</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                                <td class="text-left">ok</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                            <input id="precocompra" type="text" class="form-control @error('precocompra') is-invalid @enderror" name="precocompra" value="{{ old('precocompra') }}" required autocomplete="precocompra" autofocus>

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
                            <input id="precovenda" type="text" class="form-control @error('precovenda') is-invalid @enderror" name="precovenda" value="{{ old('precovenda') }}" required autocomplete="precovenda">

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
                            <input id="datavencimento" type="text" class="form-control @error('datavencimento') is-invalid @enderror" name="datavencimento" value="{{ old('datavencimento') }}" required autocomplete="datavencimento">

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
                            <input id="qtdmin" type="text" class="form-control @error('qtdmin') is-invalid @enderror" name="qtdmin" value="{{ old('qtdmin') }}" required autocomplete="qtdmin">

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
                            <input id="qtdmax" type="text" class="form-control @error('qtdmax') is-invalid @enderror" name="qtdmax" value="{{ old('qtdmax') }}" required autocomplete="qtdmax">

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
