<?php
session_start();
require('servidor.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vitrine Virtual - Outlet dos Óculos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Importações -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="assets/logo-pequena.png" width="60" height="98" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link  text-white" href="#services">Vitrine Virtual</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.html">Voltar ao ínicio</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="masthead" id="vitrine">
        <div class="container">
            <img src="../assets/outlet-dos-oculos-3.png" width="12%" height="12%" />
            <br><br><br>
            <div class="masthead-subheading">Vitrine Virtual</div>
            <div class="masthead-heading text-uppercase">Descubra já sua nova armação</div>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="row col-12">
                <div class="form-group">
                    <span class="d-block p-4 bg-light ">
                        <form action='pesquisar.php' method="POST" enctype="multipart/form-data">
                            <label for="material_armacao" class="text-danger"><b>Material</b></label>
                            <select name='material_armacao' class="form-control">
                                <option>Selecione</option>
                                <?php
                        $sql = 'SELECT * FROM tb_materiais';
                        $p = $serv->prepare($sql);
                        $p->execute();
                        while ($campo = $p->fetch(PDO::FETCH_ASSOC)) {
                            if(isset($campo)){
                                echo ("<option value=" . $campo['id_mat'] . ">" . $campo['nome_mat'] . "</option>");
                                unset($campo);
                            }else{
                                echo ("erro");
                            }
                        }
                        ?>
                            </select>
                            <br>
                            <label for="marca_armacao" class="text-danger"><b>Marca</b></label>
                            <select name='marca_armacao' class="form-control">
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
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='preto' checked />
                                <label class="form-check-label" for="inlineCheckbox1">Preto</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='vermelho' />
                                <label class="form-check-label" for="inlineCheckbox1">Vermelho</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='amarelo' />
                                <label class="form-check-label" for="inlineCheckbox1">Amarelo</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='branco' />
                                <label class="form-check-label" for="inlineCheckbox1">Branco</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='azul' />
                                <label class="form-check-label" for="inlineCheckbox1">Azul</label><br>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corPrincipal" class="form-check-input"
                                    value='cinza' />
                                <label class="form-check-label" for="inlineCheckbox1">Cinza</label><br>
                            </div>

                            <br>

                            <p><label for="corSecondArmacao" class="text-danger"><b>Cor secundária</b></label></p>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="inlineCheckbox1" name="corSecondArmacao"
                                    class="form-check-input" value='preto' checked />
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

                            <center>
                                <input class="btn btn-danger text-uppercase" type="submit" value="Consultar">
                            </center>
                        </form>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>