<?php

    namespace App\Models;
    use MF\Model\Model;

    class Dica extends Model {

        public function getDicas(){
            $query = "select titulo, descricao
                from 
                    tb_dicas";
            
            return $this->db->query($query)->fetchAll();
        }
    }

?>