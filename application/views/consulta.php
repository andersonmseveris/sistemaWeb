		<?php

		defined('BASEPATH') OR exit('No direct script access allowed');

		?>

		<?php

		foreach ($lista as $l):

		if($l->cidade != NULL || $l->endereco != NULL  ){

		$address = ($l->cidade).",".($l->endereco); // Google HQ
		$prepAddr = str_replace(' ','+',$address);
		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
		$output= json_decode($geocode);
	
		if($output->status=="ZERO_RESULTS"){
			$address = ($l->cidade);
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
			$output= json_decode($geocode);
		}

		

		$latitude = $output->results[0]->geometry->location->lat;

		$longitude = $output->results[0]->geometry->location->lng;

		}

		endforeach;

		?>





		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhPacKDpjq1hJOhnCP1vlB-4f9l2a8ER0&callback=initMap"></script>

		<script type="text/javascript">



			var map;

			var marker;

			var local;

			function initialize() {

				var lat = '<?php echo $latitude; ?>';

				var long = '<?php echo $longitude; ?>';



				var mapOptions = {

					zoom: 16,

					center: new google.maps.LatLng(lat, long),

					mapTypeId: google.maps.MapTypeId.ROADMAP

				};



				map = new google.maps.Map(document.getElementById('desaparecido-mapa'), mapOptions);





				local = new google.maps.LatLng(lat, long);

				marker_337 = new google.maps.Marker({

					map: map,

					draggable: false,

					clickable: true,

					animation: google.maps.Animation.DROP,

					position: local,

					title: 'guere'

				});

			}



			if(typeof google != 'undefined')

			{

				google.maps.event.addDomListener(window, 'load', initialize);

			}



		</script>



<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header"> <?php echo $titulo; ?></h1>

    </div>

</div>



