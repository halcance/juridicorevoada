<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "CADASTRAR FAMÍLIA";

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

    $query = "INSERT INTO cras (processo,nome,lider,id_lider,membros,patrimonio,status,registro,modificado,user,last) 
    VALUES (:processo,:nome,:lider,:id_lider,:membros,:patrimonio,:status,:registro,:modificado,:user,:last)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':processo', $_POST["processo"], PDO::PARAM_STR);
    $edit->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
    $edit->bindParam(':lider', $_POST["lider"], PDO::PARAM_STR);
    $edit->bindParam(':id_lider', $_POST['id_lider'], PDO::PARAM_INT);
    $edit->bindValue(':membros', trim($_POST["membros"]), PDO::PARAM_STR);
    $edit->bindParam(':patrimonio', $_POST['patrimonio'], PDO::PARAM_INT);
    $edit->bindParam(':status', $_POST['status'], PDO::PARAM_STR);
    $edit->bindParam(':registro', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':modificado', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':last', $_SESSION['username'], PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        FAMÍLIA CADASTRADA COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CADASTRAR UMA FAMÍLIA</h4>
                  <p class="card-description">
                    Preencha o formulário para cadastrar uma família, deve-se seguir as normas estabelecidas. Em caso de duplicidade será NEGADO.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Nome da Família</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="nome" id="inlineFormInputName2" placeholder="Collins">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Líder da Família</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="lider" id="inlineFormInputName2" placeholder="Erick Collins">
                      </div>
                      <div class="col-md-6">
                      <label class="sr-only" for="inlineFormInputName2">Passaporte do Líder</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="id_lider" id="inlineFormInputName2" placeholder="12">
                      </div>
                    </div>
                    <style>textarea.form-control {
    height: 20em;
}</style>
                    <label class="sr-only" for="inlineFormInputName2">Membros</label>
                    <textarea type="text" name="membros" class="form-control" rows="10" cols="10"">
Erick Collins | 12
Fulano Collins | 13
Sicrano Collins | 14
</textarea>
                    <div class="row">
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">Patrimônio</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="patrimonio" id="inlineFormInputName2" placeholder="520000">
                    </div>
                    <div class="col-md-4">
                    <label class="sr-only" for="inlineFormInputName2">N° PROCESSO</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="processo" id="inlineFormInputName2" placeholder="0012">
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 col-form-label">SITUAÇÃO</label>
                    <div class="form-group row">
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="PENDENTE" checked>
                                PENDENTE
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="REGULAR" disabled>
                                REGULAR
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="IRREGULAR" disabled>
                               IRREGULAR
                              </label>
                            </div>
                          </div>
                        </div>                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Registrar</button>
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
