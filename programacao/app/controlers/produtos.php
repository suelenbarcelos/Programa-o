<?php

require '../models/ProdutoCrud.php';

//testando a CategoriaCrud
if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}
if ($action == 'index'){
    $crud = new ProdutoCrud();
    $produtos = $crud->getProdutos();
    include "../view/template/cabecalho.php";
    include "../view/Produtos/index.php";
    include "../view/template/rodape.php";
}

switch ($action){
    case 'cadastrar':
        $cat = new Categoria(null, $_POST['nome'],$_POST['descricao']);
        $test = new CategoriaCrud();
        $resultado = $test->insertCategoria($cat);

        include "../view/template/cabecalho.php";
        include "../view/Produtos/index.php";
        include "../view/template/rodape.php";
        break;

    case 'editar':

        $cat = new Categoria(null, $_POST['nome'],$_POST['descricao']);
        $test = new CategoriaCrud();
        $resultado = $test->editarCategoria($cat);

        break;

    case 'excluir';

        $test = new CategoriaCrud();
        $resultado = $test->deleteCategoria($_GET['id']);
        header("Location: index.php");

        break;

    case 'show':

        $id = $_GET['id'];
        $crud = new ProdutoCrud();
        $produto = $crud->getProduto($id);
        include "../view/template/cabecalho.php";
        include "../view/Produtos/show.php";
        include "../view/template/rodape.php";

        break;
}
