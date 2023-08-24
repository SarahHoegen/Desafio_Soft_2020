<?php
require_once __DIR__ . "/model/Produto.php";
require_once __DIR__ . "/model/CrudProduto.php";
require_once __DIR__ . "/model/TipoProduto.php";
require_once __DIR__ . "/model/CrudTipoProduto.php";

include "config.php";

$crud = new CrudProduto();
$listaProdutos = $crud->getProdutos();
$crud = new CrudTipoProduto();
$listaTipoProdutos = $crud->getTiposProd();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <link href="css_js/estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="css_js/index_tela.js"></script>
</head>
<body>
<h1>Mercado Desafio</h1>
<div class="botoes">
    <button id="mostra" name="botao1" class="lightblue">Mostrar produtos</button>
    <button id="oculta" name="botao1" class="lightbluee">Ocultar produtos</button>
    <button id="mostrat" name="botao2" class="lightblue">Mostrar tipos de produto</button>
    <button id="ocultat" name="botao2" class="lightbluee">Ocultar produtos</button>
    <a href="<?= $caminho; ?>controller/produto.php?acao=cadastrar">
        <button class="lightblue">Cadastrar um produto</button></a>

    <a href="<?= $caminho; ?>controller/tipo_produto.php?acao=cadastrar">
        <button class="lightblue">Cadastrar um tipo de produto</button></a>

    <a href="<?= $caminho; ?>controller/lista.php?acao=cadastrar">
        <button class="green">Efetuar uma compra</button>
    </a><br>
</div>

<div id="produtos">
    <div class="lista-itens">
        <?php foreach ($listaProdutos as $produto): ?>
            <div class="produto">
                <div class="nome"> <?= $produto->nome; ?> </div>

                <div>R$ <?= number_format($produto->preco, 2); ?> / <?= $produto->tipo_unid; ?></div>

                <div>
                    <a href="#" onclick="confirmarExclusaoProduto('<?= $produto->cod_prod; ?>')">
                        <button>Excluir Produto</button>
                    </a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>
<div id="tipos">
    <div class="lista-itens">
        <?php foreach ($listaTipoProdutos as $tipo_produto): ?>
            <div class="produto">
                <div class="nome"> <?= $tipo_produto->nome_tipo; ?> </div>
                <div>Código '<?= $tipo_produto->cod_tipo; ?>' com imposto de <?= $tipo_produto->imposto; ?> %</div>
                <a href="#" onclick="confirmarExclusaoTipoProduto('<?= $tipo_produto->cod_tipo; ?>')">
                    <button>Excluir Tipo</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


</body>
</html>