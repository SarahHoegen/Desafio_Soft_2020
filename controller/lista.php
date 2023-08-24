<?php

require_once __DIR__."/../model/CrudLista.php";
require_once __DIR__."/../model/CrudPedido.php";
require_once __DIR__."/../model/CrudProduto.php";
include __DIR__."/../config.php";


function get_valor_usando_prefixo($prefixo)
{
    $valores = array();

    $propriedades = array();
    $chavesPost = array_keys($_POST);

    foreach ($chavesPost as $chave) {
        if (strpos($chave, $prefixo) === 0) {
            $propriedade = substr($chave, strlen($prefixo));

            array_push($propriedades, $propriedade);
        }
    }

    $quantidadeValores = sizeof($_POST[$prefixo . $propriedades[0]]);
    for ($i = 0; $i < $quantidadeValores; $i++) {
        $valor = new stdClass();

        foreach ($propriedades as $propriedade) {
            $valor->$propriedade = $_POST[$prefixo . $propriedade][$i];
        }

        array_push($valores, $valor);
    }

    return $valores;
}

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch($acao){
    case 'cadastrar':

        if(!isset($_POST['gravar'])){
            include __DIR__ . "/../view/lista/cadastrar.php";
        }else{
            $preco_total = 0;
            $preco_imposto = 0;

            $lista = array();

            $produtos= get_valor_usando_prefixo('produto_');
            $crudProduto= new CrudProduto();
            $crudLista = new CrudLista();

            foreach($produtos as $produto){
                if($produto->qtd !="" AND $produto->qtd !='0'){
                    $dadosProduto = $crudProduto->getProduto($produto->cod_prod);
                    $imposto = $crudLista->pegaImposto($dadosProduto->getFkCodTipo());

                    $qtd= intval($produto->qtd);
                    $sub_total = (($dadosProduto->preco*($imposto['imposto']/100))+$dadosProduto->preco)*$qtd;
                    $sub_imposto = $dadosProduto->preco*($imposto['imposto']/100)*$qtd;

                    $preco_total += round($sub_total,2);
                    $preco_imposto += round($sub_imposto,2);

                    $novoLista = new Lista($dadosProduto->getCodprod(),null,$qtd,$dadosProduto->preco,$imposto['imposto']);

                    array_push($lista, $novoLista);


                }

            }

            $novoPedido= new Pedido($preco_total,$preco_imposto);
            $crud = new CrudPedido();
            $cod_ped= $crud->insertPedido($novoPedido);



            foreach ($lista as $item){
                $item->setFkCodPed($cod_ped);
                $crudLista->insertLista($item);

            }
            header("Location: ".$caminho);
        }

        break;
//    case 'excluir':
//        if(!isset($_POST['gravar'])){
//            $cod_ped = $_GET['cod_tipo'];
//            $crud = new CrudTipoProduto();
//            $tipo_produto = $crud->getTipoProd($cod_ped);
//            include __DIR__ . "/../view/tipoProduto/deletar.php";
//        }else{
//            $cod_ped= $_POST['cod_tipo'];
//            $crud=new CrudTipoProduto();
//            $res= $crud->deleteTipoProduto($cod_ped);
//        }
//        break;



}

