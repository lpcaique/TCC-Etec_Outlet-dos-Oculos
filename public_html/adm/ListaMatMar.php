<?php
    session_start();
    require('../servidor.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais e Marcas</title>
    <link rel="stylesheet" href="css/lista.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="text-center p-5 mb-2 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href=""><img src="../assets/outlet-dos-oculos-3.png" width="60" height="98" /></a>
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

    <section>
        <img src="../assets/outlet-dos-oculos-3.png" width="12%" height="12%" />
        <br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="caixa col-10">
                    <h2 class="text-uppercase text-center text-white">Marcas</h2>
                    <div>
                        <?php
                        $sql = "SELECT * FROM tb_marcas";
                        $p = $serv->prepare($sql);
                        $p->execute();
                        $i = 1;
                        while ($marcas = $p->fetch(PDO::FETCH_ASSOC)) {
                            $nomes_marcas[$i] = $marcas['nome_mar'];
                            $i = $i + 1;
                            if ($marcas['nome_mar'] != '') {
                        ?>
                        <div class='lista'>
                            <p><span style="color: #DC3545">Nome Marca:</span>
                                <?php echo ($marcas['nome_mar']); ?>
                            </p>
                            <a href="processaDeletaMar.php?id_mar=<?php echo ($marcas['id_mar']); ?>">Excuir</a>
                        </div>
                        <?php
                            }
                        }
                        $i = null;
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="caixa col-10">
                    <h2 class="text-uppercase text-center text-white">Material</h2>
                    <div>
                        <?php
                        $sql = "SELECT * FROM tb_materiais";
                        $p = $serv->prepare($sql);
                        $p->execute();
                        $i = 1;
                        while ($material = $p->fetch(PDO::FETCH_ASSOC)) {
                            $nomes_material[$i] = $material['nome_mat'];
                            $i = $i + 1;
                            if ($material['nome_mat'] != '') {
                        ?>
                        <div class='lista'>
                            <p><span style="color: #DC3545">Nome Material:</span>
                                <?php echo ($material['nome_mat']); ?>
                            </p>
                            <a href="processaDeletaMat.php?id_mat=<?php echo ($material['id_mat']); ?>">Excuir</a>
                        </div>
                        <?php
                            }
                        }
                        $i = null;
                        $sql = 'SELECT * FROM `tb_armacoes`';
                        $preview = $serv->query($sql);
                        $i = 0;
                        ?>
                    </div>
                </div>
                <div class="caixa col-10">
                    <h2 class="text-uppercase text-center text-white">Lojas</h2>
                    <div>
                        <?php
                        $sql = "SELECT * FROM tb_lojas";
                        $p = $serv->prepare($sql);
                        $p->execute();
                        $i = 1;
                        while ($loja = $p->fetch(PDO::FETCH_ASSOC)) {
                            $ceps_lojas[$i] = $loja['cep_loj'];
                            $enderecos_lojas[$i] = $loja['endereco_loj'];
                            $telefones_lojas[$i] = $loja['telefone_loj'];
                            $i = $i + 1;
                            if ($loja['cep_loj'] != '') {
                        ?>
                        <div class="lista">
                            <p>
                                <span style="color: #DC3545">Nome Loja:</span>
                                <?php echo ($loja['nome_loj']) ?> <br>
                                <span style="color: #DC3545">Cep Loja:</span>
                                <?php echo ($loja['cep_loj']) ?> <br>
                                <span style="color: #DC3545">Endereço Joja:</span>
                                <?php echo ($loja['endereco_loj']) ?><br>
                                <span style="color: #DC3545">Telefone Loja:</span>
                                <?php echo ($loja['telefone_loj']) ?><br>
                            </p>

                            <div style='height: 100%; justify-content: center;'>
                                <a href="processaDeletaLoj.php?id_loj=<?php echo ($loja['id_loj']) ?>">Excluir</a>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        $i = 0;
                        ?><br><br>
                        <center><button class="btn btn-light text-danger"><a href="menu.php"
                                    class="text-danger"><b>VOLTAR</b></a></button></center>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>