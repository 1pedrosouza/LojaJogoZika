<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Código do jogo</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="text" name="idjogo" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do jogo">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">código</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">quantidade</th>
      <th scope="col">genero</th>
    </tr>
  </thead>
  <tbody>
  <?php
$codigojogo = isset ($_POST["idjogo"])? $_POST["idjogo"]:"" ;

if($codigojogo){

  $codigoJogo = visuJogoCodigo($conn,$codigojogo);



?>
    <tr>
    <th scope="row"><?=$codigoJogo["idjogo"] ?></th>
      <td><?=$codigoJogo["nomejogo"] ?></td>
      <td><?=$codigoJogo["valorjogo"] ?></td>
      <td><?=$codigoJogo["qtdjogo"] ?></td>
      <td><?=$codigoJogo["generojogo"] ?></td>
      <td><form action="../view/alterarJogoview.php" method="POST">
        <input type="hidden" value=" <?=$codigoJogo["idjogo"] ?>" name="codigojogo" >
        <button type="submit" class="btn btn-primary">Alterar</button>
</form>

      </td>
      <td><button type="button" class="btn btn-danger" codigo="<?=$codigoJogo["idjogo"] ?>" jogo="<?=$codigoJogo["nomejogo"] ?>"  data-bs-toggle="modal" data-bs-target="#deleteModal">
  Apagar
</button></td>
    </tr>
    <?php
    }
    
    ?>
  </tbody>
</table>

</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Exclusão de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      <form action="../controler/deletarJogo.php" method="GET">
        <input type="hidden" class="codigo form-control" name="codigojogo" >
        <button type="submit" class="btn btn-danger">Sim</button>
</form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
       
      </div>
    </div>
  </div>
</div>


<script>
    var deleteUsuarioModal = document.getElementById('deleteModal');
        deleteUsuarioModal.addEventListener('show.bs.modal',function(event){
          var button = event.relatedTarget;
          var codigo = button.getAttribute('codigo');
          var jogo = button.getAttribute('jogo');

          var modalBody = deleteUsuarioModal.querySelector('.modal-body');
          modalBody.textContent = 'Gostaria de excluir o Jogo ' + jogo +'?';

          var Codigo = deleteUsuarioModal.querySelector('.modal-footer .codigo');
          Codigo.value = codigo;
        })



  </script>


<?php

include_once("../view/footer.php")

?>