<?php

class AdminController extends interfaceCrud{
    
    
    public selecionarTodos()
    {
        return $TodosOsDados
    }
    public function Cadastrar()
    {
        return $cadastrar;
    }

    public function Alterar($id)
    {
        $conexao = Conexao::getConexao();

        $sql = ""
        return $alterarDados;
    }

    public function Excluir($id)
    {
        return $excluirDado;
    }
}