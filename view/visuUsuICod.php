<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Nome do usuario</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="number" name="idusu" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do Usuario">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Fone</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  <?php
$codigousu = isset ($_POST["idusu"])? $_POST["idusu"]:"" ;

if($codigousu){

  $codigoUsuarios = visuUsuarioCodigo($conn, $codigousu);


?>
    <tr>
      <th scope="row"><?=$codigoUsuarios["idusu"] ?></th>
      <td><?=$codigoUsuarios["nomeusu"] ?></td>
      <td><?=$codigoUsuarios["emailusu"] ?></td>
      <td><?=$codigoUsuarios["foneusu"] ?></td>
      <td><form action="../view/alterarform.php" method="POST">
        <input type="hidden" value=" <?=$codigoUsuarios["idusu"] ?>" name="codigousu" >
        <button type="submit" class="btn btn-primary">Alterar</button>
</form>

      </td>
      <td><button type="button" class="btn btn-danger" codigo="<?=$codigoUsuarios["idusu"] ?>" nome="<?=$codigoUsuarios["nomeusu"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
      <form action="../controler/deletarUsuario.php" method="GET">
        <input type="hidden" class="codigo form-control" name="codigousu" >
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
          var nome = button.getAttribute('nome');

          var modalBody = deleteUsuarioModal.querySelector('.modal-body');
          modalBody.textContent = 'Gostaria de excluir o Usuário ' + nome +'?';

          var Codigo = deleteUsuarioModal.querySelector('.modal-footer .codigo');
          Codigo.value = codigo;
        })



  </script>



<?php

include_once("../view/footer.php")

?>