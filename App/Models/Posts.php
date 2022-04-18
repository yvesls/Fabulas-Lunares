<?php

    namespace App\Models;
    use MF\Model\Model;

    class Posts extends Model {
        private $descricao;
        private $arquivo;

        public function __get($atributo) {
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function set_midia() {

                
            $query = "insert into tb_imagens(descricao, imagem, data, tamanho) VALUES (:descricao ,:imagem , NOW(), :tamanho)"; //  preenchendo nome email e senha
                
            $stmt = $this->db->prepare($query); // instanciando o pbo
            
            
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':imagem', $this->__get('arquivo')); 
            $stmt->bindValue(':tamanho', $this->__get('tamanho'));
            $stmt->execute(); // executa o pdo stmt

            return $this;
        }

        public function get_midia() {

            $query = "select descricao, imagem, tamanho from tb_imagens";
    
            return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


?>