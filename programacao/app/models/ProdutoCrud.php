<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 14:32
 */

require_once 'DBConnection.php';
require_once 'Produto.php';

class ProdutoCrud
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getProduto(int $id_produto)
    {
        //RETORNA UM PRODUTO, DADO UM ID

        //FAZER A CONSULTA

        $sql = 'select * from produto where id_produto=' . $id_produto;
        $result = $this->conexao->query($sql);

        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $produto = $result->fetch(PDO::FETCH_ASSOC);

        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoprod = new Produto($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'],  $produto['preco_produto'],$produto['foto_produto'], $produto['id_produto']);

        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
        return $objetoprod;

    }



    public function getProdutos()
    {
        $sql = "SELECT * FROM produto";

        $result = $this->conexao->query($sql);

        $produtos = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as $produto){
            $id_produto = $produto['id_produto'];
            $nome = $produto['nome_produto'];
            $descricao = $produto['descricao_produto'];
            $foto = $produto['foto_produto'];
            $preco = $produto['preco_produto'];
            $id_categoria = $produto['id_categoria'];


            $obj = new Produto($id_produto, $nome, $descricao, $foto,$preco,$id_categoria);
            $listaProduto[] = $obj;
        }
        return $listaProduto;


    }






}