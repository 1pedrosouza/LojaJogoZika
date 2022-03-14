<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

extract($_REQUEST,EXTR_OVERWRITE);

$informa = visuJogoCodigo($conn, $codigojogo);



?>

<div class="container">

<form class="row g-3" action="../controler/alterarJogo.php" method="POST">

<input type="hidden" name="codigojogo" value="<?=$informa["idjogo"]?>">

  <div class="col-md-6">
    <label for="inputJogo" class="form-label">Nome do Jogo</label>
    <input type="text" name="nomejogo" class="form-control" value="<?=$informa["nomejogo"]?>" id="inputJogo" placeholder="XXXXXXXXXX" required>
  </div>
  <div class="col-md-6">
    <label for="inputValor" class="form-label">Valor do jogo</label>
    <input type="text" name="valorjogo" class="form-control"  value="<?=$informa["valorjogo"]?>"  id="inputValor" placeholder="XX,XX" required>
  </div>
  <div class="col-md-6">
    <label for="inputGenero" class="form-label">Tipo de Jogo</label>
    <select id="inputGenero" name="generojogo" class="form-select">
      <option selected>Escolha...</option>
      <option value="RPG">RPG</option>++++++++++++++++++++++++++++++++++++++++
      <option value="Aventura">Aventura</option>
      <option value="Puzzle">Puzzle</option>
      <option value="FPS">FPS</option>
      <option value="Corrida">Corrida</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputQuantidade" class="form-label">Quantidade de Jogos</label>
    <input type="number" name="qtdjogo" class="form-control" value="<?=$informa["qtdjogo"]?>" id="inpuQuantidade" placeholder="XXX" required>
  </div>
  <div class="col-md-4">
    <label for="inputdata" class="form-label">Data De Lançamento</label>
    <input type="date" name="datalancamentojogo" class="form-control" value="<?=$informa["datalancamentojogo"]?>" id="inputdata" placeholder="XX/XX/XXXX" required>
  </div>
  <div class="col-4">
    <label for="inputstudio" class="form-label">Studio</label>
    <input type="text" name="studiojogo" class="form-control" value="<?=$informa["studiojogo"]?>" id="inputstudio" placeholder="XXXXXXXXX" required>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>

</div>

<?php
include_once("footer.php");
?>
