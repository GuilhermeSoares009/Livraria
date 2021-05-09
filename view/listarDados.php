<?php
require_once "../lib/database/Conexao.php";
    //Consultar banco de dados
    echo"entrou caraio";
    try {
        $con =  Conexao::getConexao();
        $sql =  "SELECT * FROM usuario";
        $sql = $con->prepare($sql);
        $result_usuario = $sql->execute();
    echo"entrou caraio";
        if(($result_usuario) and ($result_usuario->num_rows != 0 ))
        {
            while($rowusuario = $mysqli_fetch_assoc($result_usuario))
            {
                echo $rowusuario['Nome']."br";
            }
        }
        else{
            echo"Nenhum usuário encontrado.";
        }    
    
    } catch (\Throwable $th) {
        echo "deu merda";
        throw new Exception("Erro:". $th);
        
    }
   
