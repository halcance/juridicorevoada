<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "EDITAR FAMÍLIA";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET["edcras"])){

    $stmt = $pdo->prepare("SELECT * FROM cras WHERE id=:id");
    $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
    $param_id = $_GET["edcras"];
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $dados["id"];
    $nome = $dados["nome"];
    $processo = $dados["processo"];
    $lider = $dados["lider"];
    $id_lider = $dados["id_lider"];
    $membros = $dados["membros"];
    $patrimonio = $dados["patrimonio"];
    $status = $dados["status"];
    $registro = $dados["registro"];
    $modificado = $dados["modificado"];
    $user = $dados["user"];
    $last = $dados["last"];


    if($_SESSION['rank'] <= 2){
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

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $query = "UPDATE cras SET lider=:lider, id_lider=:id_lider, membros=:membros, patrimonio=:patrimonio, status=:status, modificado=:modificado, last=:last WHERE id=:id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':lider', $_POST["lider"], PDO::PARAM_STR);
    $edit->bindParam(':id_lider', $_POST['id_lider'], PDO::PARAM_INT);
    $edit->bindValue(':membros', trim($_POST["membros"]), PDO::PARAM_STR);
    $edit->bindParam(':patrimonio', $_POST['patrimonio'], PDO::PARAM_INT);
    $edit->bindParam(':status', $_POST['status'], PDO::PARAM_STR);
    $edit->bindParam(':modificado', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':last', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':id', $id, PDO::PARAM_INT);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        FAMÍLIA EDITADA COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">EDITANDO A FAMÍLIA <?php echo $id; ?> | <?php echo $nome; ?></h4>
                  <p class="card-description">
                    Edite os campos abaixo com as novas informações.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Nome da Família</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $nome; ?>" id="inlineFormInputName2" placeholder="<?php echo $nome; ?>" disabled>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Líder da Família</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $lider; ?>" name="lider" id="inlineFormInputName2" placeholder="<?php echo $lider; ?>">
                      </div>
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Passaporte do Líder</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $id_lider; ?>" name="id_lider" id="inlineFormInputName2" placeholder="<?php echo $id_lider; ?>">
                      </div>
                    </div>
                    <style>textarea.form-control {
    height: 20em;
}</style>
                    <label class="sr-only" for="inlineFormInputName2">Membros</label>
                    <textarea type="text" name="membros" class="form-control" rows="10" cols="10"">
                    <?php echo $membros; ?>
</textarea>
                    <div class="row">
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">PATRIMÔNIO</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $patrimonio; ?>" name="patrimonio" id="inlineFormInputName2" placeholder="<?php echo $patrimonio; ?>">
                    </div>
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">N° PROCESSO</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $processo; ?>" name="processo" id="inlineFormInputName2" placeholder="<?php echo $processo; ?>" disabled>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">AUTORIZADO POR</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $user; ?>" id="inlineFormInputName2" placeholder="<?php echo $user; ?>" disabled>
                    </div>
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">ÚLTIMA MODIFICAÇÃO</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $modificado; ?> por <?php echo $last; ?>" id="inlineFormInputName2" placeholder="<?php echo $modificado; ?>" readonly>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 col-form-label">SITUAÇÃO</label>
                    <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="PENDENTE" <?php if($status == 'PENDENTE'){echo 'checked';} ?>>
                                PENDENTE
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="REGULAR"  <?php if($status == 'REGULAR'){echo 'checked';} ?>>
                                REGULAR
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="IRREGULAR"  <?php if($status == 'IRREGULAR'){echo 'checked';} ?>>
                               IRREGULAR
                              </label>
                            </div>
                          </div>
                        </div>                    </div>
                    <button type="submit" class="btn btn-primary mb-2">ATUALIZAR</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("partials/footer.php"); ?>
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
