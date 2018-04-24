<?php

?>
<!doctype html>
<html lang="pt-br">
<body>


  <h2><?= $produto->getFoto() ?></h2>
  <h2><?= $produto->getNome() ?></h2>
  <h4>Descrição: <?= $produto->getDescricao() ?></h4>
  <h4>Preço: <?= $produto->getPreco() ?></h4>


</body>
</html>