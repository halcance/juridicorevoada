<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "VISUALIZAR ADOÇÃO";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET["adoc"])){
  $stmt = $pdo->prepare("SELECT * FROM adocao WHERE id=:id");
  $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
  $param_id = $_GET["adoc"];
  $stmt->execute();
  $dados = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $dados["id"];
  $nome = $dados["nome"];
  $status = $dados["status"];
  $user = $dados["user"];
  $pass = $dados["pass"];
  $rg = $dados["rg"];
  $sexo = $dados["sexo"];
  $pai = $dados["pai"];
  $id_pai = $dados["id_pai"];
  $mae = $dados["mae"];
  $id_mae = $dados["id_mae"];
  $medico = $dados["medico"];
  $gemeo = $dados["gemeo"];
  $id_gemeo = $dados["id_gemeo"];
  $data = new DateTime($dados["nascimento"]);
  $registro = $dados["registro"];
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

    $query = "UPDATE adocao SET status=:status, juiz=:juiz WHERE id=:id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':status', $_POST["status"], PDO::PARAM_STR);
    $edit->bindParam(':juiz', $uss_name, PDO::PARAM_STR);
    $edit->bindParam(':id', $id, PDO::PARAM_INT);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
       ✅ ADOÇÃO <strong>ATUALIZADA</strong> COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><label class="badge badge-<?php if($status == 'ACEITO'){echo'success';}else{echo'warning';} ?>"><?php echo $status; ?></label> | ADOÇÃO N° <?php echo $id; ?></h4>
                  <p class="card-description">Você está visualizando a adoção.</p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                  <div class="col-md-6">
                          <label class="col-md-6 col-form-label">NOME</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $nome; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $pass; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label class="col-md-6 col-form-label">RG</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $rg; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <label class="col-md-6 col-form-label">DATA DE REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $registro; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">DATA DE NASCIMENTO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $data->format('d-m-Y'); ?>" id="inlineFormInputName2"  disabled>
                          </div>
                      </div>
                      <div class="col-md-2">
                    <label class="col-md-6 col-form-label">SEXO</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $sexo; ?>" id="inlineFormInputName2" disabled>
                    </div>
                      </div>
                        <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOME DO PAI</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $pai; ?>" id="inlineFormInputName2" placeholder="Alastor Collins" disabled>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">PASSAPORTE DO PAI</label>
                          <div class="col-md-4">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $id_pai; ?>" id="inlineFormInputName2" placeholder="1" disabled>
                          </div>
                      </div>
                      <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOME DA MÃE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $mae; ?>" id="inlineFormInputName2" placeholder="Charlotte Collins" disabled>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">PASSAPORTE DA MÃE</label>
                          <div class="col-md-4">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $id_mae; ?>" id="inlineFormInputName2" placeholder="2" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">MÉDICO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $medico; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">RESPONSÁVEL</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $user; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">JUIZ</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $juiz; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-4">
                    <label class="col-md-6 col-form-label">GÊMEO</label>
                    <div class="col-md-4">
                    <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $gemeo; ?>" id="inlineFormInputName2" disabled>
                    </div>
                      </div>
                      <div class="col-md-4">
                          <label class="col-md-6 col-form-label">MATRÍCULA DO GÊMEO</label>
                          <div class="col-md-4">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $id_gemeo; ?>" id="inlineFormInputName2" placeholder="0073" disabled>
                          </div>
                      </div>
                      <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOTA</label>
                          <div class="col-md-12">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $nota; ?>" id="inlineFormInputName2" disabled>
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
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="PENDENTE" <?php if($uss_rank < 2){ echo 'disabled';} ?> <?php if($status == 'Pendente'){ echo 'checked';} ?>>
                                PENDENTE
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="ACEITO" <?php if($uss_rank < 2){ echo 'disabled';} ?> <?php if($status == 'ACEITO'){ echo 'checked';} ?>>
                                ACEITO
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="IRREGULAR" <?php if($uss_rank < 2){ echo 'disabled';} ?> <?php if($status == 'IRREGULAR'){ echo 'checked';} ?>>
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
                        <?php if($uss_rank > 2){ ?>
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
