<?php
include 'config/conexao.php';
////////////// SELECT PRODUTO NO BANCO //////////////
$idProduto = $_POST['idProduto'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$descontoPercentual = $_POST['descontoPercentual'];
$descontoValor = $_POST['descontoValor'];
$valorTotal = $_POST['valorTotal'];


?>


<html lang='pt-br'>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Perfect Pay - Teste - </title>
    <link href="images/brand/favicon.png" rel="icon" type="image/png"/>
    <link rel='stylesheet' href="assets/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- assets datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    
    
    <style>
        .wrapper #wrapperContent, .wrapper #wrapperContent.closed {
            padding: 0;
        }
    </style>
</head>
<body>
<!-- NAVBAR TOP -->
<nav class="navbar bg-gradient-primary" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="" href="http://127.0.0.1:8000">Teste Back End</a>
        <!-- User -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a id="bell" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span id="bell-number" class="badge badge-danger badge-pill"></span>
                </a>
                <div id='notifications' class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbar-default_dropdown_1">
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class='d-md-down-none'>Albert Einsten</span>
                    <img class='rounded-pill' src='img/destaque-albert-einstein.jpg' width='40' height='40' alt='Albert Einsten'>
                </a>
                <div class="dropdown-menu dropdown-menu-right position-absolute">
                    <div class="dropdown-header">
                        <h6 class="text-overflow m-0">Bem vindo(a)!</h6>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Início BOX clientes -->

<div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Clientes</h5>
                
  
        <!-- INICIO TABELA -->   
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NOME</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <tr>

               <?php
               ////////////// LISTAR CLIENTES DO BANCO //////////////
                $sql = "SELECT * FROM `cliente`";
                $buscaCliente = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscaCliente)){

                    $idCliente = $array['idCliente'];
                    $nomeCliente = $array['nome'];
                    $email = $array['email'];
                    $cpf = $array['cpf'];
               ?>
               <!-- USEI O FORM ACTION COM VARIÁVEIS AFIM DE DEMONSTRAR MEU CONHECIMENTO PARA SOLICITAÇÕES GET OU POST -->
                <form action="assets/_cadastrar_venda.php?idProduto=<?php echo $idProduto;?>&nome=<?php echo $nome;?>&descricao=<?php echo $descricao; ?>&preco=<?php echo $preco; ?>&descontoPercentual=<?php echo $descontoPercentual;?>&descontoValor=<?php echo $descontoValor;?>&valorTotal=<?php echo $valorTotal;  ?>" method="POST">
                <td>
                    <?php
                    //////////// DEFINIR DATA DA COMPRA ////////////
                    $dataCompra = date('d/m/Y');
                    
                    ?>
                    <input type="text" name="idCliente" value="<?php echo $idCliente; ?>" style="display: none;" >
                    <input type="text" name="dataCompra" value="<?php echo $dataCompra; ?>" style="display: none;" >
                    <input style="background-color:transparent; border:none;" type="text" class="form-control" name="nome" value="<?php echo $nomeCliente; ?>">
                </td>
                <td><input style="background-color:transparent; border:none;" type="text" class="form-control" name="email" value="<?php echo $email; ?>"></td>
                <td><input style="background-color:transparent; border:none;" type="text" class="form-control" name="cpf" value="<?php echo $cpf; ?>"></td>
                <td>

                
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Salvar</i></button>

                </td>
                </form>
            </tr>
                <?php
                }
                ////////////// FIM - LISTAR CLIENTES DO BANCO //////////////
                ?>
            
            </tbody>
            <tfoot>
            <tr>
                <th>NOME</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>AÇÕES</th>
            </tr>
            </tfoot>
        </table>
        <!-- FIM TABELA-->
        </div>
    </div>
    <!-- FIM BOX CLientes-->
    
                
<script src="assets/js/app.js"></script>
<script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>

<!-- assets datatable -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


<!--Bosststrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>