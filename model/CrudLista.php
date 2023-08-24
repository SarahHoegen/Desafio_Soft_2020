<?php

require_once __DIR__. '/../database/Conexao.php';
require_once 'Lista.php';
require_once 'Produto.php';
require_once 'TipoProduto.php';

class CrudLista
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertLista(Lista $lista){
        $dados[] = $lista->getFkCodProd();
        $dados[] = $lista->getFkCodPed();
        $dados[] = $lista->getQtd();
        $dados[] = $lista->getPreco();
        $dados[] = $lista->getImposto();

        $sql = "INSERT INTO lista (fk_cod_prod,fk_cod_ped,qtd,preco,imposto) VALUES ('$dados[0]', '$dados[1]','$dados[2]','$dados[3]','$dados[4]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            return false;
        }
    }

    public function pegaImposto(string $fk_cod_tipo){
        $consulta = $this->conexao->query("SELECT imposto FROM tipo_produto WHERE cod_tipo='$fk_cod_tipo'");
        $imp = $consulta->fetch(PDO::PARAM_STR);
        return $imp;

        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}