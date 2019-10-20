<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de inserir clientes -->

<div class="modal" id="novocliente" tabindex="-1" role="dialog">
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
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Criar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de editar cliente -->
<div class="modal" id="editarcliente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.clientes.editar') }}">
                    @csrf
                    <input type="hidden" name="id" id="eid">
                    <div class="form-group row">
                        <label for="efirstname" class="col-md-4 col-form-label text-md-right">Nome</label>

                        <div class="col-md-6">
                            <input id="efirstname" type="text" class="form-control @error('efirstname') is-invalid @enderror" name="firstname" value="{{ old('efirstname') }}" required autocomplete="efirstname" autofocus>

                            @error('efirstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="elastname" class="col-md-4 col-form-label text-md-right">Sobrenome</label>

                        <div class="col-md-6">
                            <input id="elastname" type="text" class="form-control @error('elastname') is-invalid @enderror" name="lastname" value="{{ old('elastname') }}" required autocomplete="elastname" autofocus>

                            @error('elastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="eemail" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="eemail" type="text" class="form-control @error('eemail') is-invalid @enderror" name="email" value="{{ old('eemail') }}" required autocomplete="eemail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="epassword" class="col-md-4 col-form-label text-md-right">Senha</label>

                        <div class="col-md-6">
                            <input id="epassword" type="password" class="form-control @error('epassword') is-invalid @enderror" name="password" required autocomplete="epassword">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="epassword-confirm" class="col-md-4 col-form-label text-md-right">Confirmar senha</label>

                        <div class="col-md-6">
                            <input id="epassword-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="epassword">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Salvar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Modal de editar cliente -->
<div class="modal" id="deletarcliente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.clientes.deletar') }}">
                    @csrf
                    <input type="hidden" name="id" id="did">
                    <p id="msgConfirm">Deseja deletar este cliente?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><i class="mdi mdi-check"></i>Confirmar</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>