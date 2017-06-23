   <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,

            "language": {
            "lengthMenu": "Motrar _MENU_ resultados",
            "zeroRecords": "Não há nenhum resultado",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Vazio",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "sSearch":        "Procurar",

            "oPaginate": {
            "sFirst":     "Primeiro",
            "sPrevious":  "Anterior",
            "sNext":      "Próximo",
            "sLast":      "Último"
            },
        },
        });
    });
  </script>

  <script type="text/javascript">

  $(document).ready(function(){
      $("#btnCarregar").click(function(){
          
        var a = parseInt(btnCarregar.value)+10;
        document.location.href ='/Finch/carregar/'+a;

              
      });
  });

  </script>

  <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $titulo;?></h1>
            </div>
  </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">   
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFiltro">Filtros de pesquisa</button>
                        </div>
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Idade</th>
                                        <th>Cidade/Estado</th>  
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach ($lista as $l):  ?>
                                    <tr class="odd gradeX">
                                       <td align="center"> <img src="<?php echo base_url('assets/upload/'.$l->foto);?>" height="100" width="100"/></td>
                                       <td><a href="<?= base_url('consulta/').$l->idPessoa?>"> <?php if($l->nome != '') echo $l->nome; if($l->nome == '') echo 'Não informado'?> <?php echo $l->sobrenome?></a></td>
                                       <td><?php echo $l->idade?></td>
                                       <td><?php echo $l->cidade?> / <?php echo $l->estado?></td> 
                                       
                                    </tr>
                                  <?php endforeach ?>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 



  <div class="modal fade" id="modalFiltro" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="color:darkturquoise;"><span class="glyphicon glyphicon-search"></span> Filtros </h4>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('consultarDesaparecidosFiltro');?>" method="post" role="form">
             
              <div class="form-group">
                <label for="nome"> Nome </label>
                <input type="text-box" class="form-control" name="nome" id="nome" placeholder="Deixe em branco para mostrar todos">
              </div>
             
         		<div class="form-group">
         			 <label for="cidade">Cidade</label>
         			 	<select name="cidade" id="cidade" class="form-control">
                          <option value="" selected="selected">Todas</option>
                          <option value="Torres"> Torres </option>
                      </select>

         		</div>


         
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
  			    <button type="submit" class="btn btn-success">Buscar</button>
          </div>
         </form>
        </div>
      </div>
  </div> 
  </div>
  </div>        