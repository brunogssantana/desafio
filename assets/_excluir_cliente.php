<?php
include '../config/conexao.php';

$idCliente = $_GET['idCliente'];

$sql = "DELETE FROM `cliente` WHERE idCliente = $idCliente";
$deletar = mysqli_query($conexao, $sql);

header('Location: ../index.php');