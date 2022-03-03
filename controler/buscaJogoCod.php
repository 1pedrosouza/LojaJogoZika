<?php
    include_once("../model/conexao.php");
    include_once("../model/jogoModel.php");
    
    
    $nome = $_POST["codigoJogo"];
    
    if(visuJogoCodigo($conn, $codigojogo)){
        header("Location:../view/visuJogoCod.php");
    }else{
        header("Location:../view/visuJogoCod.php");
    }

?>