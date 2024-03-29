<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "ADOÇÃO";

$data = new DateTime();
$dataform = $data->format('d-m-Y');

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

    $query = "INSERT INTO adocao (nome,pass,rg,sexo,pai,id_pai,mae,id_mae,medico,user,gemeo,id_gemeo,nota,nascimento,registro) VALUES 
    (:nome,:pass,:rg,:sexo,:pai,:id_pai,:mae,:id_mae,:medico,:user,:gemeo,:id_gemeo,:nota,:nascimento,:registro)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':nome', $_POST["nome"], PDO::PARAM_STR);
    $edit->bindParam(':pass', $_POST["passport"], PDO::PARAM_INT);
    $edit->bindParam(':rg', $_POST["rg"], PDO::PARAM_STR);
    $edit->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
    $edit->bindParam(':pai', $_POST['pai'], PDO::PARAM_STR);
    $edit->bindParam(':id_pai', $_POST["id_pai"], PDO::PARAM_INT);
    $edit->bindParam(':mae', $_POST['mae'], PDO::PARAM_STR);
    $edit->bindParam(':id_mae', $_POST["id_mae"], PDO::PARAM_INT);
    $edit->bindParam(':medico', $_POST['medico'], PDO::PARAM_STR);
    $edit->bindParam(':user', $uss_name, PDO::PARAM_STR);
    $edit->bindParam(':gemeo', $_POST['gemeo'], PDO::PARAM_STR);
    $edit->bindParam(':id_gemeo', $_POST["id_gemeo"], PDO::PARAM_INT);
    $edit->bindParam(':nota', $_POST['nota'], PDO::PARAM_STR);
    $edit->bindParam(':nascimento', $_POST['nascimento'], PDO::PARAM_STR);
    $edit->bindParam(':registro', $dataform, PDO::PARAM_STR);

  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
       ✅ ADOÇÃO REGISTRADA COM SUCESSO!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ADOÇÃO</h4>
                  <p class="card-description">
                    Preencha o formulário para registro de adoção. Lembre-se de que os dados devem acompanhar o documento do neonatal.</p>
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
                      <div class="col-md-4">
                          <label class="col-md-6 col-form-label">DATA DE REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $dataform; ?>" id="inlineFormInputName2" disabled>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">DATA DE NASCIMENTO</label>
                          <div class="col-md-6">
                          <input type="date" class="form-control mb-2 mr-sm-2" name="nascimento" id="inlineFormInputName2"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                          </div>
                      </div>
                      <div class="col-md-2">
                    <label class="col-md-6 col-form-label">SEXO</label>
                    <div class="col-md-8">
                    <select class="form-control mb-2 mr-sm-2" name="sexo">
                    <option value="Selecione" default>Selecione</option>
                    <option value="Masculino" default>Masculino</option>
                    <option value="Feminino" default>Feminino</option>
                    </select>
                    </div>
                      </div>
                        <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOME DO PAI</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="pai" id="inlineFormInputName2" placeholder="Alastor Collins">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">PASSAPORTE DO PAI</label>
                          <div class="col-md-4">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="id_pai" id="inlineFormInputName2" placeholder="1">
                          </div>
                      </div>
                      <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOME DA MÃE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="mae" id="inlineFormInputName2" placeholder="Charlotte Collins">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <label class="col-md-6 col-form-label">PASSAPORTE DA MÃE</label>
                          <div class="col-md-4">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="id_mae" id="inlineFormInputName2" placeholder="2">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">MÉDICO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="medico" id="inlineFormInputName2" placeholder="Roberto Voltaire">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">RESPONSÁVEL</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $uss_name;?>" id="inlineFormInputName2" placeholder="<?php echo $uss_name;?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-2">
                    <label class="col-md-6 col-form-label">GÊMEO</label>
                    <div class="col-md-8">
                    <select class="form-control mb-2 mr-sm-2" name="gemeo">
                    <option value="Selecione" default>Selecione</option>
                    <option value="Sim" default>Sim</option>
                    <option value="Não" default>Não</option>
                    </select>
                    </div>
                      </div>
                      <div class="col-md-7">
                          <label class="col-md-6 col-form-label">MATRÍCULA DO GÊMEO</label>
                          <div class="col-md-2">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="id_gemeo" id="inlineFormInputName2" placeholder="0073">
                          </div>
                      </div>
                      <div class="col-md-7">
                          <label class="col-md-6 col-form-label">NOTA</label>
                          <div class="col-md-12">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="nota" id="inlineFormInputName2" placeholder="Sem observação">
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
