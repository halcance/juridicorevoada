<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "ASSISTÊNCIAS";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');
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

    $query = "INSERT INTO atendimentos (cliente,pass,rg,relatorio,user,data) VALUES (:cliente, :pass, :rg, :relatorio, :user, :data)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':cliente', $_POST["cliente"], PDO::PARAM_STR);
    $edit->bindParam(':pass', $_POST["passaporte"], PDO::PARAM_INT);
    $edit->bindParam(':rg', $_POST["registro"], PDO::PARAM_STR);
    $edit->bindParam(':relatorio', $_POST['relatorio'], PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        RELATÓRIO DE ASSISTÊNCIA ENVIADO COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGISTRAR UMA ASSISTÊNCIA</h4>
                  <p class="card-description">
                    Registre uma assistência criminal preenchendo o formulário como se pede. Lembre-se de conferir o relatório de prisão do discord da polícia.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                  <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOME DO CLIENTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="cliente" id="inlineFormInputName2" placeholder="Erick Collins">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="passaporte" id="inlineFormInputName2" placeholder="12">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="registro" id="inlineFormInputName2" placeholder="0000AAAA">
                          </div>
                      </div>
                    </div>
                    <label class="sr-only" for="inlineFormInputName2">Relatório da prisão</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="relatorio" id="inlineFormInputName2" placeholder="Foi preso por dirigir na contra-mão mas pagou fiança.">
                  
                    <button type="submit" class="btn btn-primary mb-2">Inserir</button>
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
  <script src="../admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../admin/assets/vendors/select2/select2.min.js"></script>
  <script src="../admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../admin/assets/js/off-canvas.js"></script>
  <script src="../admin/assets/js/hoverable-collapse.js"></script>
  <script src="../admin/assets/js/template.js"></script>
  <script src="../admin/assets/js/settings.js"></script>
  <script src="../admin/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../admin/assets/js/file-upload.js"></script>
  <script src="../admin/assets/js/typeahead.js"></script>
  <script src="../admin/assets/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
