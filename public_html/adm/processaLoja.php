<?php

session_start();
if (isset($_SESSION['user']['login_adm'])) {
    $user = $_SESSION['user']['login_adm'];
} else {
    header('Location: index.php');
}
require('../servidor.php');

$nvNomeLoja = $_POST['nvLoja'];
$nvCepLoja = $_POST['nvCep'];
$nvEnderecoLoja = $_POST['nvEnd'];
$nvTelefoneLoja = $_POST['nvTel'];


$sql = 'SELECT * FROM tb_lojas WHERE cep_loj = ?';
$p=$serv->prepare($sql);
$p->bindValue(1, $nvCepLoja);
$p->execute();
$i = 0;
if($existe = $p->fetch(PDO::FETCH_ASSOC)){
    echo('certo');
}else{
   $sql = 'INSERT INTO `tb_lojas` (`id_loj`, `nome_loj`, `cep_loj`, `endereco_loj`, `telefone_loj`) VALUES(NULL, ?, ?, ?, ?)';
   $p=$serv->prepare($sql);
   $p->bindValue(1, $nvNomeLoja);
   $p->bindValue(2 , $nvCepLoja);
   $p->bindValue(3, $nvEnderecoLoja);
   $p->bindValue(4, $nvTelefoneLoja);
   if($p->execute()){
       echo('<script type="text/javascript"> alert("Cadastrado com sucesso");</script>');
       echo('<script>window.location = "menu.php";</script>');
   }
}
?>