	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pessoas_model extends CI_Model {

		public $table = "cadastropessoa";

		public function listar(){

			$query = "select * from cadastropessoa Order By nome ASC";

			return $this->db->query($query)->result();
		}

		public function listarEncontrados(){

			$query = "select * from pessoaencontrada Order By nome ASC";

			return $this->db->query($query)->result();
		}


		public function consultar($id = null){

			$query = "select * from cadastropessoa where idPessoa =".$id;

			if(!$this->db->query($query)->result()){
				$query = "select * from pessoaencontrada where idPessoa =".$id;	
				return $this->db->query($query)->result();			
			}else{
			return $this->db->query($query)->result();
			}
		}

		public function listarConsultaFiltroNome($nome = null){

			
			$this->db->like('nome', $nome);
		
			return $this->db->get('cadastropessoa')->result(); 


		}
		public function listarConsultaFiltroSituacao($situacao = null){

			
			$this->db->like('situacao', $situacao);
		
			return $this->db->get('cadastropessoa')->result(); 


		}
		public function listarConsultaFiltroCidade($cidade = null){

			
			$this->db->like('cidade', $cidade);
		
			return $this->db->get('cadastropessoa')->result(); 


		}


		public function consultarUltimosRegistros(){
			$query = "select * from cadastropessoa order by idPessoa desc limit 3";

			return $this->db->query($query)->result();
		}

		public function consultarUltimosEncontrados(){
			$query = "select * from pessoaencontrada order by idPessoa desc limit 2";

			return $this->db->query($query)->result();
		}

		public function insert($sql){

			return $this->db->insert($this->table, $sql);
		}

		public function carregar($limit){
		
			
			$query = "select * from cadastropessoa order by nome asc limit ".$limit;

			return $this->db->query($query)->result();
		}


		public function numPessoasDesaparecidas(){

			$query = "select * from cadastropessoa";
			return $this->db->query($query)->num_rows();

		}

		public function numPessoasEncontradas(){

			$query = "select * from pessoaencontrada";
			return $this->db->query($query)->num_rows();
		}



		function insert_data($name, $path_name){
	    $data = array(
	                  'name'    => $name,
	                  'path'    => $path_name
	                 );

	    $this->db->insert('table', $data);

	    return $this->db->insert_id();
		}

		
		function getDashboard(){
		$data['AC'] = $this->db->query("select * from cadastropessoa where estado like '%Acre'")->num_rows();
		$data['AL'] = $this->db->query("select * from cadastropessoa where estado like '%Alagoas'")->num_rows();
		$data['AP'] = $this->db->query("select * from cadastropessoa where estado like '%Amapá'")->num_rows();
		$data['AM'] = $this->db->query("select * from cadastropessoa where estado like '%Amazonas'")->num_rows();
		$data['BA'] = $this->db->query("select * from cadastropessoa where estado like '%Bahia'")->num_rows();
		$data['CE'] = $this->db->query("select * from cadastropessoa where estado like '%Ceará'")->num_rows();
		$data['DF'] = $this->db->query("select * from cadastropessoa where estado like '%Distrito Federal'")->num_rows();
		$data['ES'] = $this->db->query("select * from cadastropessoa where estado like '%Espírito Santo'")->num_rows();
		$data['GO'] = $this->db->query("select * from cadastropessoa where estado like '%Goiás'")->num_rows();
		$data['MA'] = $this->db->query("select * from cadastropessoa where estado like '%Maranhão'")->num_rows();
		$data['MT'] = $this->db->query("select * from cadastropessoa where estado like '%Mato Grosso'")->num_rows();
		$data['MS'] = $this->db->query("select * from cadastropessoa where estado like '%Mato Grosso do Sul'")->num_rows();
		$data['MG'] = $this->db->query("select * from cadastropessoa where estado like '%Minas Gerais'")->num_rows();
		$data['PA'] = $this->db->query("select * from cadastropessoa where estado like '%Pará'")->num_rows();
		$data['PB'] = $this->db->query("select * from cadastropessoa where estado like '%Paraíba'")->num_rows();
		$data['PR'] = $this->db->query("select * from cadastropessoa where estado like '%Paraná'")->num_rows();
		$data['PE'] = $this->db->query("select * from cadastropessoa where estado like '%Pernambuco'")->num_rows();
		$data['PI'] = $this->db->query("select * from cadastropessoa where estado like '%Piauí'")->num_rows();
		$data['RJ'] = $this->db->query("select * from cadastropessoa where estado like '%Rio de Janeiro'")->num_rows();
		$data['RN'] = $this->db->query("select * from cadastropessoa where estado like '%Rio Grande do Norte'")->num_rows();
		$data['RS'] = $this->db->query("select * from cadastropessoa where estado like '%Rio Grande do Sul'")->num_rows();
		$data['RO'] = $this->db->query("select * from cadastropessoa where estado like '%Rondônia'")->num_rows();
		$data['RR'] = $this->db->query("select * from cadastropessoa where estado like '%Roraima'")->num_rows();
		$data['SC'] = $this->db->query("select * from cadastropessoa where estado like '%Santa Catarina'")->num_rows();
		$data['SP'] = $this->db->query("select * from cadastropessoa where estado like '%São Paulo'")->num_rows();
		$data['SE'] = $this->db->query("select * from cadastropessoa where estado like '%Sergipe'")->num_rows();
		$data['TO'] = $this->db->query("select * from cadastropessoa where estado like '%Tocatins'")->num_rows();
		
		return $data;

		}

		function getDashboard2(){
		$data['AC'] = $this->db->query("select * from pessoaencontrada where estado like '%Acre'")->num_rows();
		$data['AL'] = $this->db->query("select * from pessoaencontrada where estado like '%Alagoas'")->num_rows();
		$data['AP'] = $this->db->query("select * from pessoaencontrada where estado like '%Amapá'")->num_rows();
		$data['AM'] = $this->db->query("select * from pessoaencontrada where estado like '%Amazonas'")->num_rows();
		$data['BA'] = $this->db->query("select * from pessoaencontrada where estado like '%Bahia'")->num_rows();
		$data['CE'] = $this->db->query("select * from pessoaencontrada where estado like '%Ceará'")->num_rows();
		$data['DF'] = $this->db->query("select * from pessoaencontrada where estado like '%Distrito Federal'")->num_rows();
		$data['ES'] = $this->db->query("select * from pessoaencontrada where estado like '%Espírito Santo'")->num_rows();
		$data['GO'] = $this->db->query("select * from pessoaencontrada where estado like '%Goiás'")->num_rows();
		$data['MA'] = $this->db->query("select * from pessoaencontrada where estado like '%Maranhão'")->num_rows();
		$data['MT'] = $this->db->query("select * from pessoaencontrada where estado like '%Mato Grosso'")->num_rows();
		$data['MS'] = $this->db->query("select * from pessoaencontrada where estado like '%Mato Grosso do Sul'")->num_rows();
		$data['MG'] = $this->db->query("select * from pessoaencontrada where estado like '%Minas Gerais'")->num_rows();
		$data['PA'] = $this->db->query("select * from pessoaencontrada where estado like '%Pará'")->num_rows();
		$data['PB'] = $this->db->query("select * from pessoaencontrada where estado like '%Paraíba'")->num_rows();
		$data['PR'] = $this->db->query("select * from pessoaencontrada where estado like '%Paraná'")->num_rows();
		$data['PE'] = $this->db->query("select * from pessoaencontrada where estado like '%Pernambuco'")->num_rows();
		$data['PI'] = $this->db->query("select * from pessoaencontrada where estado like '%Piauí'")->num_rows();
		$data['RJ'] = $this->db->query("select * from pessoaencontrada where estado like '%Rio de Janeiro'")->num_rows();
		$data['RN'] = $this->db->query("select * from pessoaencontrada where estado like '%Rio Grande do Norte'")->num_rows();
		$data['RS'] = $this->db->query("select * from pessoaencontrada where estado like '%Rio Grande do Sul'")->num_rows();
		$data['RO'] = $this->db->query("select * from pessoaencontrada where estado like '%Rondônia'")->num_rows();
		$data['RR'] = $this->db->query("select * from pessoaencontrada where estado like '%Roraima'")->num_rows();
		$data['SC'] = $this->db->query("select * from pessoaencontrada where estado like '%Santa Catarina'")->num_rows();
		$data['SP'] = $this->db->query("select * from pessoaencontrada where estado like '%São Paulo'")->num_rows();
		$data['SE'] = $this->db->query("select * from pessoaencontrada where estado like '%Sergipe'")->num_rows();
		$data['TO'] = $this->db->query("select * from pessoaencontrada where estado like '%Tocatins'")->num_rows();
		
		return $data;

		}
		
		function getDashboard3(){
			$data['0-10'] = $this->db->query("select idade from cadastropessoa where idade between 0 and 10")->num_rows();
			$data['11-20'] = $this->db->query("select idade from cadastropessoa where idade between 11 and 20")->num_rows();
			$data['21-30'] = $this->db->query("select idade from cadastropessoa where idade between 21 and 30")->num_rows();
			$data['31-40'] = $this->db->query("select idade from cadastropessoa where idade between 31 and 40")->num_rows();
			$data['41-50'] = $this->db->query("select idade from cadastropessoa where idade between 41 and 50")->num_rows();
			$data['51-60'] = $this->db->query("select idade from cadastropessoa where idade between 51 and 60")->num_rows();
			$data['61-70'] = $this->db->query("select idade from cadastropessoa where idade between 61 and 70")->num_rows();
			$data['71-80'] = $this->db->query("select idade from cadastropessoa where idade between 71 and 80")->num_rows();
			$data['81-90'] = $this->db->query("select idade from cadastropessoa where idade between 81 and 90")->num_rows();
			$data['91-100'] = $this->db->query("select idade from cadastropessoa where idade between 91 and 100")->num_rows();
	
		return $data;	
		}

	
	}