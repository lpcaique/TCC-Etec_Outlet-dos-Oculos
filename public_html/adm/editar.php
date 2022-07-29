<?php

session_start();
if(isset($_SESSION['user']['login_adm'])){
   $user = $_SESSION['user']['login_adm'];
}else{
    header('Location: index.php');
}
require('../servidor.php');

$id= $_GET['id_arm'];
$sql = 'SELECT * FROM tb_armacoes WHERE id_arm = ?';
$p = $serv->prepare($sql);
$p->bindValue(1, $id);
$p->execute();
$oculos = $p->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Óculos</title>
</head>

<body>

</body>

</html>