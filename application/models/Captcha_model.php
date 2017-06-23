	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Captcha_model extends CI_Model {
	public $table = "cadastropessoa";

	public function getCaptcha(){
			$sql = $this->db->query("select idPessoa from cadastropessoa")->result();

			foreach ($sql as $s) {
				$array[] = $s->idPessoa;
			}
			$random = $array;
			$randomElement = $random[array_rand($random, 1)];
			$query = "select idPessoa, nome, sobrenome, foto from cadastropessoa where idPessoa =".$randomElement;
			return $this->db->query($query)->result();

		}	

	}
