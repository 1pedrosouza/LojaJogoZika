<?php
include_once("../model/conexao.php");
include_once("../model/JogoModel.php");
include_once("../view/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (alterarJogo($conn, $codigojogo,$nomejogo,$valorjogo,$generojogo,$qtdjogo,$datalancamentojogo,$studiojogo)){
echo("Dados alterados com sucesso.");
}else{
echo("Dados Não alterados.");

}

include_once("../view/footer.php")

?>