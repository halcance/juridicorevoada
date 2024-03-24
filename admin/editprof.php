<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Editar Perfil";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET["edit"])){

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
    $param_id = $_GET["edit"];
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $dados["id"];
    $name = $dados["name"];
    $cna = $dados["cna"];
    $username = $dados["username"];
    $passport = $dados["passport"];
    $role = $dados["role"];
    $image = $dados["image"];
    $rg = $dados["rg"];
    $rank = $dados["rank"];
    $org = $dados["org"];
    $created = $dados["created"];

    if($_SESSION['rank'] <= $rank){
        header("Location: ../admin/index.php");
    }
}  else {
    header("Location: ../admin/index.php");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include("partials/head.php"); ?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("partials/navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include("partials/settings-panel.php"); ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">

        <?php 
                  //Receber dados do formulário
      if($_SERVER["REQUEST_METHOD"] == "POST"){

            $query = "UPDATE users SET org=:org, role=:role, rank=:rank WHERE id=:id";
            $edit = $pdo->prepare($query);
            $edit->bindParam(':org', $_POST['org'], PDO::PARAM_STR);
            $edit->bindParam(':role', $_POST['role'], PDO::PARAM_STR);
            $edit->bindParam(':rank', $_POST['rank'], PDO::PARAM_INT);
            $edit->bindParam(':id', $id, PDO::PARAM_INT);

            if($edit->execute()){
                $data = new DateTime();
              $dataform = $data->format('d-m-Y H:i:s');
              $usuario = $_SESSION['username'];
              $mensagem = "O usuário ".$_SESSION['username']." editou o perfil do usuário ".$username;
              $sql = "INSERT INTO logs(data, mensagem, usuario) VALUES(:data, :mensagem, :usuario)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(":data", $dataform, PDO::PARAM_STR);
              $stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
              $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
              $stmt->execute();
              echo '<div class="alert alert-success md" role="alert">
             Perfil editado com sucesso! Recarregando a página em 5 segundos...
            </div>';
              header("Refresh: 5");
            } else{
              echo '<div class="alert alert-danger md" role="alert">
             ERRO: Usuário não editado.
            </div>';
            }
          }
        ?>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editando o perfil do <?php echo $name; ?></h4>
                  <p class="card-description">
                    Todos os campos são obrigatórios.
                  </p>
                  <form class="forms-sample" enctype="multipart/form-data" id="edit-usuario" action="" method="POST">
                  <div class="col-sm-3">
          <img src="<?php echo $image; ?>" width="150" height="150" class="rounded-circle me-2">
    </div>  
                  <div class="form-group">
                      <label for="exampleInputName1">NOME</label>
                      <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="<?php echo $name; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">USUÁRIO</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="<?php echo $username; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">CNA</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="<?php if($cna ==0){echo 'PENDENTE';}else{echo 'EMITIDA';}?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">PASSAPORTE</label>
                      <input type="text" id="passport" name="passport" class="form-control" value="<?php echo $passport; ?>" placeholder="<?php echo $passport; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">REGISTRO</label>
                      <input type="text" id="rg" name="rg" class="form-control" value="<?php echo $rg; ?>" placeholder="<?php echo $rg; ?>" disabled>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 col-form-label">ORGANIZAÇÃO</label>
                    <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="org" id="membershipRadios1" value="ORDEM DOS ADVOGADOS" checked>
                                ORDEM DOS ADVOGADOS
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="org" id="membershipRadios2" value="DEFENSORIA PÚBLICA">
                                DEFENSORIA PÚBLICA
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="org" id="membershipRadios2" value="TRIBUNAL DE JUSTIÇA">
                                TRIBUNAL DE JUSTIÇA
                              </label>
                            </div>
                          </div>
                        </div>                    </div>
                    <div class="form-group">
                    <div class="col-md-6">
                    <label class="col-sm-3 col-form-label">CARGO</label>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <select class="form-control" name="role">
                              <option value="ESTAGIÁRIO">ESTAGIÁRIO</option>
                              <option value="DEFENSOR PÚBLICO">DEFENSOR PÚBLICO</option>
                              <option value="ADVOGADO JÚNIOR">ADVOGADO JÚNIOR</option>
                              <option value="ADVOGADO PLENO">ADVOGADO PLENO</option>
                              <option value="ADVOGADO SÊNIOR">ADVOGADO SÊNIOR</option>
                              <option value="ADVOGADO MASTER">ADVOGADO MASTER</option>
                              <option value="CONSELHEIRO FEDERAL">CONSELHEIRO FEDERAL</option>
                              <option value="DIRETOR(A)">DIRETOR(A) OAB</option>
                              <option value="JUIZ DE DIREITO">JUIZ DE DIREITO</option>
                              <option value="DESEMBARGADOR">DESEMBARGADOR</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                    <label class="col-sm-3 col-form-label">RANK</label>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <select class="form-control" name="rank">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">DATA DE CADASTRO</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="<?php echo $created; ?>" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../admin/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../admin/vendors/select2/select2.min.js"></script>
  <script src="../admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../admin/js/off-canvas.js"></script>
  <script src="../admin/js/hoverable-collapse.js"></script>
  <script src="../admin/js/template.js"></script>
  <script src="../admin/js/settings.js"></script>
  <script src="../admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../admin/js/file-upload.js"></script>
  <script src="../admin/js/typeahead.js"></script>
  <script src="../admin/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
