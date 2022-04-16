<?php

    namespace MF\Controller; // define o namespace (diretório que é uma extensão de IndexController)

    abstract class Action {
       
        protected $view;

        public function __construct(){
            $this->view = new \stdClass(); // classe nativa do php (cria padrôes de objetos)
            // cria objetos vazios preenchidos dinamicamente
        }

        protected function render($view, $layout) { // recebe as views e layout e faz require do layout
            // criou-se atributo vazio chamado page e insere a view
            $this->view->page = $view;
            if(file_exists("../App/Views/".$layout.".phtml")){  // estratégia para evitar conflito // verifica se existe o layout
                require_once "../App/Views/".$layout.".phtml"; // faz a renderização do layout da primeira vez que é chamado
            }else {
                $this->content(); // se o layout n existir, chama a função content renderizando apenas o conteúdo dentro dela
            }
            
        }

        protected function content(){ // função que busca a view dentro dos diretório view de forma dinâmica
            // função de renderização, insere dinâmicamente o conteúdo phtml das views no layout

            $classAtual = get_class($this); // retorna o nome da classe : App\Controllers\IndexController.php
            $classAtual = str_replace('App\\Controllers\\', '', $classAtual); // subistituindo por vazio a saida: IndexController
            $classAtual = strtolower(str_replace('Controller', '', $classAtual));  // Substitui o primeiro parâmetro por vazio, retornando: index
            //strtolower: caixa baixa, retorna em lowercase

            // require da pagina App/views/index/paginaPassada.phtml
            require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
        }
    }

?>