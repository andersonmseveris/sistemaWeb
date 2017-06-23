
    <!DOCTYPE html>
    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
    	<head>
    		<meta charset="utf-8">
    		<title>Fale Conosco</title>
    		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<link href="assets/t/site/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="assets/t/site/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    		<link href="assets/t/site/css/flat-ui.css" rel="stylesheet">
            <link href="assets/t/site/css/odometer-theme-train-station.css" rel="stylesheet">
            <link href="assets/t/site/css/over.css" rel="stylesheet">
    		<link href="bootstrap/css/maxcdn-bootstrap.min.css" rel="stylesheet">
    		<link href="assets/t/site/bootstrap/css/signin.css" rel="stylesheet">
    	
    		<script src="assets/t/site/js/maxcdn-bootstrap.min.js"></script>
    		<script src="assets/t/site/js/ajax-jquery.min.js"></script>
            <script src="assets/t/site/js/jquery-3.1.1.js"></script>
            <script src="assets/t/site/js/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="assets/t/site/js/jquery.ui.touch-punch.min.js"></script>
            <script src="assets/t/site/js/bootstrap.min.js"></script>
            <script src="assets/t/site/js/bootstrap-select.js"></script>
            <script src="assets/t/site/js/bootstrap-switch.js"></script>
            <script src="assets/t/site/js/flatui-checkbox.js"></script>
            <script src="assets/t/site/js/flatui-radio.js"></script>
            <script src="assets/t/site/js/jquery.tagsinput.js"></script>
            <script src="assets/t/site/js/jquery.placeholder.js"></script>
            <script src="assets/t/site/js/jquery.stacktable.js"></script>
            <script src="assets/t/site/js/application.js"></script>
            <script src="assets/t/site/js/odometer.min.js"></script>

            <script src="/assets/t/site/js/geral.js"></script>

            <script src="https://connect.facebook.net/en_US/all.js"></script>
            <script src="/assets/t/site/js/facebook_api.js"></script>

            <link rel="canonical" href="http://finch.com.br" />


            <!--OVERHEADER-->

    <!--/OVERHEADER-->

            <script type="text/javascript">
                var fb_api = null;
                $(document).ready(function(){
                    if(typeof FB != 'undefined')
                        fb_api = new APIFacebook('464812953596036');

                    $('#btn-login').click(function(){
                        fb_api.user_login(function(dados_fb){
                            if(dados_fb)
                            {
                                $.get('/api/verificar-login?fb_uid='+dados_fb.userID,function(dados){
                                    if(dados && dados.ok)
                                    {
                                        top.location.reload();
                                    }
                                    else
                                    {
                                        if(typeof dados.url != 'undefined' && dados.url)
                                        {
                                            window.location.href = '/'+dados.url;
                                        }
                                    }
                                });
                            }
                            else
                            {
                                msg('Você precisa autorizar a aplicação para continuar.','error');
                            }
                        },'email,publish_stream,publish_actions');
                    });

                    $('#btn-logout').click(function(e){
                        e.preventDefault();
                        $.get('/sair',function(dados){
                            if(typeof dados != 'undefined' && dados.ok)
                            {
                                window.location.reload();
                            }
                            else
                            {
                                alert('Problemas ao efetuar logout. Verifique a conexão e tente novamente.');
                            }
                        });
                    });

                    $('#link-perdido').click(function(e){
                        e.preventDefault();
                        fb_api.user_login(function(dados_fb){
                            if(dados_fb)
                            {
                                $.get('/api/verificar-login?fb_uid='+dados_fb.userID,function(dados){
                                    if(dados && dados.ok)
                                    {
                                        top.location.href = '/ocorrencia/perdido';
                                    }
                                    else
                                    {
                                        top.location.href = '/cadastro?id='+dados_fb.userID+'&tipo=perdi';
                                    }
                                });
                            }
                            else
                            {
                                alert('Você precisa autorizar a aplicação para continuar.');
                            }
                        },'email,publish_stream,publish_actions');
                    });

                    $('#btn-usuario').click(function(){
                        $('#btn-usuario').tooltip('hide');
                    });

                    $('#busca-topo').bind('keydown',function(e){
                        var e = window.event? event : e;
                        var t = e.keyCode;

                        if(t == 13)
                        {
                            busca_topo();
                        }
                    });


                    $('#link-encontrado').click(function(e){
                        e.preventDefault();
                        fb_api.user_login(function(dados_fb){
                            if(dados_fb)
                            {
                                $.get('/api/verificar-login?fb_uid='+dados_fb.userID,function(dados){
                                    if(dados && dados.ok)
                                    {
                                        top.location.href = '/ocorrencia/encontrado';
                                    }
                                    else
                                    {
                                        top.location.href = '/cadastro?id='+dados_fb.userID+'&tipo=encontrei';
                                    }
                                });
                            }
                            else
                            {
                                alert('Você precisa autorizar a aplicação para continuar.');
                            }
                        },'email,publish_stream,publish_actions');
                    });

                                        $('#menu-contato').addClass('active');
                    
                    verificar_notificacoes();
                });

                verificar_notificacoes = function()
                {
                    $.get('/api/count-notificacoes',function(dados){
                        if(typeof dados != 'undefined' && dados.ok)
                        {
                            if(dados.count > 0)
                            {
                                $('.nao-lidas').html('('+dados.count+')');
                                $('#btn-usuario').tooltip('show');
                            }
                            else
                            {
                                $('.nao-lidas').html('');
                            }

                            $('.nao-lidas-sem-parenteses').html(dados.count);
                        }

                        window.setTimeout(verificar_notificacoes,5000);
                    });
                }

                busca_topo = function()
                {
                    q = $('#busca-topo').val();
                    window.location.href = '/desaparecidos?q='+q;
                }
            </script>




            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-44274622-1', 'kdvc.vc');
              ga('send', 'pageview');

            </script>
    	</head>
      	<body>
    	<div class="navbar-wrapper">
          <div class="container">

            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/desaparecidos/inicio">Início</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                  
                    <li><a href="/desaparecidos/cadastro">Cadastro</a></li>
                    <li><a href="/desaparecidos/desaparecidos" target="_self">Desaparecidos</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="/desaparecidos/infoApoio.php">Informações de apoio</a></li>
                       	<li><a href="/desaparecidos/linksUteis.php">Links Úteis</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Apoio</li>
                        <li><a href="/desaparecidos/parcerias.php">Parceiros</a></li>
                       
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

          </div>
        </div>
    	
            <div class="container" id="main">
            
                     

    <div class="row">
        <div class="span8">
            <div id="msg-toast" class="span8 nomargin">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div id="msg-toast-content"></div>
            </div>
    		
            <form class="form-horizontal" id="form-contato" action="/desaparecidos/mail" method="POST">
                <div class="control-group" id="control-nome">
                    <label class="control-label" for="nome">Seu nome</label>
                    <div class="controls">
                        <input type="text" name="nome" id="nome" maxlength="240" class="input-xxlarge" value=""  />
                        <span class="help-inline" id="msg-nome"></span>
                    </div>
                </div>
    			 
                <div class="control-group" id="control-email">
                    <label class="control-label" for="email">Seu email</label>
                    <div class="controls">
                        <input type="text" name="email" id="email" maxlength="500" class="input-xxlarge" value="" required />
                        <span class="help-inline" id="msg-email"></span>
                    </div>
                </div>
                <div class="control-group" id="control-mensagem">
                    <label class="control-label" for="mensagem">Mensagem</label>
                    <div class="controls">
                        <textarea name="mensagem" id="mensagem" class="span4" rows="5"></textarea>
                        <span class="help-inline" id="msg-mensagem"></span>
                    </div>
                </div>
            
                <div class="form-actions">
                    <button type="button" id="form-submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
        
    </div>
            </div>
            <footer>
               
            </footer>
      	</body>
    </html>