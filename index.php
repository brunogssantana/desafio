<?php
include 'config/conexao.php';
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
<div class='wrapper'>
    <div id='wrapperContent' class='content container-fluid'>
        <div id='main'>
                <h1>Dashboard de vendas</h1>
    
        <!-- Início BOX clientes -->

        <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Clientes</h5>
                
        <!-- BOTÃO CADASTRO DE CLIENTE -->
        <button type="button" class="btn btn-secondary float-right btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class='fa fa-plus'></i>  Novo cliente
        </button>
        
        <!-- CONTEÚDO CADASTRO DE CLIENTE -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastro de Cliente</h5>
                
              </div>
                  <div class="modal-body">
                    <form action="assets/_inserir_cliente.php" method="POST">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                    <input type="text" class="form-control" name="nome" autocomplete="off" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                    <input type="email" class="form-control" name="email" autocomplete="off" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF:</span>
                    <input type="cpf" class="form-control" name="cpf" autocomplete="off" required>
                    </div>
                   </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
                    </form>
            </div>
        </div>
        </div>
        <!-- FIM -CONTEÚDO CADASTRO DE CLIENTE -->
  
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
                    $nome = $array['nome'];
                    $email = $array['email'];
                    $cpf = $array['cpf'];
               ?>
 
                <td><?php echo $nome; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $cpf; ?></td>
                <td>

                <!-- EDITAR CLIENTE -->
                <a href="editar_cliente.php?idCliente=<?php echo $idCliente ?>" class='btn btn-primary' title="Editar"><i class="fas fa-edit"></i></a>
                <!-- EXCLUIR CLIENTE -->
                <a href="assets/_excluir_cliente.php?idCliente=<?php echo $idCliente ?>" class='btn btn-primary' title="Excluir"><i class="fas fa-trash"></i></a>

                </td>
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
    
                <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas</h5>
            
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
               ////////////// LISTAR PRODUTOS DO BANCO //////////////
                $sql = "SELECT * FROM `produto`";
                $buscaProduto = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscaProduto)){

                    $idProduto = $array['idProduto'];
                    $nome = $array['nome'];
                    $descricao = $array['descricao'];
                    $preco = $array['preco'];
               ?>
                <form action="escolher_produto.php" method="GET">
                <td><?php echo $nome; ?></td>
                <td><?php echo $descricao; ?></td>
                <td><?php echo $preco; ?></td>
                <td>

                <!-- ESCOLHER PRODUTO -->
                <a href="escolher_produto.php?idProduto=<?php echo $idProduto;?>" class='btn btn-primary' title="Cadastrar"><i class="fas fa-plus"></i></a>
                
                </form>       
                </td>
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
            
            
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
  
        
                    <div id="piechart_3d" style="width: 500px; height: 300px;"></div>
                    

            
            <!-- INICIO TABELA -->   
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>CPF</th>
                <th>CLIENTE</th>
                <th>PRODUTO</th>
                <th>STATUS</th>
                <th>VALOR TOTAL</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>

               <?php
               ////////////// LISTAR CLIENTES DO BANCO //////////////
                $sql = "SELECT * FROM `venda`";
                $buscaVenda = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscaVenda)){

                    $idProduto = $array['idProduto'];
                    $nomeProduto = $array['produto'];
                    $dataCompra = $array['dataCompra'];
                    $preco = $array['preco'];
                    $descontoPercentual = $array['descontoPercentual'];
                    $descontoValor = $array['descontoValor'];
                    $valorTotal = $array['valorTotal'];
                    $status = $array['status'];
                    $idCliente = $array['idCliente'];
                    $nomeCliente = $array['nome'];
                    $email = $array['email'];
                    $cpf = $array['cpf'];
               ?>
                <td><?php echo $cpf ?></td>
                <td><?php echo $nomeCliente; ?></td>
                <td><?php echo $nomeProduto ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $valorTotal; ?></td>
      

            </tr>
                <?php
                }
                ////////////// FIM - LISTAR CLIENTES DO BANCO //////////////
                ?>
            
            </tbody>
            <tfoot>
            <tr>
                <th>CPF</th>
                <th>CLIENTE</th>
                <th>PRODUTO</th>
                <th>STATUS</th>
                <th>VALOR TOTAL</th>
            </tr>
            </tfoot>
        </table>



        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos</h5>

        <!-- BOTÃO CADASTRO PRODUTO -->
        <button type="button" class="btn btn-secondary float-right btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
        <i class='fa fa-plus'></i>  Novo Produto
        </button>
        
        <!-- CONTEÚDO CADASTRO PRODUTO -->
        <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadatro de Produto
                
              </div>
                  <div class="modal-body">
                    <form action="assets/_inserir_produto.php" method="POST">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                    <input type="text" class="form-control" name="nome" autocomplete="off" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Descrição:</span>
                    <textarea class="form-control" id="" name="descricao" rows="8"></textarea>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Valor:</span>
                    <input type="cpf" class="form-control" name="preco" autocomplete="off" required>
                    </div>
                   </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
                    </form>
            </div>
        </div>
        </div>
        <!-- FIM -CONTEÚDO CADASTRO PRODUTO -->
             
            
        <!-- INICIO TABELA -->   
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <tr>

               <?php
               ////////////// LISTAR PRODUTOS DO BANCO //////////////
                $sqlProduto = "SELECT * FROM `produto`";
                $buscaProduto = mysqli_query($conexao, $sqlProduto);

                while ($array = mysqli_fetch_array($buscaProduto)){

                    $idProduto = $array['idProduto'];
                    $nome = $array['nome'];
                    $descricao = $array['descricao'];
                    $preco = $array['preco'];
               ?>
 
                <td><?php echo $nome; ?></td>
                <td style="width:58%"><?php echo $descricao; ?></td>
                <td><?php echo $preco; ?></td>
                <td>

                <!-- EDITAR PRODUTOS -->
                <a href="editar_produto.php?idProduto=<?php echo $idProduto ?>" class='btn btn-primary' title="Editar"><i class="fas fa-edit"></i></a>
                <!-- EXCLUIR PRODUTOS -->
                <a href="assets/_excluir_produto.php?idProduto=<?php echo $idProduto ?>" class='btn btn-primary' title="Excluir"><i class="fas fa-trash"></i></a>

                </td>
            </tr>
                <?php
                }
                ////////////// FIM - LISTAR PRODUTOS DO BANCO //////////////
                ?>
            
            </tbody>
            <tfoot>
            <tr>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
            </tfoot>
        </table>

        </div>
    </div>
        </div>
    </div>
