<?php
	class Teteu_bd extends CI_Model {

		private $id;
		private $nome;
		private $idade;

		public function __construct() {
	        parent::__construct();
	    }

	    public function setID($id) {
	    	$this->id = $id;
	    }

	    public function getID() {
	    	return $this->id;
	    }

	    public function setNome($nome) {
	    	$this->nome = $nome;
	    }

	    public function getNome() {
	    	return $this->nome;
	    }

	    public function setIdade($idade) {
	    	$this->idade = $idade;
	    }

	    public function getIdade() {
	    	return $this->idade;
	    }

	    public function busca_todos() {
	        $query = $this->db->get('pessoas');
	        if ($query->num_rows() > 0) {
	        	foreach ($query->result_array() as $row) {
	                $data[] = $row;
            	}
            	return $data;

            } else {
            	return false;
            }
	    }

	    public function inserir() {
	    	$data['nome'] = $this->getNome();
	    	$data['idade'] = $this->getIdade();
	        return $this->db->insert('pessoas', $data);
	    }

	     public function busca_um() {
	        return $this->db->get_where('pessoas', array('id' => $this->getID()))->row();
	    }

	    public function atualiza() {
	    	$data['nome'] = $this->getNome();
	    	$data['idade'] = $this->getIdade();
	        $this->db->update('pessoas', $data, array('id' => $this->getID()));
	    }

	    public function exclui() {
	    	return $this->db->delete('pessoas', array('id' => $this->getID()));
	    }
    }
?>