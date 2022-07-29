<?php 

$id = $_GET['id_mat'];

session_start();
    if(isset($_SESSION['user']['login_adm'])){
        $user = $_SESSION['user']['login_adm'];
    }else{
        header('Location: index.php');
    }
    require('../servidor.php');
    
    $sql = "DELETE FROM `tb_materiais` WHERE `tb_materiais`.`id_mat` = ?;";
    $p = $serv->prepare($sql);
    $p->bindValue(1, $id);
    if ($p->execute()){
        echo('<script type="text/javascript"> alert("O material foi excluido com sucesso");</script>');
        echo('<script>window.location = "ListaMatMar.php";</script>');
    }
?>