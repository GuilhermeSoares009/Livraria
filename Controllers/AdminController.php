<?php

class AdminController extends interfaceCrud{
    //Starto o cookie status como Admin referenciando a(ao) administrador(a)
    public function __construct()
    {
        $_COOKIE['Status']= "Admin";
    }
    public function index()
    {
        $usuario = new Usuario();
        $id = $_COOKIE['id_login'];

        $resultado = $usuario->UserId($id);
     
        //Passo os dados do Livro
        $livros = new Livros();

        //Busca Livros
        $livros1 = $livros->TodosLivros();
            
        //Pega o local que ficam os templates
        $loader = new \Twig\Loader\FilesystemLoader('view');

        //Configura eles em uma variavel
        $twig = new \Twig\Environment($loader);

        //Carrega o template que quero
        $Template = $twig->load('Admin.html');
        //Array 
        $parametros = array();

        //Nele fica os objetos dentro de uma casa do vetor
        $parametros['Nome'] = $resultado->Nome;
        $parametros['Livro'] = $livros1;

        //Passo o array para o render 
        //Ele coloca os conteudos de acordo com
        //A casa que eu escolher: usuario
        $conteudo = $Template->render($parametros);
        echo $conteudo;   
    }
    public function selecionarTodosLivros($id)
    {
        return $TodosOsDados;
    }
    public function Cadastrar($id)
    {
        return $cadastrar;
    }

    public function TelaAlterarLivro($id)
    {
        //Chamo o pacote view do meu projeto
        $loader = new \Twig\Loader\FilesystemLoader('view');
        //Carrego as configurações nele
        $twig = new \Twig\Environment($loader);
        //Chamo a tela que quero
        $Template = $twig->load('Alterar.html');
        try {
            $livro = new Livros();
            $livro = $livro->LivroPorId($id);
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


    public function AlterarLivro($id)
    {
        try {
            $livro = new Livros();
            $livro = $livro->Alterar($id, $_POST);
            echo "<script>alert('Dados Alterados com sucesso')</script>";
           //Tela do Administrador com livros

          $index =  new AdminController;
          $index->index();
        } catch (Exception $e) {
            echo "<script>alert('Erro ao alterar dados!')</script>";
            echo "########## Erro ao alterar  ######### -- --".$e->getMessage()." --  -- Fim da mensagem";
            exit;
        }    
    }
    public function Excluir($id)
    {
        return $excluirDado;
    }
}