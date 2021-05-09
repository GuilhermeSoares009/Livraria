<?php
Class UsuarioController{

    public function Status()
    {
        echo "Usuario: ".$this->templ;
        return $this->templ;
    }

    public function login($id, &$status)
    {
        if(!empty($_POST['Login']) or !empty($_POST['Senha']) )
            {
            try{
                //Passo os dados
                $usuario = new Usuario();
                $getSet = new UserGS();
                $resultado = $usuario->Logar($_POST);
                //Ao passar Status por referêbncia
                //Retorno o valor para a variavel
                $status = $resultado->Status;
                if($resultado->Status == "Admin"):
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
           

                    //Passo o array para o render 
                    //Ele coloca os conteudos de acordo com
                    //A casa que eu escolher: usuario

                    $conteudo = $Template->render($parametros);

                    echo "<script>alert('Bem vindo(a) ". $resultado->Nome."')</script>";
                    echo $conteudo;

                elseif ($Resposta->Status == "Usuario"):

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