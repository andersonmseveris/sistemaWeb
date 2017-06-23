<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidades_model extends CI_Model {

function getEstados() {
         
        return $this->db->get('estado')->result();
         
    }
 
function getCidades($id) {
         
        return $this->db->select('cidade.nome')
                        ->from('cidade')
                        ->join('estado', 'cidade.estado = estado.id')
                        ->where( array('estado.id' => $id) )
                        ->get()->result();
         
    }


function getEstadosId($id) {
         
		return $this->db->select('estado.nome')
						->from('estado')
						->where( array('estado.id' => $id) )
						->get()->result();
   }  
	

}

/* End of file cidades_model.php */
/* Location: ./application/models/cidades_model.php */