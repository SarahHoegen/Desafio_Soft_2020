<?php

class Produto
{
    public $nome;
    public $tipo_unid;
    public $preco;
    public $fk_cod_tipo;
    public $cod_prod;

    public function __construct($nome, $tipo_unid, $preco, $fk_cod_tipo, $cod_prod=null )
    {
        $this->nome = $nome;
        $this->tipo_unid = $tipo_unid;
        $this->preco = $preco;
        $this->fk_cod_tipo = $fk_cod_tipo;
        $this->cod_prod = $cod_prod;

    }


    public function getNome(){
      return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTipoUnid(){
        return $this->tipo_unid;
    }
    public function setTipoUnid($tipo_unid){
        $this->tipo_unid = $tipo_unid;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }
    
    public function getCodprod(){
        return $this->cod_prod;
    }


    /**
     * @return mixed
     */
    public function getFkCodTipo()
    {
        return $this->fk_cod_tipo;
    }

    /**
     * @param mixed $cod_tipo
     */
    public function setFkCodTipo($fk_cod_tipo): void
    {
        $this->fk_cod_tipo = $fk_cod_tipo;
    }
}




