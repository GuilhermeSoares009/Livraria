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

        //Ele altera o livro
        public function Alterar($id, $dados)
        {
         //   $_POST
                $conexao = Conexao::getConexao(); 
                $sql = "UPDATE livro SET NomeLivro = :n, Autor = :a, Genero = :g, Ano = :an, Valor = :v WHERE id_livro = :id";
                $sql = $conexao->prepare($sql);
                $sql->bindValue(":n",$dados['NomeLivro']);
                $sql->bindValue(":a", $dados['Autor']);
                $sql->bindValue(":g", $dados['Genero']);
                $sql->bindValue(":an", $dados['Ano']);

                $sql->bindValue(":v", $dados['Valor']);


                $sql->bindValue(":id", $id);
                $resultado = $sql->execute();

                if($resultado == 0):
                    throw new Exception("Erro ao alterar dados");
                    return false;
                endif;

                return true;

            return ;
        }
    }

?>