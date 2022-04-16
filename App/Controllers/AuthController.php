<?php

namespace App\Controllers;

//os recursos do miniframework (abristação de instancias)
use MF\Controller\Action; 
use MF\Model\Container;

class AuthController extends Action {


	public function autenticar() { // metodo que representa a action autenticar
		
		if($_POST['email'] == "souzalavs@gmail.com" && $_POST['senha'] == "hades123"){
            session_start();
            
            $_SESSION['senha']  =  "hades123";

            header('Location: /adm');
        }else {
			header('Location: /central_adm?login=erro'); // força o redirecionamento para página raiz apresentando error
		}
	}

	// para destruir o login
	public function sair() { 
		session_start(); // como estamos trabalhando com seção, precisa startar sempre
		session_destroy(); // destroi a seção
		header('Location: /'); // renderiza pra index
	}
}