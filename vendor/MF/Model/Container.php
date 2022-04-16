<?php 


    namespace MF\Model;
    use App\Connection;

    class Container {
        public static function getModel($model) {
            $class = "\\App\\Models\\".ucfirst($model); // retorna a instãncia da classe: exemplo App\Models\Produto
        
            $conn = Connection::getDb(); // método estático que realiza a conexão com bd

            return new $class($conn); // retorna a conexão
        }
    }

    /* 

    3º passo bd

    Funções:

    - Instancia uma conexão e instancia um modelo para futuramente ser possível realizar uma requisição para o bd (requisito não funcional)
    
    Recebe: 

    - A conexão de conection

    Devolve: 

    - Retorna o modelo instânciado já com a conexão estabelecida
    
    */
?>