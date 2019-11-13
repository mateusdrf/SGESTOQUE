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

                    <input type="hidden" name="idprodent" id="idprodentrada">
                    <input type="hidden" name="idclient" id="idclientrada">

                    <div class="form-group row">
                        <label for="quantidadeent" class="col-md-4 col-form-label text-md-right">Quantidade</label>

                        <div class="col-md-6">
                            <input id="quantidadeent" type="number" class="form-control @error('quantidadeent') is-invalid @enderror" name="quantidadeent" value="{{ old('quantidadeent') }}" required autocomplete="quantidadeent" autofocus>

                            @error('quantidadeent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motivoent" class="col-md-4 col-form-label text-md-right">Motivo</label>

                        <div class="col-md-6">
                            <input id="motivoent" type="text" class="form-control @error('motivoent') is-invalid @enderror" name="motivoent" value="{{ old('motivoent') }}" required autocomplete="motivoent">

                            @error('motivoent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Confirmar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
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

                    <input type="hidden" name="idprodsai" id="idprodsaida">
                    <input type="hidden" name="idcli" id="idclisaida">

                    <div class="form-group row">
                        <label for="quantidadesai" class="col-md-4 col-form-label text-md-right">Quantidade</label>

                        <div class="col-md-6">
                            <input id="quantidadesai" type="number" class="form-control @error('quantidadesai') is-invalid @enderror" name="quantidadesai" value="{{ old('quantidadesai') }}" required autocomplete="quantidadesai" autofocus>

                            @error('quantidadesai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motivosai" class="col-md-4 col-form-label text-md-right">Motivo</label>

                        <div class="col-md-6">
                            <input id="motivosai" type="text" class="form-control @error('motivosai') is-invalid @enderror" name="motivosai" value="{{ old('motivosai') }}" required autocomplete="motivosai">

                            @error('motivosai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Confirmar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>