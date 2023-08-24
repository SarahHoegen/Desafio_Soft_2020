<?php

require_once __DIR__."/../model/CrudProduto.php";
include __DIR__."/../config.php";

    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch($acao){
        case 'cadastrar':
            if(!isset($_POST['gravar'])){
                include __DIR__ . "/../view/produto/cadastrar.php";
            }else{
                $nome= $_POST['nome'];
                $tipo_unid= $_POST['tipo_unid'];
                $preco= $_POST['preco'];
                $fk_cod_tipo= $_POST['fk_cod_tipo'];
                $cod_prod = null;
                $novoProduto = new Produto($nome,$tipo_unid,$preco,$fk_cod_tipo,$cod_prod);
                $crud = new CrudProduto();
                $res= $crud->insertProduto($novoProduto);

                header("Location: ".$caminho);
            }
            break;
        case 'excluir':
            $crud = new CrudProduto();
            $cod_prod = $_GET['codigo'];
            $crud->deleteProduto($cod_prod);
            
            header("Location: " . $caminho);

            break;


    }

