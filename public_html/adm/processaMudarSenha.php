<?php

session_start();
require('../servidor.php');
if(!isset($_SESSION['user'])){
    header('Location: index.php');
}

if($_POST['login'] == null && $_POST['nvSenha']== null){
    echo('<script>alert("Faltam dados para completar")</script>');
    echo('<script>window.location = "mudarSenha.php"</script>');
}
$usuario = $_POST['login'];
$nvSenha = $_POST['nvSenha'];


$sql = 'SELECT * FROM tb_administradores WHERE login_adm = ?';
$p = $serv->prepare($sql);
$p->bindValue(1, $usuario);
$p->execute();
if($valida = $p->fetch(PDO::FETCH_ASSOC)){
    $sql ="UPDATE `tb_administradores` SET `senha_adm` = ? WHERE `tb_administradores`.`login_adm` = ?";
    $p = $serv->prepare($sql);
    $p->bindValue(1, md5($nvSenha));
    $p->bindValue(2, $usuario);
    if($p->execute()){
        echo('<script>alert("Senha alterada com sucesso")</script>');
    echo('<script>window.location = "menu.php"</script>');
    }else{
        echo('<script>alert("Não foi possivel alterar a senha")</script>');
    echo('<script>window.location = "mudarSenha.php"</script>');
    }
}else{
    echo('<script>alert("Usuario inexistente")</script>');
    echo('<script>window.location = "mudarSenha.php"</script>');
}


?>