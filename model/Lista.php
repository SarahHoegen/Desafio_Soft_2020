<?php


class Lista
{
    public $fk_cod_prod;
    public $fk_cod_ped;
    public $qtd;
    public $preco;
    public $imposto;

    public function __construct($fk_cod_prod,$fk_cod_ped,$qtd,$preco,$imposto)
    {
        $this->fk_cod_prod=(int)$fk_cod_prod;
        $this->fk_cod_ped=(int)$fk_cod_ped;
        $this->qtd=(int)$qtd;
        $this->preco=(float)$preco;
        $this->imposto=(float)$imposto;
    }

    public function getFkCodProd()
    {
        return $this->fk_cod_prod;
    }

    public function setFkCodProd($fk_cod_prod): void
    {
        $this->fk_cod_prod = $fk_cod_prod;
    }

    public function getFkCodPed()
    {
        return $this->fk_cod_ped;
    }

    public function setFkCodPed($fk_cod_ped): void
    {
        $this->fk_cod_ped = $fk_cod_ped;
    }

    public function getQtd()
    {
        return $this->qtd;
    }

    public function setQtd($qtd): void
    {
        $this->qtd = $qtd;
    }
    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }

    public function getImposto()
    {
        return $this->imposto;
    }
    public function setImposto($imposto): void
    {
        $this->imposto = $imposto;
    }


}