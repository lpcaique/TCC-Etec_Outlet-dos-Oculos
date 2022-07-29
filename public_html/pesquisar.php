<?php
    session_start();
    require('servidor.php');

    $materialPesquisa = $_POST['material_armacao'];
    $marcaPesquisa = $_POST['marca_armacao'];
    $cor1Pesquisa = $_POST['corPrincipal'];
    $cor2Pesquisa = $_POST['corSecondArmacao'];

    $sql= "SELECT * FROM tb_marcas";
    $p = $serv->prepare($sql);
    $p->execute();
    $i = 1;
    while($marcas = $p->fetch(PDO::FETCH_ASSOC)){
        $nomes_marcas[$i] = $marcas['nome_mar'];
        $i = $i + 1;
    }
    $i = null;
    
    $sql= "SELECT * FROM tb_materiais";
    $p = $serv->prepare($sql);
    $p->execute();
    $i = 1;
    while($material = $p->fetch(PDO::FETCH_ASSOC)){
        $nomes_material[$i] = $material['nome_mat'];
        $i = $i + 1;
    }
    $i = null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitrine Virtual - Pesquisa</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center p-5 mb-2 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href=""><img src="assets/logo-pequena.png" width="60" height="98" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="index.html">Retornar ao site</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section style="margin-top: 20px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="container">
                    <h1 class="text-light">CONFIRA:</h1>
                    <hr>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class='btn btn-danger' id='btn5'>Todos</button>
                        <button class='btn btn-danger' id='btn1'>Material</button>
                        <button class='btn btn-danger' id='btn2'>Marca</button>
                        <button class='btn btn-danger' id='btn3'>Cor principal</button>
                        <button class='btn btn-danger' id='btn4'>Cor secundária</button>
                    </div>

                    <br><br>

                    <center id='1'>
                        <h3 class="text-light">Material</h3>
                        <ul id="lista">
                            <?php
                        if($marcaPesquisa!= 'Selecione'){
                            $sql = "SELECT * FROM `tb_armacoes` WHERE id_mar = $marcaPesquisa";
                        }else{
                            $sql = "SELECT * FROM `tb_armacoes`";
                        }
                            $preview = $serv->query($sql);
                            $i = 0;
                            while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
                                $dados['id_mar'] = $nomes_marcas[$dados['id_mar']];
                                $dados['id_mat'] = $nomes_material[$dados['id_mat']];
                                $arrayDados[$i] = $dados;
                                $i++;
                            
                        ?>
                            <a style='text-decoration: none;' href='demonstrcaoOculos.html?id_arm=<?php echo($dados['
                                id_arm']); ?>'class="item-lista">
                                <li class="list-group-item blocoCard">
                                    <div class="card text-center"
                                        style="width: 220px;justify-content: center;display: flex;align-items: center;">
                                        <div class="cxImgOculos">
                                            <img src="adm/<?php echo($dados['foto_arm']); ?>" class="card-img-top"
                                                alt="fotoÓculos:<?php echo($dados['foto_arm']); ?>"
                                                style="height: 150px; width:150px;" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo($dados['nome_arm']); ?>
                                            </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item txtCard">Material:
                                                <?php echo($dados['id_mat']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Marca:
                                                <?php echo($dados['id_mar']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor principal:
                                                <?php echo($dados['corPrincipal_arm']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor secundária:
                                                <?php echo($dados['corSecund_arm']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            <?php
                            }
                            ?>
                        </ul>
                    </center>


                    <center id='2'>
                        <h3 class="text-light">Marca</h3>
                        <ul id="lista">
                            <?php
                    if($marcaPesquisa!= 'Selecione'){
                        $sql = "SELECT * FROM `tb_armacoes` WHERE id_mat = $marcaPesquisa";
                    }else{
                        $sql = "SELECT * FROM `tb_armacoes`";
                    }
                        $preview = $serv->query($sql);
                        $i = 0;
                        while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
                            $dados['id_mar'] = $nomes_marcas[ $dados['id_mar']];
                            $dados['id_mat'] = $nomes_material[ $dados['id_mat']];
                            $arrayDados[$i] = $dados;
                            $i++;
                        
                    ?>
                            <a style='text-decoration: none;' href='demonstrcaoOculos.html?id_arm=<?php echo($dados['
                                id_arm']); ?>'class="item-lista">
                                <li class="list-group-item blocoCard">
                                    <div class="card text-center"
                                        style="width: 220px;justify-content: center;display: flex;align-items: center;">
                                        <img src="adm/<?php echo($dados['foto_arm']); ?>" class="card-img-top"
                                            alt="fotoÓculos:<?php echo($dados['foto_arm']); ?>"
                                            style="height: 150px; width:150px;" />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo($dados['nome_arm']); ?>
                                            </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item txtCard">Material:
                                                <?php echo($dados['id_mat']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Marca:
                                                <?php echo($dados['id_mar']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor:
                                                <?php echo($dados['corPrincipal_arm']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor secundária:
                                                <?php echo($dados['corSecund_arm']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                        </ul>
                    </center>


                    <center id='3'>
                        <h3 class="text-light">Cor principal</h3>
                        <ul id="lista">
                            <?php
                    if(isset($cor1Pesquisa)){
                        $sql = "SELECT * FROM tb_armacoes WHERE corPrincipal_arm = ?";
                    }else{
                        $sql = 'SELECT * FROM `tb_armacoes`';
                    }
                        $preview = $serv->prepare($sql);
                        $preview->bindValue(1, $cor1Pesquisa);
                        $preview->execute();
                        $i = 0;
                        while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
                            $dados['id_mar'] = $nomes_marcas[ $dados['id_mar']];
                            $dados['id_mat'] = $nomes_material[ $dados['id_mat']];
                            $arrayDados[$i] = $dados;
                            $i++;
                        
                    ?>
                            <a style='text-decoration: none;' href='demonstrcaoOculos.html?id_arm=<?php echo($dados['
                                id_arm']); ?>'class="item-lista">
                                <li class="list-group-item blocoCard">
                                    <div class="card text-center"
                                        style="width: 220px;justify-content: center;display: flex;align-items: center;">
                                        <img src="adm/<?php echo($dados['foto_arm']); ?>" class="card-img-top"
                                            alt="fotoÓculos:<?php echo($dados['foto_arm']); ?>"
                                            style="height: 150px; width:150px;" />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo($dados['nome_arm']); ?>
                                            </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item txtCard">Material:
                                                <?php echo($dados['id_mat']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Marca:
                                                <?php echo($dados['id_mar']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor:
                                                <?php echo($dados['corPrincipal_arm']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor secundária:
                                                <?php echo($dados['corSecund_arm']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                        </ul>
                    </center>


                    <center id='4'>
                        <h3 class="text-light">Cor secundária</h3>
                        <ul id="lista">
                            <?php     
                        $sql = "SELECT * FROM tb_armacoes WHERE corSecund_arm = ?";
                        $preview = $serv->prepare($sql);
                        $preview->bindValue(1, $cor2Pesquisa);
                        $preview->execute();
                        $i = 0;
                        while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
                            $dados['id_mar'] = $nomes_marcas[ $dados['id_mar']];
                            $dados['id_mat'] = $nomes_material[ $dados['id_mat']];
                            $arrayDados[$i] = $dados;
                            $i++;
                        
                    ?>
                            <a style='text-decoration: none;' href='demonstrcaoOculos.html?id_arm=<?php echo($dados['
                                id_arm']); ?>'class="item-lista">
                                <li class="list-group-item blocoCard">
                                    <div class="card text-center"
                                        style="width: 220px;justify-content: center;display: flex;align-items: center;;">
                                        <img src="adm/<?php echo($dados['foto_arm']); ?>" class="card-img-top"
                                            alt="fotoÓculos:<?php echo($dados['foto_arm']); ?>"
                                            style="height: 150px; width:150px;" />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo($dados['nome_arm']); ?>
                                            </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item txtCard">Material:
                                                <?php echo($dados['id_mat']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Marca:
                                                <?php echo($dados['id_mar']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor:
                                                <?php echo($dados['corPrincipal_arm']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor secundária:
                                                <?php echo($dados['corSecund_arm']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                        </ul>
                    </center>

                    <center id='5'>
                        <h3 class="text-light">Oculos</h3>
                        <ul id="lista">
                            <?php
                            $sql = "SELECT * FROM `tb_armacoes`";
                        
                            $preview = $serv->query($sql);
                            $i = 0;
                            while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
                                $dados['id_mar'] = $nomes_marcas[$dados['id_mar']];
                                $dados['id_mat'] = $nomes_material[$dados['id_mat']];
                                $arrayDados[$i] = $dados;
                                $i++;
                            
                        ?>
                            <a style='text-decoration: none;' href='demonstrcaoOculos.html?id_arm=<?php echo($dados['
                                id_arm']); ?>'class="item-lista">
                                <li class="list-group-item blocoCard">
                                    <div class="card text-center"
                                        style="width: 220px;justify-content: center;display: flex;align-items: center;">
                                        <div class="cxImgOculos">
                                            <img src="adm/<?php echo($dados['foto_arm']); ?>" class="card-img-top"
                                                alt="fotoÓculos:<?php echo($dados['foto_arm']); ?>"
                                                style="height: 150px; width:150px;" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php echo($dados['nome_arm']); ?>
                                            </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item txtCard">Material:
                                                <?php echo($dados['id_mat']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Marca:
                                                <?php echo($dados['id_mar']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor:
                                                <?php echo($dados['corPrincipal_arm']); ?>
                                            </li>
                                            <li class="list-group-item txtCard">Cor secundária:
                                                <?php echo($dados['corSecund_arm']); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </a>
                            <?php
                            }
                            ?>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <script src="adm/js/navbar.js"></script>
</body>

</html>