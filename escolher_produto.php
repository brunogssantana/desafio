<?php
include 'config/conexao.php';

/////////////// ARMAZENA DADOS DO PRODUTO PELO MÉTODO GET ///////////////

$idProduto = $_GET['idProduto'];

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

<div class=''>
    <div id='wrapperContent' class='content container-fluid'>
        <div id='main'>
                <h1>EDITAR PRODUTO</h1>
    
        <!-- Início BOX clientes -->

        <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Cliente</h5>

        

                    <!-- INICIO TABELA -->   
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>VALOR</th>
                <th>DESCONTO</th>
                <th>TOTAL</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <tr>

               <?php
               ////////////// LISTAR CLIENTES DO BANCO //////////////
                $sqlProduto = "SELECT * FROM `produto` WHERE idProduto = $idProduto";
                $buscaProduto = mysqli_query($conexao, $sqlProduto);

                while ($array = mysqli_fetch_array($buscaProduto)){

                    $idProduto = $array['idProduto'];
                    $nome = $array['nome'];
                    $descricao = $array['descricao'];
                    $preco = $array['preco'];
               ?>
                <form action="escolher_cliente.php" method="post">
                <td>
                <input type="text" name="idProduto" value="<?php echo $idProduto ?>" style="display: none;" >
                <input style="background-color:transparent; border:none;" type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" >
                </td>
                <td style="width:50%">
                <textarea style="background-color:transparent; border:none;" rows="5" cols="100%" class="form-control" name="descricao" value="<?php echo $descricao; ?>"><?php echo $descricao; ?></textarea></td>
                <td><input style="background-color:transparent; border:none;" type="text" class="form-control" name="preco" id="valor1" value="<?php echo $preco; ?>"></td>
                <td>
                <Label>Desconto %</Label>
                <input type="number" class="form-control" name="descontoPercentual" value="" id="desconto1" onblur="calcValor()" autocomplete="off">
                <Label>Desconto R$</Label>
                <input type="number" class="form-control" name="descontoValor" value="" id="desconto2" onblur="calcValor()" autocomplete="off">
                </td>
                <td><input type="text" class="form-control" name="valorTotal" value="" id="total" autocomplete="off"></td>
                <td>

                <!-- EDITAR PRODUTOS -->
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                <i class='fa fa-plus'></i>
                </button>
                </form>
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
                <th>DESCONTO</th>
                <th>TOTAL</th>
                <th>AÇÕES</th>
            </tr>
            </tfoot>
        </table>
            
            
            
            
            
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

<!-- FUNÇÃO CALCULAR DESCONTO -->
<script>
    function calcValor(){
    // zerando total
    document.getElementById("total").value = '0';
    
    // valor líquido
    var VTOTALLIQUIDO = parseFloat(document.getElementById("valor1").value);

		// desconto em porcentagem
    var DESCONTO1 = parseFloat(document.getElementById("desconto1").value);
    if( isNaN ( DESCONTO1 ) ){
    	DESCONTO1 = 0;
    }
		var PDESCONTO = parseFloat( ( VTOTALLIQUIDO * DESCONTO1 ) / 100 );

		// desconto em valor
    var VDESCONTO = parseFloat(document.getElementById("desconto2").value);
    if( isNaN ( VDESCONTO ) ){
    	VDESCONTO = 0;
    }

    var TOTAL = parseFloat(VTOTALLIQUIDO) - parseFloat(PDESCONTO) - parseFloat(VDESCONTO);

    document.getElementById("total").value = '' + TOTAL.toFixed(2);
}	
</script>
