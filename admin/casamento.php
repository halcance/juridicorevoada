<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Casamento";

$data = new DateTime();
$dataf = new DateTime('+4 days');
$dataform = $data->format('d-m-Y');
$dataformf = $dataf->format('d-m-Y');
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

    $query = "INSERT INTO casamento (noivo,id_noivo,noiva,id_noiva,regime,test_um,test_dois,user,nota,data) VALUES 
    (:noivo,:id_noivo,:noiva,:id_noiva,:regime,:test_um,:test_dois,:user,:nota,:data)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':noivo', $_POST["noivo"], PDO::PARAM_STR);
    $edit->bindParam(':id_noivo', $_POST["id_noivo"], PDO::PARAM_INT);
    $edit->bindParam(':noiva', $_POST["noiva"], PDO::PARAM_STR);
    $edit->bindParam(':id_noiva', $_POST["id_noiva"], PDO::PARAM_INT);
    $edit->bindParam(':regime', $_POST["regime"], PDO::PARAM_STR);
    $edit->bindParam(':test_um', $_POST['test_um'], PDO::PARAM_STR);
    $edit->bindParam(':test_dois', $_POST['test_dois'], PDO::PARAM_STR);
    $edit->bindParam(':nota', $_POST['nota'], PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        CASAMENTO REGISTRADO COM SUCESSO! AGUARDE LIBERAÇÃO.
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
                          <input type="text" class="form-control mb-2 mr-sm-2" name="noivo" id="inlineFormInputName2" placeholder="Erick Collins">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="id_noivo" id="inlineFormInputName2" placeholder="12">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOIVA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="noiva" id="inlineFormInputName2" placeholder="Erika Hilton">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="id_noiva" id="inlineFormInputName2" placeholder="13">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">1° TESTEMUNHA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="test_um" id="inlineFormInputName2" placeholder="Erique Collins | 13">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">2° TESTEMUNHA</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="test_dois" id="inlineFormInputName2" placeholder="Eric Collins | 14">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $dataform; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                    <label class="col-md-6 col-form-label">REGIME</label>
                    <div class="col-md-6">
                    <select class="form-control mb-2 mr-sm-2" name="regime">
                    <option value="Separação de Bens" default>SEPARAÇÃO</option>
                    <option value="Parcial de Bens" default>PARCIAL</option>
                    <option value="Universal de Bens" default>UNIVERSAL</option>
                    </select>
                    </div>
                      </div>
                      <div class="col-md-8">
                          <label class="col-md-6 col-form-label">NOTAS</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="nota" id="inlineFormInputName2" placeholder="13">
                          </div>
                      </div>
                    </div>
<br>
                    <button type="submit" class="btn btn-primary mb-2">ENVIAR</button>
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
