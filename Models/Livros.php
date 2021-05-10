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
    }

?>