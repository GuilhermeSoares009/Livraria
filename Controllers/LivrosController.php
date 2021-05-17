<?php

Class LivrosController {

    public function Acervo()
    {
        try{
            //Chamo a classe Livros
            $livros = new Livros();
            //Chamo a função que retorna os livros em forma de array
            $acervo = $livros->TodosLivros();  
        }catch(Exception $e)
        {
            //Mostro erro
            echo "<script>alert(Erro ao pedir dados)</script>";
            //Passo a palavra erro para indicar 
            $acervo = 'erro';
        }
        //Retorno array        
        return $acervo;
    }
    
    public function Livro($id)
    {
        try{
            //Chamo a classe Livros
            $livros = new Livros();
            //Chamo a função que retorna os livros em forma de array
            $acervo = $livros->LivroPorId($id);  
    
        }catch(Exception $e)
        {
            //Mostro erro
            echo "<script>alert(Erro ao pedir dados)</script>";
            //Passo a palavra erro para indicar 
            $acervo = 'erro';
        }
        //Retorno array        
        return $acervo;
    }
//Ele altera o livro
    public function Alterar($id)
    {
            try{
                $alt = new AlterarDados();
                $alterarDados = $alt->Atualizar($_POST); 
            } catch(Exception $e)
            {
                echo "Erro ta aqui guilherme: ".$e->getMessage()."##Fim do erro";
                exit;
            }
        return ;
    }
}
// 
?>