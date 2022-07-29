<?php 
session_start();
require('../servidor.php');
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

    $sql = 'SELECT * FROM `tb_armacoes`';
    $preview = $serv->query($sql);
    $i = 0;
    while($dados = $preview->fetch(PDO::FETCH_ASSOC)){
        $dados['id_mar'] = $nomes_marcas[ $dados['id_mar']];
        $dados['id_mat'] = $nomes_material[ $dados['id_mat']];
        $arrayDados[$i] = $dados;
        $i++;
    }
    $json = json_encode($arrayDados);
    header("Content-Type:application/json");
    echo $json;
?>