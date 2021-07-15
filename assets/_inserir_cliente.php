<?php
include '../config/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];


$sql = "INSERT INTO `cliente`(`nome`, `email`, `cpf`) VALUES ('$nome','$email','$cpf')";

$inserir = mysqli_query($conexao, $sql);

header('Location: ../index.php');