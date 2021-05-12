<?php
interface interfaceCrud{

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
        return $alterarDados;
    }

    public function Excluir($id)
    {
        return $excluirDado;
    }
}