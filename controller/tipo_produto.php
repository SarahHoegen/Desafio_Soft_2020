<?php

require_once __DIR__."/../model/CrudTipoProduto.php";
include __DIR__."/../config.php";

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch($acao){
    case 'cadastrar':
        if(!isset($_POST['gravar'])){
            include __DIR__ . "/../view/tipoProduto/cadastrar.php";
        }else{
            $nome_tipo= $_POST['nome_tipo'];
            $cod_tipo= $_POST['cod_tipo'];
            $imposto= $_POST['imposto'];

            $novoTipoProduto = new TipoProduto($nome_tipo,$cod_tipo,$imposto);
            $crud = new CrudTipoProduto();
            $res= $crud->insertTipoProduto($novoTipoProduto);

            header("Location: ".$caminho);
        }
        break;
    case 'excluir':
        $crud = new CrudTipoProduto();
        $cod_tipo = $_GET['codigo'];
        $crud->deleteTipoProduto($cod_tipo);

        header("Location: " . $caminho);
        break;

}

