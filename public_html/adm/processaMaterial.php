<?php
    session_start();
    require('../servidor.php');
    
    if(isset($_POST['nvMaterial']) && $_POST['nvMaterial'] != ''){
        $nvmaterial = $_POST['nvMaterial'];
        $sql = "SELECT * FROM tb_materiais WHERE nome_mat = ?";
        $p = $serv->prepare($sql);
        $p->bindValue(1,$nvmaterial);
        $p->execute();

    if($existe = $p->fetch(PDO::FETCH_ASSOC)){
        echo('material Ja Existente');
    }else{
        $sql ="INSERT INTO tb_materiais(id_mat,nome_mat) VALUES(NULL, ?)";

        $p = $serv->prepare($sql);
        $p-> bindValue(1, $nvmaterial);
        if($p->execute()){
            echo('<script type="text/javascript"> alert("Cadastardo com sucesso");</script>');
            echo('<script>window.location = "ListaMatMar.php";</script>');
        }
    
    }
    }else{
        echo('<script type="text/javascript"> alert("Faltam dados");</script>');
        echo('<script>window.location = "menu.php";</script>');
    }

    