<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header"> <?php echo $titulo; ?></h1>

    </div>

</div>



<!-- Row sub-menu -->

<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-green">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-user-o fa-5x"></i>

                    </div>



                    <div class="col-xs-9 text-right">

                        <div class="huge"><?php echo $numE; ?></div>

                            <div>Pessoas encontradas</div>

                    </div>

                </div>

            </div>

                            <a href="<?= base_url('encontrados');?>">

                            <div class="panel-footer">

                                <span class="pull-left">Ver todos</span>

                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>

                            </div>

                            </a>

        </div>

    </div>



    <div class="col-lg-3 col-md-6">

        <div class="panel panel-primary">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-user-o fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge"><?php echo $numD; ?></div>

                            <div>Pessoas Desaparecidas</div>

                    </div>

                </div>

            </div>

                                       

    <a href="<?= base_url('desaparecidos');?>">

        <div class="panel-footer">

            <span class="pull-left">Ver todos</span>

            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>

        </div>

    </a>

        </div>

    </div>



    <div class="col-lg-3 col-md-6">

        <div class="panel panel-red">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-download fa-5x"></i>

                    </div>

                    <div class="col-xs-8 text-right">

                        <div>Sistema Captcha para procura de pessoas desaparecidas</div>

                    </div>

                </div>

            </div>

            <a href="<?= base_url('download');?>">

            <div class="panel-footer">

                <span class="pull-left">Clique aqui e faça o download</span>

                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>

            </div>

            </a>

        </div>

    </div>

</div>

    <!-- Fim row sub-menu -->

<br>



    

    <!-- Row últimos registros -->

    <div class="row">

        <div class="col-lg-4">

          <div class="panel panel-green">

                        <div class="panel-heading">

                        Encontrados Recentes <a href="<?= base_url('encontrados');?>" class="ver-depoimentos" ><font color="black">(ver todos)</font></a>

                        </div>

          </div>

   

       

       <div class="panel-body">

        <div class="row text-left">

            <ul class="thumbnails home-desaparecidos span11">

            <?php foreach($lista2 as $l2): ?>

              <div class="col-md-3 hero-feature">

                <div>

                    <img src="<?php echo base_url('assets/upload/'.$l2->foto);?>" height="20" width="30" alt="">

                    <div class="caption">

                        <h3><?php if($l2->nome != '') echo $l2->nome; if ($l2->nome =='') echo 'Sem nome';  ?></h3>

                        <p>Idade:  <?php echo $l2->idade ?> </p>

                        <p>Desapareceu em: <?php if($l2->desaparecimento != '') echo $l2->desaparecimento; if ($l2->desaparecimento == '') echo 'Data não informada'?></p>

                        <p>

                            <a href="<?= base_url('consulta/').$l2->idPessoa;?>" class="btn btn-info">Mais informações</a>

                        </p>

                    </div>

                </div>

              </div>

            <?php endforeach;?>

            </ul>

        </div>

        </div>

       </div>



       <div class="col-lg-5">

          <div class="panel panel-primary">

                        <div class="panel-heading">

                        Últimos desaparecidos <a href="<?= base_url('desaparecidos');?>" class="ver-depoimentos" ><font color="black">(ver todos)</font></a>

                        </div>

          </div>

   

       

       <div class="panel-body">

        <div class="row text-left">

            <ul class="thumbnails home-desaparecidos span9">

            <?php foreach($lista as $l): ?>

              <div class="col-md-3 col-sm-6 hero-feature">

                <div>

                    <img src="<?php echo base_url('assets/upload/'.$l->foto);?>" height="200" width="200" alt="">

                    <div class="caption">

                        <h3><?php if($l->nome != '') echo $l->nome; if ($l->nome =='') echo 'Sem nome';  ?></h3>

                        <p>Idade:  <?php echo $l->idade ?> </p>

                        <p>Desapareceu em: <?php if($l->desaparecimento != '') echo $l->desaparecimento; if ($l->desaparecimento == '') echo 'Data não informada'?></p>

                        <p>

                            <a href="<?= base_url('consulta/').$l->idPessoa;?>" class="btn btn-info">Mais informações</a>

                        </p>

                    </div>

                </div>

              </div>

            <?php endforeach;?>

            </ul>

        </div>

        </div>

       </div>

    </div>

    <!-- Fim row últimos registros  -->



<br>

       



<!-- Row informações adicionais -->

 <div class="row">

      <div class="col-lg-4">

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            O que fazer?

                        </div>



                        <div class="panel-body" style="max-height:450px; overflow-y: scroll;">

                       

                            <p>

                             &nbsp;&nbsp;&nbsp;&nbsp; O <em>FINCH</em> é um sistema para auxílio na busca por <strong>pessoas desaparecidas</strong>. Mas é extremamente necessário o cadastro do desaparecimento nos órgãos competentes (delegacias, instituições, ONGs, etc), pois assim haverá um registro oficial do desaparecimento.

                            <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;Hoje, o número de pessoas desaparecidas é muito maior do que o registrado oficialmente (via boletim de ocorrência) por causa da negligência em registrar a ocorrência. O registro oficial de pessoas desaparecidas auxilia o governo a melhorar a estrutura para solução destas ocorrências,

                            e permite a estruturação de dados estatísticos mais precisos sobre os desaparecidos no país.

                         



                            </p>

                        </div>

                    </div>

       </div>

       

       <div class="col-lg-5">

             <div class="panel panel-primary">

                <div class="panel-heading">

                    Ajude-nos!

                </div>



                <div class="panel-body" style="max-height:450px; overflow-y: scroll;">

                    <p>

                    <em> &nbsp;&nbsp;&nbsp;&nbsp; Por que doar?</em>

                    <br>

                        Precisamos da sua contribuição para pagar a hospedagem onde é mantido o <em>FINCH</em>.

                    <br>

                        Além disso, ainda utilizamos o dinheiro doado para compra de links patrocinados no Google e 

                        anúncios patrocinados no Facebook, com a intenção de aumentar a divulgação dos casos.

                    <div class="span12">

                    <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->

                    <form action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">

                    <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->

                    <input type="hidden" name="currency" value="BRL" />

                    <input type="hidden" name="receiverEmail" value="chaoslune@hotmail.com" />

                    <input type="hidden" name="iot" value="button" />

                    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/99x61-doar-laranja-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

                    </form>

<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

                    </div>

                    </p>

                </div> 

             </div>

        </div>   





        <div class="col-lg-9">

        <div class="panel panel-primary">

            <div class="panel-heading" align="center">

                Parceiros

            </div>

            <div class="panel-body">

            <ul class="thumbnails home-desaparecidos span12">

             

                <div class="span2 parceiro">

                    <a href="http://www.facebook.com/pages/Projeto-SOS-Online/540669379312414" target="_blank" rel="nofollow">

                        <span>Projeto SOS Online</span>

                        <img src="assets/img/sosonline.jpg"  widht="100" height="200">

                    </a>

                </div>

                <div class="span2 parceiro">

                    <a href="https://www.facebook.com/ProjetoAjudaAmiga.Paa" target="_blank" rel="nofollow">

                        <span>Projeto Ajuda Amiga</span>

                        <img src="assets/img/missing.jpg"  widht="100" height="200">

                    </a>

                </div>

                <div class="span2 parceiro">

                    <a href="https://www.facebook.com/Missing.HELP" target="_blank" rel="nofollow">

                        <span>Desaparecidos/Missing</span>

                        <img src="assets/img/desap.jpg" widht="100" height="200">

                    </a>

                </div>

           </ul>

           </div>

        </div>

    </div>   



    </div>   

    <!-- Fim row informações adicionais -->   