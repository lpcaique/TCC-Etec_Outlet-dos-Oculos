<?php

    $id = $_GET['id_loj'];
    session_start();
    if(isset($_SESSION['user']['login_adm'])){
        $user = $_SESSION['user']['login_adm'];
    }else{
        header('Location: index.php');
    }
    require('../servidor.php');
    
    $sql = "DELETE FROM `tb_lojas` WHERE `tb_lojas`.`id_loj` = ?;";
    $p = $serv->prepare($sql);
    $p->bindValue(1, $id);
    if ($p->execute()){
        echo('<script type="text/javascript"> alert("Loja excluida com sucesso");</script>');
        echo('<script>window.location = "ListaMatMar.php";</script>');
    }
?>