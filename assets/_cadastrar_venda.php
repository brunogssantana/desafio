<?php
include '../config/conexao.php';
/* 

/////////// PARA FINS DE TESTES DE RECEBIMENTO VIA GET E POST /////////// 

echo $idProduto = $_GET['idProduto'] . "<br/>";
echo $nome = $_GET['nome'] . "<br/>";
echo $descricao = $_GET['descricao'] . "<br/>";
echo $preco = $_GET['preco'] . "<br/>";
echo $descontoPercentual = $_GET['descontoPercentual'] . "<br/>";
echo $descontoValor = $_GET['descontoValor'] . "<br/>";
echo $valorTotal = $_GET['valorTotal'] . "<br/>";
echo $idCliente = $_POST['idCliente'] . "<br/>";
echo $nomeCliente = $_POST['nome'] . "<br/>";
echo $email = $_POST['email'] . "<br/>";
echo $cpf = $_POST['cpf'];
*/

$idProduto = $_GET['idProduto'];
$nome = $_GET['nome'];
$dataCompra = $_POST['dataCompra'];
$descricao = $_GET['descricao'];
$preco = $_GET['preco'];
$descontoPercentual = $_GET['descontoPercentual'];
$descontoValor = $_GET['descontoValor'];
$valorTotal = $_GET['valorTotal'];
$status = "Vendido";
$idCliente = $_POST['idCliente'];
$nomeCliente = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO `venda`(`idProduto`, `produto`, `dataCompra`, `preco`, `descontoPercentual`, `descontoValor`, `valorTotal`, `status`, `idCliente`, `nome`, `email`, `cpf`) 
        VALUES ('$idProduto','$nome','$dataCompra','$preco','$descontoPercentual','$descontoValor','$valorTotal',
                '$status','$idCliente','$nomeCliente','$email','$cpf')";
                
                $inserir = mysqli_query($conexao, $sql);
                header('Location: ../index.php');
