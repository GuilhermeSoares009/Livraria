<?php
abstract class interfaceCrud{

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
        return $alterarDados;
    }

    public function Excluir($id)
    {
        return $excluirDado;
    }
}