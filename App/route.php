<?php
    // Front: 3° passo (2° se não contar o carregamento da aplicação)

    namespace App; // namespace compatível com o diretório

    use MF\init\Bootstrap; // chamando a extensão da classe routes

    class Route extends Bootstrap {

        // quais rotas a aplicacao possui
        protected function initRoutes() { // função que será interpretada pelo controller
            
            // configurando rotas (buscadas pelo navegador). Amarrando rotas.
            $routes['index'] = array (
                'route' => '/', // resposta na barra de pesquisa/buttons/etc
                'controller' => 'IndexController', // responsável pelo controler (encaminha)
                'action' => 'index' // ação tomada
            );

            $routes['dicas']= array (
                'route' => '/dicas', 
                'controller' => 'IndexController',
                'action' => 'dicas'
            );

            $routes['traducoes']= array (
                'route' => '/traducoes', 
                'controller' => 'IndexController',
                'action' => 'traducoes'
            );

            $routes['contatos']= array (
                'route' => '/contatos', 
                'controller' => 'IndexController',
                'action' => 'contatos'
            );

            $routes['parceiros']= array (
                'route' => '/parceiros', 
                'controller' => 'IndexController',
                'action' => 'parceiros'
            );

            $routes['central_adm']= array (
                'route' => '/central_adm', 
                'controller' => 'indexController',
                'action' => 'central_adm'
            );

            $routes['autenticar']= array (
                'route' => '/autenticar', 
                'controller' => 'AuthController',
                'action' => 'autenticar'
            );

            $routes['adm']= array (
                'route' => '/adm', 
                'controller' => 'AppController',
                'action' => 'adm'
            );

            $routes['adm_posts']= array (
                'route' => '/adm_posts', 
                'controller' => 'AppController',
                'action' => 'adm_posts'
            );

            $routes['adm_midia']= array (
                'route' => '/adm_midia', 
                'controller' => 'AppController',
                'action' => 'adm_midia'
            );

            $routes['adm_comentarios']= array (
                'route' => '/adm_comentarios', 
                'controller' => 'AppController',
                'action' => 'adm_comentarios'
            );

            $routes['adm_set_midia']= array (
                'route' => '/adm_set_midia', 
                'controller' => 'AppController',
                'action' => 'adm_set_midia'
            );

            $routes['recupera_midia']= array (
                'route' => '/recupera_midia', 
                'controller' => 'AppController',
                'action' => 'recupera_midia'
            );

            $routes['sair']= array (
                'route' => '/sair', 
                'controller' => 'AuthController',
                'action' => 'sair'
            );

            $this->setRoutes($routes); // Passa como parâmetro a rota
        }
    }

    /* Notas:

    Funções:

    - São os requisitos funcionais 
    - Interpreta a solicitação feita pelo navegador e a encaminha para o controller. 
    - Bootstrap é uma extenção de routes que contém apenas a parte lógica de interpretação de chamada e
    é linear (não precisa de muita manutenção ou alteração).

    .htaccess:
    
    - Possui regras que permitem a função adequada da parte das rotas.

    */

?>