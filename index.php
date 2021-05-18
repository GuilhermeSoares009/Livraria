<?php
//REQUIRES
  //Chama a pasta core
    require_once 'vendor/autoload.php';
    require_once "Core/core.php";
    //Chamo a controller Home
    require_once "Controllers/HomeController.php";
    //Chamo a controller Usuario
    require_once "Controllers/UsuarioController.php";

    //Livros
    require_once "Controllers/LivrosController.php";


    //Livros
    require_once "Models/Livros.php";
    //Conexao com o banco
    require_once "lib/database/Conexao.php";

    //Chama a parte que entra em contato com o banco de dados
    require_once "Models/Usuario.php";

    //Chama os get e Setters
    require_once 'UsuarioGetSET/UserGS.php';
    //Interface
    require_once "interfaceCrud.php";
    //Class AlterarDados
     require_once "Models/AlterarDados.php";
    //Classe AdminController
    require_once "Controllers/AdminController.php";
    
    setcookie("Status", 'Usuario');
    $_COOKIE['Status'] = "Usuario";

    //Inicio o processo de ob
    //Inicio a captura de de views e retorno no str_replace 
    ob_start();
    //Instancio a classe Core através do comando  a baixo
        $Core = new core();
    //Eu inicio o metodo que vai pegar o que eu passar por url e direcionar para pagina que quero
    //Eu passo o GET já que ele vai ser o metodo que vou passar os dados
        $Core->Inicio($_GET);

    //Pego o view ou seja o que retornar do que pedi no processo:
    //Core>Controller>View ou Model
    $saida = ob_get_contents();
 
    //Finalizo o processo de captura de conteudo
    ob_end_clean();
    //Finalizo o ob
    
    
    //Starto o cookie
    //Com ele posso passar dados pela url





    //Pego o template de acordo com o que tiver no status
    //$Status = $Core->Status();
    if($_COOKIE['Status'] == "Admin"):
        $template = file_get_contents('template/Admin.php');
    else:
        $template = file_get_contents('template/home.php');
    endif;
    //Substitui a string {{area_substituivel}} e coloca o que veio da saída e coloca no template
    $Resultado = str_replace('{{area_substituivel}}',$saida, $template);

    //Por fim mostramps o html com o php
    echo $Resultado;


