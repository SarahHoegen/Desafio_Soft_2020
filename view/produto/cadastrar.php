<?php
require_once __DIR__."/../../model/CrudTipoProduto.php";
include(dirname(__DIR__).'../../config.php');

$crudTipoProduto = new CrudTipoProduto();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>cadastrar</title>
    <meta charset="utf-8">
    <link href="<?=$caminhocss;?>estilo.css" rel="stylesheet">

</head>
<body>
<h3>Cadastre um Produto</h3>
<form method="post" action="?acao=cadastrar" enctype="multipart/form-data">
    <div>
        <input type="hidden" name="cod_prod" placeholder=""><br>
        <input type="text" name="nome" placeholder="Digite o nome do produto"><br>
        <input type="text" name="tipo_unid" placeholder="Digite o tipo de unidade"><br>
        <input type="number" step=".01" name="preco" placeholder="Digite o preço do produto"><br>
        <select name="fk_cod_tipo">
            <?php foreach($crudTipoProduto->getTiposProd() as $tipoProduto): ?>
            <option value="<?=$tipoProduto->cod_tipo; ?>"><?=$tipoProduto->nome_tipo; ?></option>
            <?php endforeach; ?>

        </select>
       <br><br>
        <button type="submit" name="gravar">Cadastrar</button>
    </div>
</form>


</body>
</html>
