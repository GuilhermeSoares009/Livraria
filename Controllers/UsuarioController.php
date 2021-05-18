<?php
Class UsuarioController{
//Starto o cookie status como Usuario referenciando a tudo sobre
//view, model e template com Usuario
    public function __construct()
    {
        $_COOKIE['Status'] = "Usuario";
    }

    public function login($id)
    {
        if(!empty($_POST['Login']) or !empty($_POST['Senha']) )
            {
            try{
                //Chamo a parte do model onde posso usar a classe crud
                $usuario = new Usuario();
                //Chamo os gets e setters
                $getSet = new UserGS();
                //Faço o login
                $resultado = $usuario->Logar($_POST);

                //Passo os dados do Livro
                $livros = new Livros();

                //Busca Livros
                $livros1 = $livros->TodosLivros();

                //Ao passar Status por referência
                //Retorno o valor para a variavel
                $status = $resultado->Status;

                if($resultado->Status == "Admin"):
                    $_COOKIE['Status'] = "Admin";
                    
                    //Pega o local que ficam os templates
                    $loader = new \Twig\Loader\FilesystemLoader('view');

                    //Configura eles em uma variavel
                    $twig = new \Twig\Environment($loader);

                    //Carrega o template que quero
                    $Template = $twig->load('Admin.html');
                    //Array 
                    $parametros = array();
                    //Salvo em um cookie o id do usuario para poder chamar ele quando quiser
                    //recareregar a pagina
                    setcookie("id_login", $resultado->id_login);
                    $_COOKIE['id_login'] =  $resultado->id_login;

                    //Nele fica os objetos dentro de uma casa do vetor
                    $parametros['Nome'] = $resultado->Nome;
                    $parametros['Livro'] = $livros1;

                    //Passo o array para o render 
                    //Ele coloca os conteudos de acordo com
                    //A casa que eu escolher: usuario
                    $conteudo = $Template->render($parametros);

                    echo "<script>alert('Bem vindo(a) ". $resultado->Nome."')</script>";
                    echo $conteudo;

                elseif ($Resposta->Status == "Usuario"):
                    $_COOKIE['Status'] = "Usuario";
                    
                        //Pega o local que ficam os templates
                    $loader = new \Twig\Loader\FilesystemLoader('view');
                    //Configura eles em uma variavel
                    $twig = new \Twig\Environment($loader);
                    //Carrega o template que quero
                    $Template = $twig->load('home.html');
                    
                    
                    //Array 
                    $parametros = array();
                    //Nele fica os objetos dentro de uma casa do vetor
                    $parametros['usuario'] = $resultado;

                    //Passo o array para o render 
                    //Ele coloca os conteudos de acordo com
                    //A casa que eu escolher: usuario
                    $conteudo = $Template->render($parametros);

                    echo "<script>alert('Bem vindo(a)'". $resultado->Nome.")</script>";

                    echo $conteudo;
                endif;


                //header("Location: index.php");
               

                /*  if($resultado->Status == "Admin")
                {
                    header('Location: view/Admin.html');
                }*/
              
            }catch(Exception $e)
            {
                echo "<script>alert('Informação: ". $e->getMessage()."')</script>";

                //header("Location: index.php");
                $template = file_get_contents('view/login.html');
                echo $template;
            }
        }else{
            echo "<script>alert('Insira todos os dados')</script>";
            
            //header("Location: index.php");
            $template = file_get_contents('view/login.html');
            echo $template;
        }

    }

    public function Cadastrar()
    {
        try{
            $usuario = new Usuario();
            $resultado = $usuario->Salvar($_POST);
            echo "<script>alert('Inserido com sucesso.')</script>";
            header("Location: index.php");
        }catch(Exception $e)
        {
            echo "<script>alert('Erro ao inserir.')</script>";
            
        }
    }

    public function Alterar($id)
    {
        try{
            $idUsuario = login($id);
            $dados = $usuario->MudarInfos($idUsuario);
            echo "<script>alert('Inserido com sucesso.')</script>";
            header("Location: index.php");
        }
        catch(Exception $e)
        {
            echo "<script>alert('Erro ao inserir.')</script>";
            
        
        }
    }


    public function selecionarTodos($id)
    {
       

    }
}



?>