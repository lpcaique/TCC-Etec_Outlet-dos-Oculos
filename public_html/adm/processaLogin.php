<?php 

    session_start();
    
    require('../servidor.php');

    $user = $_POST['user'];
    $senha = md5($_POST['senha']);

    $sql = 'SELECT * FROM tb_administradores WHERE login_adm = ? and senha_adm = ?';

    $p = $serv->prepare($sql);
    $p-> bindValue(1, $user);
    $p-> bindValue(2, $senha);
    $p-> execute();

    if($campos = $p->fetch(PDO::FETCH_ASSOC)){

        $_SESSION['user']['id_adm'] = $campos['id_adm'];
        $_SESSION['user']['login_adm'] = $campos['login_adm'];
        header('Location: menu.php');
    }else{
        $_SESSION['not']['erro'] = '<h4 class="text-uppercase text-center text-warning">Usuário ou senha incorreto(s)!</p>';
        header('Location: index.php');
    }

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/global.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</html>