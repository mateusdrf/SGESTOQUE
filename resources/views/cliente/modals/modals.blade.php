


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
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Criar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
