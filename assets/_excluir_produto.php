<?php
include '../config/conexao.php';

$idProduto = $_GET['idProduto'];

$sql = "DELETE FROM `produto` WHERE idProduto = $idProduto";
$deletar = mysqli_query($conexao, $sql);

header('Location: ../index.php');