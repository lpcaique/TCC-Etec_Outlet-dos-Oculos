<?php
    session_start();
    require('../servidor.php');
    if(isset($_POST['nvMarca']) && $_POST['nvMarca'] != ''){
        $nvMarca = $_POST['nvMarca'];
        $sql = "SELECT * FROM tb_marcas WHERE nome_mar = ?";
        $p = $serv->prepare($sql);
        $p->bindValue(1,$nvMarca);
        $p->execute();

    if($existe = $p->fetch(PDO::FETCH_ASSOC)){
        echo('Marca Ja Existente');
    }else{
        $sql ="INSERT INTO tb_marcas(id_mar,nome_mar) VALUES(NULL, ?)";

        $p = $serv->prepare($sql);
        $p-> bindValue(1, $nvMarca);
        if($p->execute()){
            echo('<script type="text/javascript"> alert("Cadastardo com sucesso");</script>');
            echo('<script>window.location = "ListaMatMar.php";</script>');
        }
    
    }
    }else{
        echo('<script type="text/javascript"> alert("Faltam dados");</script>');
        echo('<script>window.location = "menu.php";</script>');
    }

    