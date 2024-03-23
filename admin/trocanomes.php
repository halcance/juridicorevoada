<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Troca de Nome";


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

    $query = "INSERT INTO nomes (idu,rg,old,new,user,date) VALUES (:idu, :rg, :old, :new, :user, NOW())";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':idu', $_POST["passaporte"], PDO::PARAM_INT);
    $edit->bindParam(':rg', $_POST["registro"], PDO::PARAM_STR);
    $edit->bindParam(':old', $_POST["nomeatual"], PDO::PARAM_STR);
    $edit->bindParam(':new', $_POST['novonome'], PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        Mudança de nome registrada com sucesso.
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGISTRAR TROCA DE NOME</h4>
                  <p class="card-description">
                    Preencha o formulário para registrar uma troca de nome.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="passaporte" id="inlineFormInputName2" placeholder="12">
                          </div>
                      </div>
                      <div class="col-md-6">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="registro" id="inlineFormInputName2" placeholder="0000AAAA">
                          </div>
                      </div>
                      </div>
                    </div>
                    <label class="sr-only" for="inlineFormInputName2">Nome Atual</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="nomeatual" id="inlineFormInputName2" placeholder="Erick Collins">
                  
                    <label class="sr-only" for="inlineFormInputName2">Novo Nome</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="novonome" id="inlineFormInputName2" placeholder="Erick Voltaire">

                    <button type="submit" class="btn btn-primary mb-2">Registrar</button>
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
