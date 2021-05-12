<?php

class AdminController extends interfaceCrud{
    public function index()
    {   
        //Chamo o pacote view do meu projeto
        $loader = new \Twig\Loader\FilesystemLoader('view');
        //Carrego as configurações nele
        $twig = new \Twig\Environment($loader);
        //Chamo a tela que quero
        $Template = $twig->load('Alterar.html');
        //Array
      
        $tela = $Template->render();
        echo $tela;
    }
    public function selecionarTodos($id)
    {
        return $TodosOsDados;
    }
    public function Cadastrar($id)
    {
        return $cadastrar;
    }

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

    public function Excluir($id)
    {
        return $excluirDado;
    }
}