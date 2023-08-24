<?php
include(dirname(__DIR__).'../../config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>cadastrar tipo</title>
    <meta charset="utf-8">
    <link href="<?=$caminhocss;?>estilo.css" rel="stylesheet">

</head>
<body>
<h3>Cadastre um Tipo de Produto</h3>
<form method="post" action="?acao=cadastrar">
    <div>
        <input type="text" name="nome_tipo" placeholder="Digite o nome do tipo de produto"><br>
        <input type="text" name="cod_tipo" placeholder="Digite o código do tipo de produto"><br>
        <input type="number" name="imposto" placeholder="Digite o imposto do tipo de produto"><br>
        <button type="submit" name="gravar">Cadastrar</button>

    </div>
</form>
</body>
</html>
