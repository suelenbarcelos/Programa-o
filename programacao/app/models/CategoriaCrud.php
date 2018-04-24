<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 06/03/18
 * Time: 16:01
 */

require_once 'DBConnection.php';
require_once 'Categoria.php';

class CategoriaCrud
{
    //SEMPRE QUE A CLASSE FOR INSTANCIADA, JA FAZ A CONEXÃO E GUARDA

    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getCategoria(int $id)
    {
        //RETORNA UMA CATEGORIA, DADO UM ID

        //FAZER A CONSULTA
        $sql = 'select * from categoria where id_categoria=' . $id;
        $result = $this->conexao->query($sql);

        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $categoria = $result->fetch(PDO::FETCH_ASSOC);

        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetocat = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria']);

        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
        return $objetocat;

    }


    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria";

        $result = $this->conexao->query($sql);

        $categorias = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            $nome = $categoria['nome_categoria'];
            $descricao = $categoria['descricao_categoria'];

            $obj = new Categoria($id, $nome, $descricao);
            $listaCategoria[] = $obj;
        }
        return $listaCategoria;

    }

    //FAZER TESTES DAS FUNÇÕES NO ARQUIVO DE TESTES


    //RECEBE UM OBJETTO $cat E INSERE NA TABELA categoria DO BD
    public function insertCategoria(Categoria $cat)
    {

        //EFETUA A CONEXAO
        $this->conexao = DBConnection::getConexao();
        //MONTA O TEXTO DA INSTRUÇÂO SQL
        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) values ('{$cat->getNome()}','{$cat->getDescricao()}')";

        try {//TENTA EXECUTAR A INSTRUCAO

            $this->conexao->exec($sql);
        } catch (PDOException $e) {//EM CASO DE ERRO, CAPTURA A MENSAGEM
            return $e->getMessage();
        }
    }


    public function deleteCategoria($id)
    {

        //EFETUA A CONEXAO
        $this->conexao = DBConnection::getConexao();
        //MONTA O TEXTO DA INSTRUÇÂO SQL
        $sql = "DELETE FROM categoria WHERE id_categoria = $id";

        try {//TENTA EXECUTAR A INSTRUCAO

            $this->conexao->exec($sql);
            header("Location: ../view/Categoria/index.php");
        } catch (PDOException $e) {//EM CASO DE ERRO, CAPTURA A MENSAGEM
            return $e->getMessage();
        }
    }


    public function updateCategoria(Categoria $cat)
    {

        //MONTA O TEXTO DA INSTRUÇÃO SQL DE INSERT
        $sql = "UPDATE categoria SET
    (nome_categoria='{$cat->getNome()}' descricao_categoria= '{$cat->getDescricao()}' WHERE id_categoria '{$cat->getId()}'";

        try {//TENTA EXECUTAR A INSTRUCAO

            $this->conexao->exec($sql);
        } catch (PDOException $e) {//EM CASO DE ERRO, CAPTURA A MENSAGEM
            return $e->getMessage();
        }
    }
}