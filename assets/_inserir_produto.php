<?php
include '../config/conexao.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];


$sql = "INSERT INTO `produto`(`nome`, `descricao`, `preco`) VALUES ('$nome','$descricao','$preco')";

$inserir = mysqli_query($conexao, $sql);

header('Location: ../index.php');