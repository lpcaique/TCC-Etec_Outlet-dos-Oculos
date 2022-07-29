<?php
session_start();
if (isset($_SESSION['user']['login_adm'])) {
    $user = $_SESSION['user']['login_adm'];
} else {
    header('Location: index.php');
}
require('../servidor.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

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
            <a class="navbar-brand navbar-lg" href=""><img src="../assets/outlet-dos-oculos-3.png" width="60"
                    height="98" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="../index.html">Retornar ao site</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Área de administradores</a></li>
                    <div class="dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Novo
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#novo-produto">Novo Produto</a></li>
                                <li><a class="dropdown-item" href="#novo-usuario">Novo Usuário</a></li>
                                <li><a class="dropdown-item" href="#novo-marca">Nova Marca</a></li>
                                <li><a class="dropdown-item" href="#novo-material">Novo Material</a></li>
                                <li><a class="dropdown-item" href="ListaMatMar.php">Listas</a></li>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section">
        <div class="container">
            <br><br>
            <h1 class="text-uppercase text-center text-white">SEÇÃO DE ADMINISTRADORES</h1>
        </div>

        <div>
            <h1 class="text-uppercase text-center text-white">Bem Vindo,
                <?php echo $user ?>.
                <div align="center">
                    <button class="btn btn-light text-danger"><a href="logout.php"
                            class="text-danger"><b>SAIR</b></a></button>
                    <button class="btn btn-light text-danger"><a href="mudarSenha.php?login=<?php echo($user);?>"
                            class="text-danger"><b>MUDAR SENHA</b></a></button>
                </div>
            </h1><br><br><br>
            <center><img src="../assets/outlet-dos-oculos-3.png" width="12%" height="12%" /></center>
        </div>
        </ul>
        </div>
    </section>

    <div class=container>
        <div class="row">
            <div class="col-12">
                <div>
                    <div id="novo-produto">
                        <h2 class="text-uppercase text-center text-white">NOVO PRODUTO</h2>
                    </div>
                    <div class="form-group">
                        <span class="d-block p-4 bg-light ">
                            <form action='processaOculos.php' method="POST" enctype="multipart/form-data">
                                <label for="nome_armacao" class="text-danger"><b>Nome</b></label>
                                <input required type="text" name='nome_armacao' class="bg-muted text-dark form-control"
                                    placeholder='NOME DO PRODUTO' /><br>


                                <label for="material_armacao" class="text-danger"><b>Material</b></label>
                                <select name='material_armacao' class="form-control" required>
                                    <option>Selecione</option>
                                    <?php
                        $sql = 'SELECT * FROM tb_materiais';
                        $p = $serv->prepare($sql);
                        $p->execute();
                        while ($campo = $p->fetch(PDO::FETCH_ASSOC)) {
                            echo ("<option value=" . $campo['id_mat'] . ">" . $campo['nome_mat'] . "</option>");
                        }
                        ?>
                                </select>
                                <br>
                                <label for="marca_armacao" class="text-danger"><b>Marca</b></label>
                                <select required name='marca_armacao' class="form-control">
                                    <option>Selecione</option>
                                    <?php
                        $sql = 'SELECT * FROM tb_marcas';
                        $p = $serv->prepare($sql);
                        $p->execute();
                        while ($campo = $p->fetch(PDO::FETCH_ASSOC)) {
                            echo ("<option value=" . $campo['id_mar'] . ">" . $campo['nome_mar'] . "</option>");
                        }
                        ?>
                                </select>
                                <br>

                                <p><label for="corPrincipal" class="text-danger"><b>Cor principal</b></label></p>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='preto' />
                                    <label class="form-check-label" for="inlineCheckbox1">Preto</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='vermelho' />
                                    <label class="form-check-label" for="inlineCheckbox1">Vermelho</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='amarelo' />
                                    <label class="form-check-label" for="inlineCheckbox1">Amarelo</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='branco' />
                                    <label class="form-check-label" for="inlineCheckbox1">Branco</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='azul' />
                                    <label class="form-check-label" for="inlineCheckbox1">Azul</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corPrincipal"
                                        class="form-check-input" value='cinza' />
                                    <label class="form-check-label" for="inlineCheckbox1">Cinza</label><br>
                                </div>

                                <br>

                                <p><label for="corSecondArmacao" class="text-danger"><b>Cor secundária</b></label></p>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='preto' />
                                    <label class="form-check-label" for="inlineCheckbox1">Preto</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='vermelho' />
                                    <label class="form-check-label" for="inlineCheckbox1">Vermelho</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='amarelo' />
                                    <label class="form-check-label" for="inlineCheckbox1">Amarelo</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='branco' />
                                    <label class="form-check-label" for="inlineCheckbox1">Branco</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='azul' />
                                    <label class="form-check-label" for="inlineCheckbox1">Azul</label><br>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                        class="form-check-input" value='cinza' />
                                    <label class="form-check-label" for="inlineCheckbox1">Cinza</label><br>
                                </div>
                                <br><br><br>
                                <center>
                                    <div class=" container row col-4 custom-file bg-light-50 rounded">
                                        <span class="">
                                            <br>
                                            <label class="custom-file-label text-danger" for="foto_armacao"><b>SELECIONE
                                                    UMA FOTO</b></label>
                                            <br>
                                            <hr class="bg-danger">
                                            <br>

                                            <input type="file" name='foto_armacao' class="custom-file-input text-center"
                                                id="validatedCustomFile" required>

                                            <div class="invalid-feedback">Selecione uma foto 1080x1080 em PNG ou JPEG
                                            </div>
                                            <br><br>
                                        </span>
                                        <b class="text-danger">Selecione uma foto 1080x1080<br>(PNG ou JPEG)</b>
                                    </div>
                                </center>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=container>
        <div class="row text-center">
            <div class="col-12">
                <span class="d-block p-2 bg-light">
                    <input type="submit" value="Cadastrar" class="btn btn-danger text-light" />
                    &emsp;
                    <input type="reset" value="Limpar" class="btn btn-danger text-light" />
                </span>
            </div>
        </div>
    </div>
    </form>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="novo-usuario">
                    <h2 class="text-uppercase text-white text-center">NOVO USUÁRIO</h2>
                </div>
                <div class="form-group">
                    <span class="d-block p-4 bg-light text-center">
                        <form action="processaUser.php" method="post">
                            <label for="nvUser" class="text-danger"><b>Usuário</b>
                                <input type="text" id='nvUser' name='nvUser' class="bg-muted text-dark form-control" />
                            </label>

                            <label for="nvSenha" class="text-danger"><b>Senha</b>
                                <input type="password" id='nvSenha' name='nvSenha'
                                    class="bg-muted text-dark form-control" />
                            </label>
                    </span>
                </div>

                <span class="d-block p-2 bg-light text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-danger text-light">
                    &emsp;
                    <input type="reset" value="Limpar" class="btn btn-danger text-light">
                    </form>
                </span>
            </div>

            <div class="col-6">
                <div id="novo-material" style="margin-bottom:30px;">
                    <br>
                    <h2 class="text-uppercase text-white text-center">NOVO Material</h2>
                </div>
                <div class="form-group">
                    <span class="d-block p-4 bg-light text-center">
                        <form action="processaMaterial.php" method="post">
                            <label for="nvMaterial" class="text-danger"><b>Material</b>
                                <input type="text" id='nvMaterial' name='nvMaterial'
                                    class="bg-muted text-dark form-control" />
                            </label>
                    </span>
                </div>
                <span class="d-block p-2 bg-light text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-danger text-light">
                    &emsp;
                    <input type="reset" value="Limpar" class="btn btn-danger text-light">
                    </form>
                </span>
            </div>

            <div class="col-6">
                <div id="novo-marca" style="margin-bottom:30px;">
                    <br>
                    <h2 class="text-uppercase text-white text-center">NOVA MARCA</h2>
                </div>
                <div class="form-group">
                    <span class="d-block p-4 bg-light text-center">
                        <form action="processaMarca.php" method="post">
                            <label for="nvMarca" class="text-danger"><b>Marca</b>
                                <input type="text" id='nvMarca' name='nvMarca'
                                    class="bg-muted text-dark form-control" />
                            </label>
                    </span>
                </div>
                <span class="d-block p-2 bg-light text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-danger text-light">
                    &emsp;
                    <input type="reset" value="Limpar" class="btn btn-danger text-light">
                    </form>
                </span>
            </div>
            <div class="col-12">
                <br>
                <div id="nova-loja">
                    <h2 class="text-uppercase text-white text-center">NOVA LOJA</h2>
                </div>
                <div class="form-group">
                    <span class="d-block p-4 bg-light text-center">
                        <form action="processaLoja.php" method="post">
                            <label for="nvLoja" class="text-danger"><b>Nome da Loja</b>
                                <input type="text" id='nvLoja' name='nvLoja' class="bg-muted text-dark form-control" />
                            </label>

                            <label for="nvCep" class="text-danger"><b>CEP</b>
                                <input type="text" id='nvCep' name='nvCep' class="bg-muted text-dark form-control"
                                    placeholder="Ex.: 18000-000" />
                            </label>

                            <label for="nvEnd" class="text-danger"><b>Endereço</b>
                                <input type="text" id='nvEnd' name='nvEnd' class="bg-muted text-dark form-control"
                                    placeholder="Ex.: Rua ..., 315 - Vila ...." />
                            </label>

                            <label for="nvTel" class="text-danger"><b>Telefone</b>
                                <input type="text" id='nvTel' name='nvTel' class="bg-muted text-dark form-control"
                                    placeholder="Ex.: 15 991707070" />
                            </label>
                    </span>
                </div>

                <span class="d-block p-2 bg-light text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-danger text-light">
                    &emsp;
                    <input type="reset" value="Limpar" class="btn btn-danger text-light">
                    </form>
                </span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="js/selecionaOculos.js"></script>
</body>

</html>