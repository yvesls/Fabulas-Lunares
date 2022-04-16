<?php

    namespace App;

    class Connection {
        
        public static function getDb(){ // cria uma conexão com o banco de dados
            try {
                    $conn = new \PDO( // dados da conexão
                        "mysql:host=localhost;dbname=mvc;charset=utf8",
                        "root",
                        ""
                );
            return $conn;
            }catch (\PDOException $e) { // captura de erros ao tentar uma conexão
                // tratar de alguma forma 
            }
        } 
    }
    
    /* 
    1º passo bd
    Funções: 

    - Cria uma conexão com o banco de dados
    - Estabelece uma instãncia com o bd por meio da extensão MF/Model/Container.php

    */

?>
