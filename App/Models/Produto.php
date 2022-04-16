<?php

    namespace App\Models;
    use MF\Model\Model;

    class Produto extends Model {

        public function getProdutos(){ // realiza a busca e o retorno de uma tabela do banco de dados
            $query = "select id, descricao, preco 
                from 
                    tb_produtos";
            
            return $this->db->query($query)->fetchAll(); // retorna um array de todos os registros
        }
    }


?>