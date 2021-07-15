<?php
////////////// SELECT CLIENTE NO BANCO //////////////
include 'config/conexao.php';

$idCliente = $_GET['idCliente'];

$sql = "SELECT * FROM `cliente` WHERE idCliente = $idCliente";
$buscar = mysqli_query($conexao, $sql);

while ($array = mysqli_fetch_array($buscar)) {

    $idCliente = $array['idCliente'];
    $nome = $array['nome'];
    $email = $array['email'];
    $cpf = $array['cpf'];

}
////////////// FIM - SELECT CLIENTE NO BANCO //////////////
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

<div class='wrapper'>
    <div id='wrapperContent' class='content container-fluid'>
        <div id='main'>
                <h1>EDITAR CADASTRO</h1>
    
        <!-- Início BOX clientes -->

        <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Cliente</h5>

        

                    <form action="assets/_editar_cliente.php" method="POST">
                    <input type="text" class="form-control form-control-lg" name="idCliente" value="<?php echo $idCliente ?>" style="display: none;" >
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" autocomplete="off" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" autocomplete="off" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF:</span>
                    <input type="cpf" class="form-control" name="cpf" value="<?php echo $cpf; ?>" autocomplete="off" required>
                    </div>
                   </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
                    </form>
            
            
            
            
            
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