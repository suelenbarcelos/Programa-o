<?php

require '../models/CategoriaCrud.php';

//testando a CategoriaCrud
if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}
if ($action == 'index'){
    $crud = new CategoriaCrud();
    $categorias = $crud->getCategorias();
    include "../view/template/cabecalho.php";
    include "../view/Categoria/index.php";
    include "../view/template/rodape.php";
}

switch ($action){
    case 'cadastrar':
        $cat = new Categoria(null, $_POST['nome'],$_POST['descricao']);
        $test = new CategoriaCrud();
        $resultado = $test->insertCategoria($cat);

        include "../view/template/cabecalho.php";
        include "../view/Categoria/index.php";
        include "../view/template/rodape.php";
        break;

    case 'show':

        $id = $_GET['id'];
        $crud = new CategoriaCrud();
        $categoria = $crud->getCategoria($id);
        include "../view/template/cabecalho.php";
        include "../view/Categoria/show.php";
        include "../view/template/rodape.php";

        break;


    case 'inserir';

        if(isset($_post['inserir'])){
            include "../view/template/cabecalho.php";
            include "../view/Categoria/inserir.php";
            include "../view/template/rodape.php";
        }else{
            $cat = new Categoria(null, $_POST['nome'], $_POST['descricao']);
            $crud = new CategoriaCrud();
            $crud->insertCategoria($cat);
            header("Location: categorias.php");
        }
        break;

        case 'editar';


        if(!isset($_post['editar'])){
            $id = $_GET['id'];
            $crud= new CategoriaCrud();
            $crud->updateCategoria($id);
            include "../view/template/cabecalho.php";
            include "../view/Categoria/show.php";
            include "../view/template/rodape.php";
        }else{
            $cat = new Categoria();
            $crud = new CategoriaCrud();
            $crud->insertCategoria($cat);
            echo "aqui";
//            header("Location: Categorias.php");
        }
        break;

    case 'excluir';

        $test = new CategoriaCrud();
        $resultado = $test->deleteCategoria($_GET['id']);
        header("Location: index.php");

        break;
}

?>