</div>
<script src="assets/js/app.js"></script>
<script src="https://kit.fontawesome.com/d712964458.js" crossorigin="anonymous"></script>

<!-- assets datatable -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!--Bosststrap-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>
<?php

////////////////////// FUNÇÃO CONTAGEM VALOR TOTAL DE VENDAS ///////////////////////

$resultado = mysqli_query($conexao, "SELECT sum(valorTotal), sum(descontoPercentual), count(produto) FROM venda");
$vrTotal = mysqli_num_rows($resultado);
            
            
while($vrTotal = mysqli_fetch_array($resultado)){


?>

<!-- INICIO - GRAFÍCOS GOOGLE-->   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Nro Vendas: <?php echo $vrTotal['count(produto)']; ?>',<?php echo $vrTotal['count(produto)']; ?>],
                        ['Descontos % <?php echo number_format($vrTotal['sum(descontoPercentual)'], 2); ?>',  <?php echo number_format($vrTotal['sum(descontoPercentual)'], 2); ?>],
                        ['Valor Total R$<?php echo number_format($vrTotal['sum(valorTotal)'], 2); ?>', <?php echo number_format($vrTotal['sum(valorTotal)'], 2); ?>]
                        ]);

                        var options = {
                        title: 'Visão geral',
                        is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                    </script>
                    <!-- FIM - GRAFÍCOS GOOGLE-->
<?php
}
?>