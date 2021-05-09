<?php
 class Core{
   private $statusUsuario = "User";
    public function Inicio($dados)
    {//Pego a classe atraves da palavra "pagina"
     
      if(isset($dados['pagina']))
      {
         $controller = $dados['pagina']."Controller";
         
      }
      else{
         //Caso não exitsa eu coloco para o geral que seria o home controller
         $controller = "HomeController";
      }

      //Atribuio o metodo a variavel metodo atraves da palavra "metodo"
      if(isset($dados['metodo']))
      {
         $metodo = $dados['metodo'];
      }//Caso não exista eu vou direcionar até o index
      else{
         $metodo = 'index';
      }


      //Pego o parâmetro caso eu queria acessar algo especifico, nesse caso será um login ou produto
      if(isset($dados['id']) and ($dados['id']) != null)
      {
         $id = $dados['id'];
         $status = null;
      }
      else{//Caso eu não receba passo o null
         $id = null;
         $status = null;
      }

      //Chamo uma função no index, nesse casso será a classe que está no $controller
      //Chamo o metodo também $metodo
      //E por fim passo um parâmetro na area escrita ($id)
      call_user_func_array(array(new $controller, $metodo),array($id, &$status));
      //Passo o valor para uma variavel privada
      $this->statusUsuario = $status;
    }

    //Passo o valor dentro de statusUsuario para quem chamar essa função
    public function Status()
    {
       return $this->statusUsuario;
    }

 }

 ?>