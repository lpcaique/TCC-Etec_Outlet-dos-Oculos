<?php

    session_start();
    if(isset($_SESSION['user']['login_adm'])){
        $user = $_SESSION['user']['login_adm'];
    }else{
        header('Location: index.php');
    }
    require('../servidor.php');

    $id = $_GET['id_arm'];
    
    $sql = "DELETE FROM `tb_armacoes` WHERE `tb_armacoes`.`id_arm` = ?;";
    $p = $serv->prepare($sql);
    $p->bindValue(1, $id);
    if ($p->execute()){
        echo('<script type="text/javascript"> alert("A armação foi excluida com sucesso");</script>');
        echo('<script>window.location = "menu.php.php";</script>');
    }

?>