<?php
	class Teteu_test extends CI_Controller{
		function _remap($method) {
			switch ($method) {
				case 'add':
					$this->add();
					break;

				case 'edit':
					$this->edit();
					break;

				case 'del':
					$this->del();
					break;

				default:
					$this->index();
					break;
			}
		}

	    function index() {
	    	$this->load->model('teteu_bd', '', TRUE);
			$data['query'] = $this->teteu_bd->busca_todos();

			$this->load->view('listagem', $data);
	    }

	    function add() {
	    	if(!isset($_POST['nome'])) {
	    		$this->load->view('add');

	    	} else {
	    		$this->load->model('teteu_bd', '', TRUE);
                $this->teteu_bd->setNome($this->input->post('nome'));
                $this->teteu_bd->setIdade($this->input->post('idade'));

                if($this->teteu_bd->inserir()) {
                    echo '<script>alert("Inserido com Sucesso!");</script>';
                     header('location:index');

                } else {
                    echo '<script>alert("Erro ao Salvar");</script>';
                }
	    	}
	    }

	    function edit() {
	    	if(!isset($_POST['nome'])) {
	    		$this->load->model('teteu_bd', '', TRUE);
	    		$this->teteu_bd->setID($_GET['id']);
	    		$data = $this->teteu_bd->busca_um();
	    		$this->load->view('edit', $data);

	    	} else {
	    		$this->load->model('teteu_bd', '', TRUE);
 
                $this->teteu_bd->setID($_GET['id']);
                $this->teteu_bd->setNome($this->input->post('nome'));
                $this->teteu_bd->setIdade($this->input->post('idade'));

                if($this->teteu_bd->atualiza()) {
                    echo '<script>alert("Atualizado com Sucesso!");</script>';
                    header('location:index');

                } else {
                    echo '<script>alert("Erro ao Atualizar");</script>';
                }
	    	}
	    }

	    function del() {
	    	$this->load->model('teteu_bd', '', TRUE);
	    	$this->teteu_bd->setID($_GET['id']);
	    	if($this->teteu_bd->exclui()) {
                echo '<script>alert("Excluido com Sucesso!");</script>';
                header('location:index');

            } else {
                echo '<script>alert("Erro ao Excluir");</script>';
            }
	    }
	}
?>	