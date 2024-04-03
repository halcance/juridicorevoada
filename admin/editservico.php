<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "EDITAR SERVIÇOS";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET["edit"])){

    $stmt = $pdo->prepare("SELECT * FROM servicos WHERE id=:id");
    $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
    $param_id = $_GET["edit"];
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $dados["id"];
    $name = $dados["name"];
    $valor = $dados["valor"];
    $oab = $dados["oab"];
    $painel = $dados["painel"];

}  else if($uss_rank < 5){
    header("Location: ../admin/index.php");
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

    $query = "UPDATE servicos SET name=:name,valor=:valor,oab=:oab,painel=:painel,date=:date WHERE id=:id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':name', $_POST["name"], PDO::PARAM_STR);
    $edit->bindParam(':valor', $_POST["valor"], PDO::PARAM_INT);
    $edit->bindParam(':oab', $_POST["oab"], PDO::PARAM_INT);
    $edit->bindParam(':painel', $_POST['painel'], PDO::PARAM_INT);
    $edit->bindParam(':date', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':id', $id, PDO::PARAM_STR); 
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        SERVIÇO ADICIONADO COM SUCESSO.
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">EDITANDO SERVIÇO <?php echo $name; ?></h4>
                  <p class="card-description">
                    Preencha o formulário para EDITAR um novo serviço a tabela.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOME DO SERVIÇO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="name" id="inlineFormInputName2" value="<?php echo $name; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">VALOR TOTAL</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="valor" id="inlineFormInputName2" value="<?php echo $valor; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">PORCENTAGEM ADVOGADO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="oab" id="inlineFormInputName2" value="<?php echo $oab; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">PORCENTAGEM PAINEL</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="painel" id="inlineFormInputName2" value="<?php echo $painel; ?>">
                          </div>
                      </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">ADICIONAR</button>
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
