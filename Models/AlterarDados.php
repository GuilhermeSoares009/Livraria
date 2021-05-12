<?php
class AlterarDados{
    
    public function Atualizar($dados)
    {
        $conexao = Conexao::getConexao();

        $sql = "UPDATE livro SET NomeLivro = :nl, Autor = :a, Genero = :g, Ano = :an, Valor = :v  WHERE :id";
        $sql = $conexao->prepare($sql);

        $sql->bindValue(':nl',$dados['NomeLivro']);
        $sql->bindValue(':a',$dados['Autor']);
        $sql->bindValue(':g',$dados['Genero']);
        $sql->bindValue(':an',$dados['Ano']);
        $sql->bindValue(':v',$dados['Valor']);
        $sql->bindValue(':id',$dados['idLivro']);

        
        $resultado = $sql->execute();
    }
}