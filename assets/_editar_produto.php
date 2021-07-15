<?php

include '../config/conexao.php';

$idProduto = $_POST['idProduto'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "UPDATE `produto` SET `idProduto`='$idProduto',`nome`='$nome',`descricao`='$descricao',`preco`='$preco' 
WHERE `idProduto` = $idProduto";
$atualizar = mysqli_query($conexao, $sql);

header("Location: ../index.php ");