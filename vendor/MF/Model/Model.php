<?php 

    namespace MF\Model;

    class Model {
        
        protected $db;

        public function __construct (\PDO $db){ // recebe a instâcia de pbo e o seta
            $this->db = $db;
        }

    }

    /* 

    2º passo bd

    Funções:

    - Extensão dos modelos criados, realiza a conexão do modelo com bd (requisitos não funcionais)
  
    Devolve: 

    - A conexão com o bd para cada modelo com esta extensão
    
    */

?>