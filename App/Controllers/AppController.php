<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

// configura as páginas restritas da aplicação de acordo com cada usuário
class AppController extends Action {


	public function adm() {
		$this->validaAutenticacao();
		$this->view->nome = 'Painel';
		$this->render('adm', 'layout_adm');
	}

	public function adm_posts() {
		$this->validaAutenticacao();
		$this->view->nome = 'Posts';
		$this->render('adm_posts', 'layout_adm');
	}

	public function adm_midia() {
		$this->validaAutenticacao();
		$this->view->nome = 'Mídia';
		$this->render('adm_midia', 'layout_adm');
	}

	public function adm_comentarios() {
		$this->validaAutenticacao();
		$this->view->nome = 'Comentários';
		$this->render('adm_comentarios', 'layout_adm');
	}

	public function validaAutenticacao(){
		session_start();
		if(!isset($_SESSION['senha']) || $_SESSION['senha'] == '') {

			header('Location: /central_adm?login=erro2');
		} 
	}
}
?>