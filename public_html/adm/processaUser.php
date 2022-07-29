<?php
    session_start();
    require('../servidor.php');
    if(isset($_POST['nvUser']) 
            && $_POST['nvUser'] != '' 
            && isset($_POST['nvSenha']) 
            && $_POST['nvSenha'] !='' 
            && $_POST['nvSenha']!= null 
            && $_POST['nvUser']!= null
        ){        
            $nvUser = $_POST['nvUser'];
            $nvSenha = md5($_POST['nvSenha']);
            $sql = "SELECT * FROM tb_administradores WHERE login_adm = ?";
            $p = $serv->prepare($sql);
            $p->bindValue(1,$nvUser);
            $p->execute();

            if($existe = $p->fetch(PDO::FETCH_ASSOC)){
                echo('<script type="text/javascript"> alert("Esse ususario ja existe");</script>');
                echo('<script>window.location = "menu.php";</script>');
            }else{
                $sql ="INSERT INTO tb_administradores(id_adm,login_adm,senha_adm) VALUES(NULL, ?, ?)";

                $p = $serv->prepare($sql);
                $p-> bindValue(1, $nvUser);
                $p-> bindValue(2, $nvSenha);
                if($p->execute()){
                    echo('<script type="text/javascript"> alert("Cadastrado com sucesso");</script>');
                    echo('<script>window.location = "menu.php";</script>');
                }
        
        }
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
            <div class="col-12 bg-light justify-content-center">
                <?php


    
?>
            </div>
        </div>
    </div>
    <br><br>
    <center><button class="btn btn-light text-danger"><a href="menu.php" class="text-danger"><b>VOLTAR</b></a></button>
    </center>
</body>

</html>