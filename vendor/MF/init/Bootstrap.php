<?php

    namespace MF\init;

    abstract class Bootstrap {
        private $routes;

        abstract protected function initRoutes(); // chama a função que inicia a rota

        public function __construct(){ // função construct: executa no momento em que a instância do método é feito com base na classe route (em index.html)
            $this->initRoutes(); // executa o método (conf array routes)
            $this->run($this->getUrl()); // executa o método run (passando a url acessada pelo usuário)
        }

        public function getRoutes(){ // retorna rota passada
            return $this->routes;
        }

        public function setRoutes(array $routes){ // seta rota passada em route, pela função initRoutes
            $this->routes = $routes;
        }

        protected function run($url) { // método que executa a instãncia dinâmicamente

            foreach ($this->getRoutes() as $key => $route) { // recupera o atributo routes que são os dados contidos lá
                // se for acessado o método index, este parâmetro sera recebido na url, foreach busca, 
                // pra cada indice, se a url é compatível pra cada path interno
                // se for, entra na lógica e trabalha na instância da classe e no disparo dinâmico
                if($url == $route['route']){ // verifica se a aplicação possui a solicitação passada
                    $class = "App\\Controllers\\".ucfirst($route['controller']); // apontando com base no namespace a rota que a aplicação possui
                    $controller = new $class; // instânciando a classe feita dinamicamente: new App\Controllers\IndexController
                    
                    $action = $route['action']; // atribui a action a ação da rota como nome de função: exemplo-> index(), contatos()... etc
                    $controller->$action(); // se for igual, executa a action relativa à rota (enviando a ação à Controller)
                    // () executa uma ação.
                }
            }
        }
        
        // retorna a parte de acesso da url
        protected function getUrl() { 

            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // superglobal que retorna todos os detalhes do servidor 
            // request_uri retorna o que foi acessado depois do / no navegador. Ex: www.exemplo.com/contato Return: contato
            // parse_url retorna um array detalhando seus componentes
            // segundo parametro: constante que, quando submetida, retorna apenas a string relativa ao path (a informação inicial)
        }   // basicamente retorna a url filtrada

    }

    

?>