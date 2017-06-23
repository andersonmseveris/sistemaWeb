	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas_controller extends CI_Controller {

	function __construct(){
	parent::__construct();
	}


	public function listarDesaparecidos()
	{
		$data['titulo'] = 'Desaparecidos';
		$this->load->model('Pessoas_model', 'pessoas');
		$data['lista'] = $this->pessoas->listar();
		$data['count'] = $this->pessoas->numPessoasDesaparecidas();
		$this->template->load('template/base', "desaparecidos", $data);
	}

		public function listarEncontrados()
	{
		$data['titulo'] = 'Encontrados';
		$this->load->model('Pessoas_model', 'pessoas');
		$data['lista'] = $this->pessoas->listarEncontrados();
		$data['count'] = $this->pessoas->numPessoasEncontradas();
		$this->template->load('template/base', "encontrados", $data);
	}


	public function consultarDesaparecidos($id)
	{
		$data['titulo'] = 'Consulta';
		$this->load->model('Pessoas_model', 'pessoas');
		$data['lista'] = $this->pessoas->consultar($id);

		$this->template->load('template/base', "consulta", $data);
	}


		public function consultarUltimosCadastros()
	{
		$data['titulo'] = 'Início';
		$this->load->model('Pessoas_model', 'pessoas');
		$data['lista'] = $this->pessoas->consultarUltimosRegistros();
		$data['lista2'] = $this->pessoas->consultarUltimosEncontrados();
		$data['numD'] = $this->pessoas->numPessoasDesaparecidas();
		$data['numE'] = $this->pessoas->numPessoasEncontradas();
		$this->template->load('template/base', "inicio", $data);
	}


		public function consultarDesaparecidosFiltro(){
		$data['titulo'] = 'Desaparecidos';
		$this->load->model('Pessoas_model', 'pessoas');

		if($_POST['nome'] != null){
		$sql = $_POST['nome'];
		$data['lista'] = $this->pessoas->listarConsultaFiltroNome($sql);
		$this->template->load('template/base', "desaparecidos", $data);
	
		}else{
		if($_POST['situacao'] != null){
		$sql = $_POST['situacao'];
		$data['lista'] = $this->pessoas->listarConsultaFiltroSituacao($sql);
		$this->template->load('template/base', "desaparecidos", $data);
	}
		else{
		if($_POST['cidade'] != null){
		$sql = $_POST['cidade'];
		$data['lista'] = $this->pessoas->listarConsultaFiltroCidade($sql);
		$this->template->load('template/base', "desaparecidos", $data);


		}else{
		redirect('desaparecidos');

	}	

	}
	}
}


		public function cadastroPessoa(){


		$estado = $_POST['inputEstado'];
		
		$this->load->model("Cidades_model");
		$inputEstado = $this->Cidades_model->getEstadosId($estado);
	
		$config = array(
			'upload_path' => 'assets/upload/',
			'allowed_types' => 'jpg|jpeg|png|bmp',
			'max_size' => 0,
			'filename' => url_title($this->input->post('inputImagem')),
			'encrypt_name' => true 
			);
		$this->load->library('upload', $config);

		if($this->upload->do_upload('inputImagem')){
			$this->db->insert('cadastropessoa', array (
				'nome' => $this->input->post('inputNome'),
				'sobrenome' => $this->input->post('inputSobrenome'),
				'desaparecimento' => $this->input->post('inputDesaparecimento'),
				'idade' => $this->input->post('inputIdade'),
				'sexo' => $this->input->post('inputSexo'),
				'cidade' => $this->input->post('inputCidade'),
				'estado' => $inputEstado[0]->nome,
				'observacao' => $this->input->post('inputObservacao'),
				'situacao' => $this->input->post('inputSituacao'),
				'endereco' => $this->input->post('inputEndereco'),
				'altura' => $this->input->post('inputAltura'),
				'peso' => $this->input->post('inputPeso'),
				'pele' => $this->input->post('inputPele'),
				'cabelo' => $this->input->post('inputCabelo'),
				'olhos' => $this->input->post('inputOlhos'),
				'necessidadesEspeciais' => $this->input->post('inputNecessidadesEspeciais'),
				'telefone' => $this->input->post('inputTelefone'),
				'foto' => $this->upload->file_name
				));

		}
		$this->data = array (
			'get_image' => $this->db->get('cadastropessoa')
			);

		redirect('cadastro');

}


			public function emailSend($id){

		//Variaveis de POST 
		//====================================================
		$id=$id;
		$email = $_POST['e-mail'];
		$situacao = $_POST['situacao'];
		$mensagem = $_POST['message'];
		
		//====================================================
	
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 	
		$email_remetente = "".$email; // deve ser uma conta de email do seu dominio 
		//====================================================
	
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "chaoslune@hotmail.com"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "".$situacao; // Este será o assunto da mensagem
		//====================================================
	
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "ID: ".$id."\n";
		$email_conteudo .= "".$mensagem; 
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
	
		//Enviando o email 
		//==================================================== 
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
					echo "</b>E-Mail enviado com sucesso!</b>"; 

					$data['titulo'] = 'Consulta';
					$this->load->model('Pessoas_model', 'pessoas');
					$data['lista'] = $this->pessoas->consultar($id);

					$this->template->load('template/base', "consulta", $data);
					} 
			else{ 
					echo "</b>Falha no envio do E-Mail!</b>"; 
					echo "\n";
					echo "".$email_conteudo."|  ".$email_destinatario."|  ".$email_assunto;
				} 
		//====================================================


	}


	public function emailViEstaPessoa($id){

		//Variaveis de POST 
		//====================================================
		$id=$id;
		$email = $_POST['e-mail'];
		$situacao = $_POST['situacao'];
		$mensagem = $_POST['message'];
		
		//====================================================
	
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 	
		$email_remetente = "".$email; // deve ser uma conta de email do seu dominio 
		//====================================================
	
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "chaoslune@hotmail.com"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "".$situacao; // Este será o assunto da mensagem
		//====================================================
	
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "ID: ".$id."\n";
		$email_conteudo .= "".$mensagem; 
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
	
		//Enviando o email 
		//==================================================== 
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
					echo "</b>E-Mail enviado com sucesso!</b>"; 

					$data['titulo'] = 'Consulta';
					$this->load->model('Pessoas_model', 'pessoas');
					$data['lista'] = $this->pessoas->consultar($id);

					$this->template->load('template/base', "consulta", $data);
					} 
			else{ 
					echo "</b>Falha no envio do E-Mail!</b>"; 
					echo "\n";
					echo "".$email_conteudo."|  ".$email_destinatario."|  ".$email_assunto;
				} 
		//====================================================


	}
		

	public function emailCadastroIndevido($id){

		//Variaveis de POST 
		//====================================================
		$id=$id;
		$email = $_POST['e-mail'];
		$motivo = $_POST['motivo'];
		$mensagem = $_POST['message'];
		
		//====================================================
	
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 	
		$email_remetente = "".$email; // deve ser uma conta de email do seu dominio 
		//====================================================
	
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "chaoslune@hotmail.com"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "".$motivo; // Este será o assunto da mensagem
		//====================================================
	
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "ID: ".$id."\n";
		$email_conteudo .= "".$mensagem; 
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
	
		//Enviando o email 
		//==================================================== 
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
					echo "</b>E-Mail enviado com sucesso!</b>"; 

					$data['titulo'] = 'Consulta';
					$this->load->model('Pessoas_model', 'pessoas');
					$data['lista'] = $this->pessoas->consultar($id);

					$this->template->load('template/base', "consulta", $data);
					} 
			else{ 
					echo "</b>Falha no envio do E-Mail!</b>"; 
					echo "\n";
					echo "".$email_conteudo."|  ".$email_destinatario."|  ".$email_assunto;
				} 
		//====================================================


	}	
	

	/*public function cadastroPessoa(){

		$this->load->model('Pessoas_model', 'pessoas');
					$sql = array('nome' => $this->input->post('inputNome'),
				'sobrenome' => $this->input->post('inputSobrenome'),
				'desaparecimento' => $this->input->post('inputDesaparecimento'),
				'idade' => $this->input->post('inputIdade'),
				'sexo' => $this->input->post('inputSexo'),
				'cidade' => $this->input->post('inputCidade'),
				'estado' => $this->input->post('inputEstado'),
				'observacao' => $this->input->post('inputObservacao'),
				'situacao' => $this->input->post('inputSituacao'),
				'endereco' => $this->input->post('inputEndereco'),
				'altura' => $this->input->post('inputAltura'),
				'peso' => $this->input->post('inputPeso'),
				'pele' => $this->input->post('inputPele'),
				'cabelo' => $this->input->post('inputCabelo'),
				'olhos' => $this->input->post('inputOlhos'),
				'necessidadesEspeciais' => $this->input->post('inputNecessidadesEspeciais'),
				'telefone' => $this->input->post('inputTelefone'),
				'foto' => $mysqlImg
			);

		$this->pessoas->insert($sql);

		redirect('cadastro');

		}
	}
*/


	public function download(){
		$this->load->helper('download');
		$arquivoPath = 'application/captcha.rar';
 		force_download($arquivoPath, null);
	}

	public function dashboard(){
		$this->load->model("Pessoas_model", "pessoas");
		$data['titulo'] = 'Dashboard';
		$data['lista'] = $this->pessoas->getDashboard();
		$data['lista2'] = $this->pessoas->getDashboard2();
		$data['lista3'] = $this->pessoas->getDashboard3();
		$this->template->load('template/base', 'dashboard', $data);

	}





	public function Salvar(){
		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('cpf');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($cadastrousuario);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Inserir($contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('home',$dados);
	}


	public function Editar(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();
		// Recupera os dados do registro a ser editado
		$dados['contato'] = $this->contatos_model->GetById($id);
		// Carrega a view passando os dados do registro
		$this->load->view('editar',$dados);
	}

	public function Atualizar(){
		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Atualizar($cadastrousuario['cpf'],$contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['contato'] = $this->contatos_model->GetById($cadastrousuario['cpf']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato atualizado com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}
		// Carrega a view para edição
		$this->load->view('editar',$dados);
	}

	public function Excluir(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();
		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->contatos_model->Excluir($id);
		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}

	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
		}
		$this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
		$this->form_validation->set_rules('email', 'Email', $rules['email']);
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */