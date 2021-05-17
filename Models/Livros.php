<?php

    Class Livros{

        public function TodosLivros()
        {
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM livro";
            $sql = $conexao->prepare($sql);
            $sql->execute();
            //Comentar
            while($row = $sql->fetchObject('Livros')){
                $resposta[] = $row;
            }
    
            if(!($resposta)):
                throw new Exception("Os dados provavelmente não foram preenchidos corretamente ou o usuário não existe.");
            endif;
            return $resposta;
        }

        public function LivroPorId($id)
        {

            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM livro WHERE id_livro = :id";
            $sql = $conexao->prepare($sql);
            $sql->bindValue(":id", $id, PDO::PARAM_INT);
            $sql->execute();
            //Comentar
            $resposta = $sql->fetchObject('Livros');
            if(!($resposta)):
                throw new Exception("Os dados provavelmente não foram preenchidos corretamente ou o usuário não existe.");
            endif;
            return $resposta;
        }
    }

?>