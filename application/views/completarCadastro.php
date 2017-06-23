<script type="text/javascript">
// Função que será ativada quando um estado for selecionado
$(function(){
	$("#inputEstado").change(function(){

		// Variável valor recebe o ID da opção no dropdown de escolha de Estado
		var valor = document.getElementById("inputEstado").value;
		
		// Variável remover recebe o ID acima
		var remover = $(this).val();

			// Se a variável remover for identico a vazio, o dropdown de opções de Cidades desaparece
			if(remover === ''){
				$("#inputCidade").find("option").remove();

			}

		// Chama a função completarCidades, passando o valor como parâmetro e recebendo uma função que retorna objetos data
		$.getJSON('completarCidades/'+valor, function (data){
			
			// A cada troca de Estado o dropdown de Cidades é atualizado para as cidades do novo estado
			$("#inputCidade").find("option").remove();

			// As seguintes linhas recebem o Json de Cidades e convertem em Array, esse Array é passado para o Dropdown de Cidades, mostrando o nome das cidades
			// por estado
			var option = new Array();
			
			$.each(data, function(i, obj){

				option[i] = document.createElement('option');
				$(option[i]).attr({value : obj.id});
				$(option[i]).append(obj.nome);

				$("#inputCidade").append(option[i]);
			});

		});
	});
	});
</script>

 	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> <?php echo $titulo; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
    </div>

  	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulário de cadastro (preenchimento obrigatório destacado em vermelho)
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                
                                    <?php echo form_open_multipart('cadastroPessoa');?>
         
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" type="text" name="inputNome" placeholder="Ex: Gabriel">
                                        </div>

                                        <div class="form-group">
                                            <label>Sobrenome</label>
                                            <input class="form-control" type="text" name="inputSobrenome" placeholder="Ex: Souza da Silva">
                                        </div>

                                        <div class="form-group">
                                            <label>Idade</label>
                                            <input class="form-control" type="number" name="inputIdade" placeholder="Ex: 22">
                                        </div>

                                        <div class="form-group">
                                            <label>Data do desaparecimento</label>
                                            <input type="date" class="form-control" name="inputDesaparecimento">
                                        </div>  

                                        <div class="form-group">
                                            <label> Sexo </label>
                                            <select class="form-control" name="inputSexo">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                           <label><font color="red">Selecione um estado</font></label>
                                            
                                            <?php $options =array (''=> 'Estado');
                                            foreach($estados as $estado)
                                            $options[$estado->id] = $estado->nome;
                                            echo form_dropdown('inputEstado', $options, '', 'class="form-control" id="inputEstado" required');
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label><font color="red">Cidade</font></label>
                                            <?php echo form_dropdown('inputCidade', array('' => 'Escolha um Estado'), '','class="form-control" id="inputCidade" required' ); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Situação</label>
                                            <select  class="form-control" name="inputSituacao">
                                            <option value="Desaparecido">Desaparecido</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Mais informações</label>
                                            <textarea class="form-control" name="inputObservacao" id="inputObservacao" rows="7" maxlength="532" placeholder="Ex: Estava usando uma camisa vermelha"></textarea>
                                        </div>
                                    </div>

                                <!-- Menu à direita -->
                                <div class="col-lg-6">
                                    
	 		                            <div class="form-group">
                                            <label>Endereço</label>
                                            <input class="form-control" type="text" name="inputEndereco" placeholder="Ex: Rua Antônio Brunelli">
                                        </div>

                                        <div class="form-group">
                                            <label>Altura</label>
                                            <input class="form-control" type="text" name="inputAltura" placeholder="Ex: 1.80">
                                        </div>

                                        <div class="form-group">
                                            <label>Peso</label>
                                            <input class="form-control" type="text" name="inputPeso" placeholder="Ex: 60">
                                        </div>

                                        <div class="form-group">
                                            <label>Cor da pele</label>
                                            <input class="form-control" type="text" name="inputPele" placeholder="Ex: Clara">
                                        </div>

                                        <div class="form-group">
                                            <label>Cor dos cabelos</label>
                                            <input class="form-control" type="text" name="inputCabelo" placeholder="Ex: Loiros">    
                                        </div>

                                        <div class="form-group">
                                            <label>Cor dos olhos</label>
                                            <input class="form-control" type="text" name="inputOlhos" placeholder="Ex: Castanhos">
                                        </div>

                                        <div class="form-group">
                                            <label>Alguma necessidade especial?</label>
                                            <input class="form-control" type="text" name="inputNecessidadesEspeciais" placeholder="Ex: Falta de audição">
                                        </div>

                                        <div class="form-group">
                                            <label><font color="red">Telefone para contato</font></label>
                                            <input class="form-control" type="text" name="inputTelefone" placeholder="Ex: (xx) xxxxx-xxxx" required>
                                        </div>

                                        <div class="form-group">
                                            <label><font color="red">Carregue uma foto</font></label>
                                            
                                            <input class="form-control" type="file" name="inputImagem" required>
                                            
                                        </div>
      	                              
                            	        <button class="btn btn-success" name="btnCadastro" type="submit" value="Cadastro">Cadastrar</button>
                                        <button class="btn btn-warning" type="reset" >Limpar cadastro</button>
	                                <?php echo form_close();?>
		 
	                                </div> 

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    </div>
       
