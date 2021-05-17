<?php

class AdminController extends interfaceCrud{
    //Starto o cookie status como Admin referenciando a(ao) administrador(a)
    public function __construct()
    {
        $_COOKIE['Status']= "Admin";
    }

    public function selecionarTodos($id)
    {
        return $TodosOsDados;
    }
    public function Cadastrar($id)
    {
        return $cadastrar;
    }

    public function AlterarLivro($id)
    {
        //Chamo o pacote view do meu projeto
        $loader = new \Twig\Loader\FilesystemLoader('view');
        //Carrego as configurações nele
        $twig = new \Twig\Environment($loader);
        //Chamo a tela que quero
        $Template = $twig->load('Alterar.html');
        try {
            $livro = new LivrosController();
            $livro = $livro->Livro($id);
        } catch (\Throwable $th) {
           echo "erro";
           exit;
        }    
      //Paramêtro livroParametro
      $livroParametro['id'] = $livro->id_livro ;
      $livroParametro['Nome'] = $livro->NomeLivro ;
      $livroParametro['Autor'] = $livro->Autor ;
      $livroParametro['Genero'] = $livro->Genero ;
      $livroParametro['Ano'] = $livro->Ano ;
      $livroParametro['Valor'] = $livro->Valor ;
      $livroParametro['Nota'] = $livro->Nota ;
      $livroParametro['imagemLivro'] = $livro->imagemLivro ;
      
        $tela = $Template->render($livroParametro);
        echo $tela;
    }

    public function Excluir($id)
    {
        return $excluirDado;
    }
}