<div class="row featurette">

    <div class="col-md-7">

		<div class="row">

			<?php foreach ($lista as $l): ?>

				<div class="span3">

					<a href="" id="imagem" class="" data-toggle="modal" data-target="#lightbox">

						<img src="<?php echo base_url('assets/upload/'.$l->foto);?>" height="300" width="300"/>	

					</a>



						<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

							<div class="modal-dialog">

								<button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>

								<div class="modal-content">

									<div class="modal-body">

										

										<img id="lightboxImagem" src="<?php echo base_url('assets/upload/'.$l->foto);?>" height="500" width = "568" />

										

									</div>

								</div>

							</div>

						</div>

						

						<span data-toggle="modal" data-target="#modalVi" >

						<button type="button" class="btn btn-large btn-primary span3 nomargin" id="btnVi" data-placement="right" data-toggle="tooltip" data-original-title="Clique aqui se você viu esta pessoa em algum lugar.">Vi esta pessoa!</button>

						</span>

						<span data-toggle="modal" data-target="#modalDenunciar">

						<button type="button" rel="317" class="btn btn-large btn-danger span3 nomargin" id="btn-denunciar" data-placement="right" data-toggle="tooltip" data-original-title="Clique aqui caso você afirme que este desaparecimento não é verídico.">Denunciar Abuso</button>

						</span>

						

						<div class="fb-share-button" data-href="http://localhost:8181/Finch/consulta/4" data-layout="button_count" data-size="large" data-mobile-iframe="true">

						<button type="button" class="btn btn-large btn-alert span3 nomargin" id="btnShare" data-placement="right" data-toggle="tooltip" data-original-title="Clique aqui para compartilhar essa publicação no facebook."><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FDesaparecidos-Torres-129101204311105%2FLocalhost%2Fconsulta%2F&amp;src=sdkpreparse">Compartilhar</a></button>

						</div>





					</div>

					

					<div class="col-md-7 col-md-push-1">

						

					

						<div class="span9 nomargin">

							

						</div>

						

						<h1>

						

							<?php echo $l->nome?> <?php echo $l->sobrenome?>	</h1>

							<h4><strong>Familiares procuram em</strong> <?php echo $l->cidade?> - <?php echo $l->estado?></h4>

							

							<div class="span9 linha-desaparecido">Situação: <strong><?php echo $l->situacao?></strong></div>

							<div class="span9 linha-desaparecido">Idade: <strong><?php echo $l->idade?> anos</strong></div>

							<div class="span9 linha-desaparecido">Sexo: <strong><?php echo $l->sexo?></strong></div>

							<div class="span9 linha-desaparecido">Endereço da Ocorrência: <strong><?php echo $l->endereco?></strong></div>

							<div class="span9 linha-desaparecido">Data da Ocorrência: <strong><?php echo $l->desaparecimento?></strong></div>

							<div class="span9 linha-desaparecido">Altura: <strong><?php echo $l->altura?>m</strong></div>

							<div class="span9 linha-desaparecido">Peso: <strong><?php echo $l->peso?> kg</strong></div>

							<div class="span9 linha-desaparecido">Pele: <strong><?php echo $l->pele?></strong></div>

							<div class="span9 linha-desaparecido">Cabelo: <strong><?php echo $l->cabelo?></strong></div>

							<div class="span9 linha-desaparecido">Olhos: <strong><?php echo $l->olhos?></strong></div>

							<div class="span9 linha-desaparecido">Possui necessidades especiais?: <strong><?php echo $l->necessidadesEspeciais?></strong></div>

							<div class="span9 linha-desaparecido">Telefone para contato: <strong><?php echo $l->telefone?></strong></div>

							<div class="span9 linha-desaparecido">Observações: <strong><?php echo $l->observacao?></strong></div>

							

							<div class="span8 linha-desaparecido">

								<div id="desaparecido-mapa"></div>

							</div>





						</div>



						<img src="" id="desaparecido-img-ampliada">



					<?php endforeach ?>



			</div>

		</div>

		

		<div class="modal fade" id="modalVi" role="dialog">

	      <div class="modal-dialog">



	        <!-- Modal content-->

	        <div class="modal-content">

	          <div class="modal-header">

	            <button type="button" class="close" data-dismiss="modal">&times;</button>

	            <h4 style="color:darkturquoise;"><span class="glyphicon glyphicon-envelope"></span> Eu vi esta pessoa! </h4>

	          </div>

	          

	          <div class="modal-body">

	            <form action="<?= base_url('emailViEstaPessoa/'.$l->idPessoa);?>" id="mailVi" method="post" role="form">

	              	<div class="form-group">

	                	<label for="nome"> E-mail </label>

	                	<input type="text-box" class="form-control" placeholder="Informe seu e-mail" name="e-mail" id="e-mail">	

	              	</div>

	              	

	              	<div class="form-group">

	                	<label for="situacao"> Situação </label>

	                	<select name="situacao" id="situacao" class="form-control">

	                	   <option value="Encontrado">Encontrado</option>

	                	   <option value="Vi esta pessoa!">Eu vi esta pessoa!</option>



	                	</select>

	              	</div>

	         

	          	

	         			<label for="message"> Mais informações </label>

	          			<textarea class="form-control" type="textarea" name="message" id="message" maxlength="532" rows="7"></textarea>

	          	



	          		<div class="modal-footer">

	            		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>

	  					<button type="submit" class="btn btn-primary">Enviar</button>

	              	</div>

	            </form>

	        </div>

	      </div>

	   	 </div>

	    </div> 





	    <div class="modal fade" id="modalDenunciar" role="dialog">

	      <div class="modal-dialog">

	        <div class="modal-content">

	          <div class="modal-header">

	            <button type="button" class="close" data-dismiss="modal">&times;</button>

	            <h4 style="color:red;"><span class="glyphicon glyphicon-envelope"></span> Denunciar abuso </h4>

	          </div>

	         

	         <div class="modal-body">

	          <form action="<?= base_url('emailCadastroIndevido/'.$l->idPessoa);?>" method="post" role="form">

	              	<div class="form-group">

	                	<label for="nome"> E-mail </label>

	                	<input type="text-box" class="form-control" placeholder="Informe seu e-mail" name="e-mail" id="e-mail">	

	              	</div>

	              	

	              	<div class="form-group">

	                	<label for="motivo"> Motivo da denúncia </label>

	                	<select name="motivo" id="motivo" class="form-control">

	                	   <option value="Pessoa não existe">Pessoa não existe</option>

	                	   <option value="Cadastro indevido">Cadastro indevido</option>



	                	</select>

	              	</div>

	         

	          		<div class="form-group">

	         			<label for="message"> Mais informações </label>

	          			<textarea class="form-control" type="textarea" name="message" id="message" maxlength="532" rows="7"></textarea>

	          		</div>



	          		<div class="modal-footer">

	            		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>

	  					<button type="submit" class="btn btn-primary">Enviar</button>

	              	</div>

	             </form>

	         </div>

            

	       </div>

	      </div>

	    </div> 

</div>

    



		