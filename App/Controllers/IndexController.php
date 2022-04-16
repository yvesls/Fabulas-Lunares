<?php

    namespace App\Controllers;

    // recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    // models 
    use App\Models\Produto; // chamando a extensão da classe controller
    use App\Models\Dicas; // chamando a extensão da classe controller

    class IndexController extends Action {

        public function index(){ // função responsável por tratar a página index e o que ela irá receber e inserir 
            
            // $produto = Container::getModel('Produto');  // realizando a instãncia do bd retornando a conexão com bd deste model
            // 
            // $produtos = $produto->getProdutos(); // retorna os dados de model

            // $this->view->dados = $produtos; // cria um novo atributo vazio que recebe os dados 

            $this->render('index', 'layout'); // chama o diretório que possui o método que faz o require dá página
            // a ser exibida
        }

        public function central_adm(){ 

            $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

            $this->render('central_adm', 'layout_login_adm'); // chama o diretório que possui o método que faz o require dá página
            // a ser exibida
        }

        public function contatos(){

            // $info = Container::getModel('Info');

            // $informacoes = $info->getInfo();

            // $this->view->dados = $informacoes;

            $this->render('contatos', 'layout');
        }

        public function dicas(){ 

            $dica = Container::getModel('Dica');

            $informacoes = $dica->getDicas();

            $this->view->dados = $informacoes;

            $this->render('dicas', 'layout');
        }

        public function traducoes(){ 
            $this->render('traducoes', 'layout');
        }

        public function parceiros(){ 
            $this->render('parceiros', 'layout');
        }

        public function natal(){ 
            $this->render('natal', '');
        }
    }
?>