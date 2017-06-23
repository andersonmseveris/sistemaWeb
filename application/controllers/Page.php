	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Page extends CI_Controller {

		function __construct(){
			parent::__construct();

		}

		public function cadastro()
		{
			$titulo['titulo'] = 'Cadastro';
			$this->template->load('template/base', "cadastro", $titulo);
		}

		public function completarCadastro(){
		
		$cpf = $_POST['inputCPF'];

	    // Verifica se um número foi informado
	    if(empty($cpf)) {
	        return false;
	    }
	 
	    // Elimina possivel mascara
	  
	    $cpf = preg_replace('/[^0-9]/', '', $cpf);
	    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	     
	    // Verifica se o numero de digitos informados é igual a 11 
	    if (strlen($cpf) != 11) {
	        return false;
	    }
	    // Verifica se nenhuma das sequências invalidas abaixo 
	    // foi digitada. Caso afirmativo, retorna falso
	    else if ($cpf == '00000000000' || 
	        $cpf == '11111111111' || 
	        $cpf == '22222222222' || 
	        $cpf == '33333333333' || 
	        $cpf == '44444444444' || 
	        $cpf == '55555555555' || 
	        $cpf == '66666666666' || 
	        $cpf == '77777777777' || 
	        $cpf == '88888888888' || 
	        $cpf == '99999999999') {
	        redirect('cadastro');
	     // Calcula os digitos verificadores para verificar se o
	     // CPF é válido
	     } else {   
	         
	        for ($t = 9; $t < 11; $t++) {
	             
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }
	            $d = ((10 * $d) % 11) % 10;
	            if ($cpf{$c} != $d) {
	            	redirect('cadastro');
	            	
	            }
	        }	 

	        $this->load->model('Cidades_model');
        	$dados['titulo']   = 'Completar Cadastro';
        	$dados['estados'] = $this->Cidades_model->getEstados();	

	 		$this->template->load('template/base', "completarCadastro", $dados);
	        return true;
	    }

		}

 		public function getCidades($id) {
         
        $this->load->model('Cidades_model');
         
        $cidades = $this->Cidades_model->getCidades($id);

        if(empty ($cidades))
        	return '{ "nome": "Nenhuma cidade encontrada" }';

        echo json_encode($cidades);
        return;
         
    	}


		public function desaparecidos()
		{
			$titulo['titulo'] = 'desaparecidos';
			$this->template->load('template/base', "desaparecidos", $titulo);
		}

		public function infoApoio()
		{
			$titulo['titulo'] = 'Informações de Apoio';
			$this->template->load('template/base', "infoApoio", $titulo);
		}

		public function linksUteis()
		{
			$titulo['titulo'] = 'Links Úteis';
			$this->template->load('template/base', "linksUteis", $titulo);
		}

		public function parcerias()
		{
			$titulo['titulo'] = 'Parceiros';
			$this->template->load('template/base', "parcerias", $titulo);
		}


		public function consulta()
		{
			$titulo['titulo'] = 'Consulta';
			$this->template->load('template/base', "consulta", $titulo);
		}

		public function captcha(){

			$this->template->load('template/base', "captcha");

		}


	}


		