function confirmarExclusaoTipoProduto(codigo) {
    var confirmado = confirm("Deseja realmente excluir o tipo?");

    if (confirmado) {
        window.location.href = './controller/tipo_produto.php?acao=excluir&codigo=' + codigo;
    }
}

function confirmarExclusaoProduto(codigo) {
    var confirmado = confirm("Deseja realmente excluir o produto?");

    if (confirmado) {
        window.location.href = './controller/produto.php?acao=excluir&codigo=' + codigo;
    }
}
$(document).ready(function () {
    $("#oculta").hide();
    $("#produtos").hide();
    $("#mostra").click(function () {
        $("#produtos").show();
        $("#mostra").hide();
        $("#oculta").show();
    });
    $("#oculta").click(function () {
        $("#produtos").hide();
        $("#mostra").show();
        $("#oculta").hide();
    })

    $("#ocultat").hide();
    $("#tipos").hide();
    $("#mostrat").click(function () {
        $("#tipos").show();
        $("#mostrat").hide();
        $("#ocultat").show();
    });
    $("#ocultat").click(function () {
        $("#tipos").hide();
        $("#mostrat").show();
        $("#ocultat").hide();
    })
});