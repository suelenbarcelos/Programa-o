
    <table border="1">
        <tr>
            <td><b>Id</b></td>
            <td><b>Nome</b></td>
            <td><b>Descricao</b></td>
        </tr>
        <h4><a href="../view/Categoria/inserir.php">Inserir Categoria</a> | <a href="./view/Categoria/editar.php">Excluir Categoria</a></h4>
        <?php foreach ($categorias as $categoria):?>
        <tr>
            <td><?= $categoria->getId()?></td>
            <td><a href="?acao=show&id=<?=$categoria->getId();?>"><?= $categoria->getNome()?></a></td>
            <td><?= $categoria->getDescricao()?></td>
            <td><a href="editar.php?id=<?=$categoria->getId()?>">Editar</a> |  <a href="../../controlers/categorias.php?acao=excluir&id=<?=$categoria->getId()?>">Remover</a></td>
        </tr>
        <?php endforeach; ?>

    </table>

a