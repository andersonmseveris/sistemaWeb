<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> <?php echo $titulo; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
</div>

 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Para continuar, informe o seu CPF</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('completarCadastro', 'class="form-signin"'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="CPF" name="inputCPF" type="text" minlength="11" maxlength="11" required autofocus>
                                </div>
                              
                                <button class="btn btn-lg btn-success btn-block" name="btnCadastro" type="submit" value="Cadastro">Logar</button>
                                
                            </fieldset>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
