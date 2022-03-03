<?php
    include_once("../model/conexao.php");
    include_once("../model/jogoModel.php");
    
    
    $nome = $_POST["generoJogo"];
    
    if(visuJogoGenero($conn, $generojogo)){
        header("Location:../view/visuJogoGenero.php");
    }else{
        header("Location:../view/visuJogoGenero.php");
    }

?>