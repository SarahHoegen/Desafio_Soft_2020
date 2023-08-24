<?php
require_once __DIR__. '/../database/Conexao.php';
require_once 'Pedido.php';

class CrudPedido
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function insertPedido(Pedido $pedido){
        $dados[] = $pedido->getPrecoTotal();
        $dados[] = $pedido->getPrecoImposto();

        $sql = "INSERT INTO pedido (preco_total,preco_imposto) VALUES ('$dados[0]', '$dados[1]')";
        echo $sql;
        try {
            $res = $this->conexao->exec($sql);
            return $this->conexao->lastInsertId("pedido_cod_ped_seq");
        } catch (PDOException $e) {
            var_dump($e);
            return false;
        }
    }

}