<?php

include '../config/conexao.php';

$idCliente = $_POST['idCliente'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

$sql = "UPDATE `cliente` SET `idCliente`='$idCliente',`nome`='$nome',`email`='$email',`cpf`='$cpf' WHERE `idCliente` = $idCliente";
$atualizar = mysqli_query($conexao, $sql);

header("Location: ../index.php ");
