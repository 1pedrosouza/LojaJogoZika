<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

extract($_REQUEST,EXTR_OVERWRITE);

$informa = visuUsuarioCodigo($conn, $codigousu);



?>

<div class="container">

<form class="row g-3" action="../controler/alterarUsuario.php" method="POST">
  
   <input type="hidden" name="codigousu" value="<?=$informa["idusu"]?>">

  <div class="col-md-6">
    <label for="inputNome4" class="form-label">Nome</label>
    <input type="text" name="nomeusu" class="form-control" value="<?=$informa["nomeusu"]?>"  id="inputNome4" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="emailusu" class="form-control" value="<?=$informa["emailusu"]?>" id="inputEmail4" required>
  </div>
  <div class="col-6">
    <label for="inputFone" class="form-label">Fone</label>
    <input type="text" name="foneusu" class="form-control" value="<?=$informa["foneusu"]?>" id="inputfone" placeholder="(11)969480059" required>
  </div>
  <div class="col-6">
    <label for="inputCPF" class="form-label">CPF</label>
    <input type="text" name="cpfusu" class="form-control" value="<?=$informa["cpfusu"]?>" id="inputCPF" placeholder="777.777.777-77" required>
  </div>
  <div class="col-md-4">
    <label for="inputCEP" class="form-label">CEP</label>
    <input type="text" name="cepusu" class="form-control" value="<?=$informa["cepusu"]?>" id="inputCEP" placeholder="00000-000" required>
  </div>
  <div class="col-4">
    <label for="inputNumero" class="form-label">Número</label>
    <input type="number" name="numusu" class="form-control" value="<?=$informa["numusu"]?>" id="inputNumero" placeholder="00" required>
    <div class="col-md-5">
    <label for="inputComp" class="form-label">Complemento</label>
    <input type="text" name="compleusu" class="form-control" value="<?=$informa["compleusu"]?>"id="inputComp" placeholder="aaaaaaa" required>
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputTipo" class="form-label">Tipo de usuário</label>
    <select id="inputTipo" name="tipousu" class="form-select">
      <?php
      

         if($informa ["tipousu"] == "1")
         echo("Funcionário");
         else
         echo("Cliente");
    
      ?>
    </option>

    <?php
      

      if($informa ["tipousu"] == "2")
      echo("<option value=1>Funcionário</option>");
      else
      echo("<option value=2>Cliente</option>");
 
   ?>


    </select>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>

</div>

<?php
include_once("footer.php");
?>
