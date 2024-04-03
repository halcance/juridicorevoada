<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Editar Casamento";


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET["casa"])){
  $stmt = $pdo->prepare("SELECT * FROM casamento WHERE id=:id");
  $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
  $param_id = $_GET["casa"];
  $stmt->execute();
  $dados = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $dados["id"];
  $noivo = $dados["noivo"];
  $id_noivo = $dados["id_noivo"];
  $noiva = $dados["noiva"];
  $id_noiva = $dados["id_noiva"];
  $test_um = $dados["test_um"];
  $test_dois = $dados["test_dois"];
  $status = $dados["status"];
  $data = $dados["data"];
  $regime = $dados["regime"];
  $nota = $dados["nota"];
  $juiz = $dados["juiz"];


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

    $query = "UPDATE casamento SET status=:status, juiz=:juiz WHERE id=:id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':status', $_POST['status'], PDO::PARAM_STR);    
    $edit->bindParam(':juiz', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':id', $id, PDO::PARAM_INT);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        CASAMENTO EDITADO COM SUCESSO.
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGISTRAR NOVO CASAMENTO</h4>
                  <p class="card-description">
                    Preencha o formulário para registrar um casamento, ele será enviado para análise e futuramente aprovado ou negado. Selecione o regime correto junto com o inventário se houver.</p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                  <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOIVO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $noivo;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $id_noivo;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOIVA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $noiva;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $id_noiva;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">1° TESTEMUNHA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $test_um;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">2° TESTEMUNHA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $test_dois;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $data;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                    <label class="col-md-6 col-form-label">REGIME</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $regime;?>" disabled>
                    </div>
                      </div>
                      <div class="col-md-8">
                          <label class="col-md-6 col-form-label">NOTAS</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?php echo $nota;?>" disabled>
                          </div>
                      </div>
                    </div>
<br>
<div class="form-group">
                    <label class="col-sm-3 col-form-label">STATUS</label>
                    <div class="form-group row">
                    <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="PENDENTE" <?php if($uss_rank < 3){ echo 'disabled';} ?> <?php if($status == 'Pendente'){ echo 'checked';} ?>>
                                PENDENTE
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="ACEITO" <?php if($uss_rank < 3){ echo 'disabled';} ?> <?php if($status == 'ACEITO'){ echo 'checked';} ?>>
                                ACEITO
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="IRREGULAR" <?php if($uss_rank < 3){ echo 'disabled';} ?> <?php if($status == 'IRREGULAR'){ echo 'checked';} ?>>
                                IRREGULAR
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="NEGADO" <?php if($uss_rank < 3){ echo 'disabled';} ?> <?php if($status == 'NEGADO'){ echo 'checked';} ?>>
                                NEGADO
                              </label>
                            </div>
                          </div>
                        </div>                    </div>
                        <?php if($uss_rank > 3){ ?>
                    <button type="submit" class="btn btn-primary mb-2">ENVIAR</button>
                    <?php } ?>
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
