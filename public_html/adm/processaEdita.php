<?php

session_start();
if(isset($_SESSION['user']['login_adm'])){
   $user = $_SESSION['user']['login_adm'];
}else{
    header('Location: index.php');
}
require('../servidor.php');

$id= $_POST['id_modelo'];
$nome = $_POST['nome_modelo'];
$material = $_POST['materiais'];
$marca = $_POST['marcas'];
$cor = $_POST['cores'];
$imagem = $_FILES['fotos'];
$NomeFotoArmacao ="img/".$imagem['name'];
$diretorio = $NomeFotoArmacao;
$nvNomeFotoArmacao= $_POST['nome_foto_armacao'];

if($imagem['error']==4){
    $NomeFotoArmacao = $nvNomeFotoArmacao;
}

$sql = 'UPDATE tb_armacoes ';
$sql .= 'SET nome_modelo = ?, materiais = ?, marcas = ?, cores = ?, fotos = ?';
$sql .= 'WHERE id_modelo = ?';
$p = $serv->prepare($sql);
$p->bindValue(1, $nome);
$p->bindValue(2, $material);
$p->bindValue(3, $marca);
$p->bindValue(4, $cor);
$p->bindValue(5, $NomeFotoArmacao);
$p->bindValue(6, $id);
$p->execute();
header('Location: menu.php');

?>