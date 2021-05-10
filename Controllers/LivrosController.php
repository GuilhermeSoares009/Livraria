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
}
// 
?>