<?php


class Pedido
{
    public $preco_total;
    public $preco_imposto;
    public $cod_ped;

    public function __construct($preco_total,$preco_imposto,$cod_ped=null)
    {
        $this->preco_total=$preco_total;
        $this->preco_imposto=$preco_imposto;
        $this->cod_ped=$cod_ped;
    }

    public function getPrecoTotal()
    {
        return $this->preco_total;
    }
    public function getPrecoImposto()
    {
        return $this->preco_imposto;
    }
    public function getCodPed()
    {
        return $this->cod_ped;
    }
}