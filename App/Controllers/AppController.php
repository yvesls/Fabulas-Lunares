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

	public function adm_set_midia() {

		$posts = Container::getModel('Posts');

		$extensao = strtolower(strrchr($_FILES['arquivo']['name'], '.'));
		$novo_nome = md5(time()).$extensao;
		$diretorio = "imagens/";

		$posts->__set('arquivo', $novo_nome);
		$posts->__set('descricao', $_POST['descricao']);
		$posts->__set('tamanho', $_POST['tamanho']);

		$posts->set_midia();
	
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

		$this->view->nome = 'Mídia';

		header('Location: /adm_midia');
	}

	public function recupera_midia() {

		$this->validaAutenticacao();
	
		$conexaoPosts = Container::getModel('Posts');
		// resgatando mensagem
		$conexaoPosts = $conexaoPosts->get_midia();
		$this->view->midias = $conexaoPosts;

		foreach($this->view->midias as $key=>$dados) {
			echo $dados['descricao'].'@@@y@@@'.$dados['imagem'].'@@@y@@@'.$dados['tamanho'].'@@@fim@@@';
		}
	}

	public function exclui_imagem() {
		$this->validaAutenticacao();

		$conexaoPosts = Container::getModel('Posts');
		
		
		$conexaoPosts->__set('src', $_POST['src']);
		$conexaoPosts->exclui_imagem_midia();
		
		$arquivo = "imagens/".$_POST['src'];
		$resultado = unlink($arquivo);
		var_dump( $resultado );

		$this->view->nome = 'Mídia';
	}
}
?>