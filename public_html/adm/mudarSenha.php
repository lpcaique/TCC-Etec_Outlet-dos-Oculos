<?php
    session_start();
    if (isset($_SESSION['user']['login_adm'])) {
        $user = $_SESSION['user']['login_adm'];
    } else {
        header('Location: index.php');
    }
    require('../servidor.php');
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitrine Virtual - mudar senha</title>
    <link rel="stylesheet" href="css/lista.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="p-3 mb-2 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href="..\index.html"><img src="../assets/outlet-dos-oculos-3.png" width="60" height="98" /></a>
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
            <h1 class="text-uppercase text-center text-white">Troca de senhas</h1>
        </div>
    </section>

    <section class="page-section">
        <center>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6 bg-light">
                        <div id="cxInput form-group">
                            <span class="d-block p-4 bg-light text-center">
                                <form action="processaMudarSenha.php" method="post">
                                    <div class="text-danger">
                                        <label for="login">Login: </label>
                                        <input type="text" name="login" id="login" readonly
                                            value='<?php echo($user) ?>'>
                                    </div>

                                    <div class="text-danger">
                                        <label for="nvSenha">Nova senha: </label>
                                        <input type="password" name="nvSenha" id="nvSenha" require>
                                    </div>
                                    <div>
                                        <input type="submit" value="mudar senha">
                                    </div>
                                </form>
                        </div>
                        </span>
                    </div>
                </div>
        </center>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>