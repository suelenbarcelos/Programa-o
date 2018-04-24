
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="../../controlers/categorias.php?acao=editar" method="post">
    <input value="<?= $categoria->getNome()?>" type="text" name="nome">
    <input value="<?= $categoria->getDescricao()?>" type="text" name="descricao"">
    <input type="submit" value="Salvar" >
</form>

</body>
</html>