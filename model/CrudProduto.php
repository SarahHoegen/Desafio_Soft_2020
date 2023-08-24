<?php

require_once __DIR__. '/../database/Conexao.php';
require_once 'Produto.php';

class CrudProduto
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getProduto(int $cod_prod){
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE cod_prod = $cod_prod");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Produto($produto['nome'],$produto['tipo_unid'],$produto['preco'],$produto['fk_cod_tipo'],$produto['cod_prod']);
    }
    public function getProdutos(){
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE excluido=0");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {
            $listaProdutos[] = new Produto($produto['nome'], $produto['tipo_unid'], $produto['preco'], $produto['fk_cod_tipo'],$produto['cod_prod']);
        }
        return $listaProdutos;
    }

    public function insertProduto(Produto $produto){
        $dados[] = $produto->getNome();
        $dados[] = $produto->getTipoUnid();
        $dados[] = $produto->getPreco();
        $dados[] = $produto->getFkCodTipo();

        $sql = "INSERT INTO produto (nome, tipo_unid, preco,fk_cod_tipo) VALUES ('$dados[0]', '$dados[1]', '$dados[2]','$dados[3]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteProduto($cod_prod){
        $sql = "UPDATE produto SET excluido = 1 WHERE cod_prod = $cod_prod";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            return false;
        }
    }
}