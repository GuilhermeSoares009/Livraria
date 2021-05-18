<?php

class Usuario{

    private $userTemp;

    public function Logar($dados)
    {
        $conexao = Conexao::getConexao();
        $login = $dados['Login'];
        $senha = md5($dados['Senha']);
        $sql = "SELECT * FROM usuario WHERE Usuario = :l and Senha = :s";
        $sql = $conexao->prepare($sql);
        $sql->bindValue( ':l', $login);
        $sql->bindValue( ':s', $senha);
        $sql->execute();
 
        $resposta  = $sql->fetchObject('Usuario');

        if(empty($resposta))
        {
            throw new Exception("Os dados provavelmente não foram preenchidos corretamente ou o usuário não existe.");
        }
        return $resposta;

    }

    public function UserId($id)
    {
        $conexao = Conexao::getConexao();
        $sql = "SELECT * FROM usuario WHERE id_login = :id";
        $sql = $conexao->prepare($sql);
        $sql->bindValue( ':id', $id);
        $sql->execute();
 
        $resposta  = $sql->fetchObject('Usuario');

        if(empty($resposta))
        {
            throw new Exception("Os dados provavelmente não foram preenchidos corretamente ou o usuário não existe.");
        }
        return $resposta;

    }

    public function Salvar($dados)
    {
        $conexao = Conexao::getConexao();

        $nome = $dados['Nome'];
        $login = $dados['Login'];
        $senha = md5($dados['Senha']);
        $email = $dados['Email'];
        $status = $dados['Status'];

        $sql = "INSERT INTO usuario (Nome, Usuario,Senha, Email, Status) values(:n,:l, :s,:e, :st)";
        $sql = $conexao->prepare($sql);
        $sql->bindValue( ':n', $nome);
        $sql->bindValue( ':l', $login);
        $sql->bindValue(':s', $senha);
        $sql->bindValue(':e',$email);
        $sql->bindValue(':st',$status);
        $res = $sql->execute();
        if($res == 0)
        {
            throw new Exception();
            
        }

        return $res;

    }

    public function SelecionarUsuario()
    {

    }
}


?>