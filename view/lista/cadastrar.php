<?php
require_once __DIR__ . "/../../model/Produto.php";
require_once __DIR__ . "/../../model/CrudProduto.php";
require_once __DIR__ . "/../../model/Lista.php";
require_once __DIR__ . "/../../model/CrudLista.php";
require_once __DIR__ . "/../../model/CrudTipoProduto.php";


include(dirname(__DIR__) . '../../config.php');

$crud = new CrudProduto();
$listaProdutos = $crud->getProdutos();
$crud = new CrudLista();
$crudTipoProduto = new CrudTipoProduto();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>cadastrar</title>
    <meta charset="utf-8">
    <link href="<?= $caminhocss; ?>estilo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function calcular_total() {
            var total = 0;
            var total_imposto = 0;

            $('.produto').each(function (index, element) {
                var produto = $(element);

                var preco = parseFloat(produto.find('.preco').val());
                var qtd = parseInt(produto.find('.qtd').val() || '0');
                var imposto = parseFloat(produto.find('.imposto').val());

                var sub_total = ((preco * (imposto / 100)) + preco) * qtd;
                var sub_imposto = preco * (imposto / 100) * qtd;

                total += sub_total;
                total_imposto += sub_imposto;


            })
            $('.total').text('Total: R$ ' + total.toFixed(2));
            $('.total_imposto').text('Total de Imposto: R$ ' + total_imposto.toFixed(2));


        }

        function calcular_sub_total(produto, qtd) {
            var preco = parseFloat(produto.find('.preco').val());
            var imposto = parseFloat(produto.find('.imposto').val());

            var sub_total = ((preco * (imposto / 100)) + preco) * qtd;
            var sub_imposto = preco * (imposto / 100) * qtd;

            produto.find('.sub_total').text('Total: R$ ' + sub_total.toFixed(2));
            produto.find('.sub_imposto').text('Imposto: R$ ' + sub_imposto.toFixed(2));

            calcular_total();


        }

        $(document).ready(function (event) {
            $('.produto').each(function (index, element) {
                var produto = $(element);

                var qtd = parseInt(produto.find('.qtd').val() || '0');
                calcular_sub_total(produto, qtd);

                produto.find('.qtd').change(function (event) {
                    var qtd = parseInt(event.target.value || '0');
                    calcular_sub_total(produto, qtd);
                })
            })
        })
    </script>

</head>
<body>
<h2 style="text-align: center">Produtos</h2>
<form method="post" action="?acao=cadastrar">
    <div id="produtos">
        <div class="lista-itens">
            <?php foreach ($listaProdutos as $produto): ?>
                <div class="produto">
                    <input type="hidden" name="produto_cod_prod[]" value="<?= $produto->cod_prod; ?>">
                    <?php $imp = $crud->pegaImposto($produto->fk_cod_tipo); ?>
                    <input type="hidden" name="produto_imposto[]" value="<?= $imp['imposto']; ?>" class="imposto">
                    <input type="hidden" name="produto_preco[]" value="<?= $produto->preco; ?>" class="preco">

                    <div class="nome"> <?= $produto->nome; ?> </div>
                    <div><?= $crudTipoProduto->getTipoProd($produto->fk_cod_tipo)->nome_tipo; ?></div>
                    <div>Imposto: <?php print_r($imp['imposto']); ?> %</div>
                    <div>R$ <?= number_format($produto->preco, 2); ?> / <?= $produto->tipo_unid; ?></div>


                    <input type="number" min="0" name="produto_qtd[]" placeholder="Digite a quantidade" class="qtd">
                    <div class="sub_total">R$ 0,00</div>
                    <div class="sub_imposto">R$ 0,00</div>


                </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align: center">
            <p class="total">Total:R$ 0,00 </p>
            <p class="total_imposto">Total Imposto:R$ 0,00</p>
            <button type="submit" name="gravar">Enviar pedido</button>
            <br><br>
        </div>
    </div>

    <p style="display: none">Imposto é roubo</p>


</form>


</body>
</html>