<?php
require_once __DIR__. '/../database/Conexao.php';
require_once 'TipoProduto.php';

class CrudTipoProduto
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getTipoProd($cod_tipo){
        $consulta = $this->conexao->query("SELECT * FROM tipo_produto WHERE cod_tipo = '$cod_tipo'");
        $tipo_produto = $consulta->fetch(PDO::FETCH_ASSOC);
        return new TipoProduto($tipo_produto['nome_tipo'],$tipo_produto['cod_tipo'],$tipo_produto['imposto']);
    }

    public function getTiposProd(){
        $consulta = $this->conexao->query("SELECT * FROM tipo_produto WHERE excluido=0");
        $arrayTipoProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaTipoProdutos = [];
        foreach ($arrayTipoProdutos as $tipo_produto) {
            $listaTipoProdutos[] = new TipoProduto($tipo_produto['nome_tipo'], $tipo_produto['cod_tipo'], $tipo_produto['imposto']);
        }
        return $listaTipoProdutos;

    }

    public function insertTipoProduto(TipoProduto $tipo_produto){
        $dados[] = $tipo_produto->getNomeTipo();
        $dados[] = $tipo_produto->getCodTipo();
        $dados[] = $tipo_produto->getImposto();

        $sql = "INSERT INTO tipo_produto (nome_tipo, cod_tipo, imposto) VALUES ('$dados[0]', '$dados[1]', '$dados[2]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteTipoProduto($cod_tipo){
        $sql = "UPDATE tipo_produto SET excluido = 1 WHERE cod_tipo = '$cod_tipo'";
        try {
            $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}