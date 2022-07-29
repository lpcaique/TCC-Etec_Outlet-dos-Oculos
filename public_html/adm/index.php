<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: menu.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de ADMs</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/global.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="../css/styles.css" rel="stylesheet" />
    </style>
</head>

<body class="p-3 mb-2 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href="..\index.html"><img src="../assets/outlet-dos-oculos-3.png" width="60"
                    height="98" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="../index.html">Retornar ao site</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Área de administradores</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section">
        <div class="container">
            <br><br>
            <h1 class="text-uppercase text-center text-white">SEÇÃO DE ADMINISTRADORES</h1>
            <br>
        </div>
        <center><img src="../assets/outlet-dos-oculos-3.png" width="12%" height="12%" /></center>
        <br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="processaLogin.php" method="post">

                        <div id='msg'>
                            <?php
                    if (isset($_SESSION['not']['erro'])) {
                        echo ($_SESSION['not']['erro']);
                    }
                    ?>
                        </div>
                        <div id="cxInput form-group">
                            <span class="d-block p-4 bg-light text-center">
                                <label for="user" class="text-danger"><b>Usuário</b></label>
                                <input type="text" name="user" id="user" class="bg-muted text-dark form-control" />
                                <label for="senha" class="text-danger"><b>Senha</b></label>
                                <input type="password" name="senha" id="senha"
                                    class="bg-muted text-dark form-control" />
                        </div>
                        <br>
                        <center>
                            <input type="submit" class="btn btn-danger" value="Acessar">
                            <input type="reset" class="btn btn-danger" value="Limpar">
                        </center>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>