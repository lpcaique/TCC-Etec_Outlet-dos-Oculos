<?php 
    session_start();
    require('../servidor.php');
    if(
        isset($_SESSION['user']['login_adm']) &&         
        isset($_POST['nome_armacao']) &&
        isset($_POST['material_armacao']) &&
        isset($_POST['marca_armacao']) &&
        isset($_POST['corPrincipal']) &&
        isset($_POST['corSecondArmacao']) &&
        $imagem = $_FILES['foto_armacao'] == null
    ){
        $user = $_SESSION['user']['login_adm'];
    }else{
        echo('<script type="text/javascript"> alert("Faltam dados");</script>');
        echo('<script>window.location = "menu.php";</script>');
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <title>Gerenciamento de ADMs</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/global.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../cardOculos.css">
</head>

<body class="p-3 mb-2 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href=""><img src="../assets/logo-pequena.png" width="120" height="196" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Retornar ao site</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Área de administradores</a></li>
                    <div class="dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Novo
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="js/selecionaOculos.js"></script>
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 bg-light">
                <h3 class="text-dark text-center">Produto cadastrado:</h3>
                <?php
    $nvNomeArmacao = $_POST['nome_armacao'];
    $nvIdMaterialArmacao = $_POST['material_armacao'];
    $nvIdMarcaArmacao = $_POST['marca_armacao'];
    $nvCorArmacaoPrincipal= $_POST['corPrincipal'];
    $nvCorSecondArmacao = $_POST['corSecondArmacao'];

    $imagem = $_FILES['foto_armacao'];
    $nvNomeFotoArmacao ="img/".$imagem['name'];
    $diretorio = $nvNomeFotoArmacao;

    $sql = 'INSERT INTO tb_armacoes(nome_arm, 
    corPrincipal_arm, corSecund_arm, id_mar, id_mat,foto_arm)';
    $sql .= "values(?,?,?,?,?,?)";

    $p = $serv->prepare($sql);
    $p->bindValue(1, $nvNomeArmacao);
    $p->bindValue(2, $nvCorArmacaoPrincipal);
    $p->bindValue(3, $nvCorSecondArmacao);
    $p->bindValue(4, $nvIdMarcaArmacao);
    $p->bindValue(5, $nvIdMaterialArmacao);
    $p->bindValue(6, $nvNomeFotoArmacao);

    
    echo"<hr/>";

    echo($nvIdMaterialArmacao);
    echo"<hr/>";

    echo($nvIdMarcaArmacao);
    echo"<hr/>";

    echo($nvCorArmacaoPrincipal);
    echo"<hr/>";

    echo($nvCorSecondArmacao);
    echo"<hr/>";

    echo($nvNomeFotoArmacao);
    echo"<hr/>";

    
    if($p->execute()){
        move_uploaded_file($imagem['tmp_name'], $diretorio);
    }
?>
            </div>
        </div>
    </div>
    <br><br>
    <center><button class="btn btn-light text-danger"><a href="menu.php" class="text-danger"><b>VOLTAR</b></a></button>
    </center </body>

</html>