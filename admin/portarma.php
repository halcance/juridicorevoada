<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "PORTE DE ARMA";

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

    $query = "INSERT INTO porte_arma (nome,passport,rg,arma,taser,municao,data,validade,user) VALUES (:nome,:passport,:rg,:arma,:taser,:municao,:data,:validade,:user)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
    $edit->bindParam(':passport', $_POST["passport"], PDO::PARAM_INT);
    $edit->bindParam(':rg', $_POST["rg"], PDO::PARAM_STR);
    $edit->bindParam(':arma', $_POST['arma'], PDO::PARAM_STR);
    $edit->bindParam(':taser', $_POST['taser'], PDO::PARAM_STR);
    $edit->bindParam(':municao', $_POST['municao'], PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':validade', $dataformf, PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        PORTE DE ARMA LIBERADO COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">PORTE DE ARMA</h4>
                  <p class="card-description">
                    Preencha o formulário para liberação do porte de arma. Este documento tem uma validade de 04 dias. Faça a checagem da limpeza de ficha antes de solicitar.</br>
                Em casos de porte de arma, verifique se está na lista de autorização de cada emprego.</p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                  <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOME</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="nome" id="inlineFormInputName2" placeholder="Erick Collins">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="passport" id="inlineFormInputName2" placeholder="12">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">RG</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="rg" id="inlineFormInputName2" placeholder="1234ABCD">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $dataform; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">VALIDADE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $dataformf; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-2">
                    <label class="sr-only" for="inlineFormInputName2">ARMA</label>
                    <select class="form-control" name="arma">
                    <option value="Selecione" default>Selecione</option>
                    <option value="Outro" default>Outro</option>
                    <option value="Glock" default>Glock</option>
                    <option value="Pistola .50" default>Pistola .50</option>
                    <option value="HKP7 (Fajuta)" default>HKP7 (Fajuta)</option>
                    </select>
                        </div>
                        <div class="col-md-2">
                    <label class="sr-only" for="inlineFormInputName2">Taser</label>
                    <select class="form-control" name="taser">
                    <option value="Selecione" default>Selecione</option>
                    <option value="Sim" default>Sim</option>
                    <option value="Não" default>Não</option>
                    </select>
                        </div>
                        <div class="col-md-2">
                    <label class="sr-only" for="inlineFormInputName2">Munição</label>
                    <select class="form-control" name="municao">
                    <option value="Selecione" default>Selecione</option>
                    <option value="Sim" default>Sim</option>
                    <option value="Não" default>Não</option>
                    </select>
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
