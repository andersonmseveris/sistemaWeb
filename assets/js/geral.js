msg = function(mensagem, tipo)
{
    $('#msg-toast').removeClass().addClass('alert alert-'+tipo).show();
    $('#msg-toast-content').html(mensagem);
    window.scrollTo(0,0);
};

modal_confirm = function(mensagem,callback)
{
	html_modal = ' \
		<div id="modal-confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-label" aria-hidden="true"> \
			<div class="modal-header"> \
    			<h3 id="modal-confirm-label">Confirmação</h3> \
  			</div> \
			<div class="modal-body"> \
				<p>'+mensagem+'</p> \
			</div> \
			<div class="modal-footer"> \
				<button id="btn-cancelar" class="btn">Cancelar</button> \
				<button id="btn-confirmar" class="btn btn-primary">Confirmar</button> \
			</div> \
		</div> \
	';

	$('body').append($(html_modal));
	$('#modal-confirm').modal('show');

	$('#btn-confirmar').click(function(){
		callback();
		$('#modal-confirm').modal('hide');
		$('#modal-confirm').remove();
	});

	$('#btn-cancelar').click(function(){
		$('#modal-confirm').modal('hide');
		$('#modal-confirm').remove();
	});
};

modal_msg = function(titulo,mensagem){
	var _args = arguments;
	html_modal = ' \
		<div id="modal-msg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-msg-label" aria-hidden="true"> \
			<div class="modal-header"> \
				<button type="button" class="close modal-msg-close">×</button> \
    			<h3 id="modal-msg-label">'+titulo+'</h3> \
  			</div> \
			<div class="modal-body"> \
				<p>'+mensagem+'</p> \
			</div> \
			<div class="modal-footer"> \
				<button class="btn modal-msg-close">Fechar</button> \
			</div> \
		</div> \
	';

	$('body').append($(html_modal));
	$('#modal-msg').modal('show');

	$('.modal-msg-close').click(function(){
		$('#modal-msg').modal('hide');
		$('#modal-msg').remove();
	});

	if(typeof _args[3] != 'undefined' && _args[3])
	{
		_args[3]();
	}
};