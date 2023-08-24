<?php


class TipoProduto
{
    public $nome_tipo;
    public $cod_tipo;
    public $imposto;

    public function __construct($nome_tipo, $cod_tipo, $imposto)
    {
        $this->nome_tipo = $nome_tipo;
        $this->cod_tipo  = $cod_tipo;
        $this->imposto = $imposto;
    }

    /**
     * @return mixed
     */
    public function getNomeTipo()
    {
        return $this->nome_tipo;
    }

    /**
     * @param mixed $nome_tipo
     */
    public function setNomeTipo($nome_tipo): void
    {
        $this->nome_tipo = $nome_tipo;
    }

    /**
     * @return mixed
     */
    public function getCodTipo()
    {
        return $this->cod_tipo;
    }

    /**
     * @param mixed $cod_tipo
     */
    public function setCodTipo($cod_tipo): void
    {
        $this->cod_tipo = $cod_tipo;
    }

    /**
     * @return mixed
     */
    public function getImposto()
    {
        return $this->imposto;
    }

    /**
     * @param mixed $imposto
     */
    public function setImposto($imposto): void
    {
        $this->imposto = $imposto;
    }

}

