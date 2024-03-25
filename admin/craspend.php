<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "PENDÊNCIA FAMILIAR";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

if(isset($_GET['editpend'])){

    $id = (int)$_GET['editpend'];
    $query = "UPDATE cras_edit SET status=:status, moderador=:moderador WHERE id=$id";
    $edit = $pdo->prepare($query);
    $edit->bindValue(':status', 'ACEITO', PDO::PARAM_STR);
    $edit->bindParam(':moderador', $_SESSION['username'], PDO::PARAM_STR);
    // PARAMETROS
    if($edit->execute());
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

    $query = "INSERT INTO cras_edit (familia,solicitacao,processo,status,data,user) VALUES (:familia,:solicitacao,:processo,:status,:data,:user)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':familia', $_POST["familia"], PDO::PARAM_STR);
    $edit->bindParam(':solicitacao', $_POST["solicitacao"], PDO::PARAM_STR);
    $edit->bindParam(':processo', $_POST["processo"], PDO::PARAM_STR);
    $edit->bindValue(':status', 'PENDENTE', PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        PENDÊNCIA SOLICITADA COM SUCESSO!!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">SOLICITE UMA PENDÊNCIA NA FAMÍLIA</h4>
                  <p class="card-description">
                    Preencha o formulário caso necessite solicitar uma mudança em alguma família, é importante que preencha todos os campos corretamente.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">FAMÍLIA</label>
                    <select class="form-control" name="familia">
                    <option value="Selecione" default>Selecione...</option>
                    <?php 
                      $stmt = $pdo->prepare("SELECT nome FROM cras");
                      $stmt->execute();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                              <option value="<?php echo $dados['nome'];?>"><?php echo $dados['nome'];?></option>
                              <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                      <label for="exampleInputPassword4">SOLICITAÇÃO</label>
                      <input type="text" id="rg" name="solicitacao" class="form-control" placeholder="Adicionar Erick Collins ID 12 na família">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">N° PROCESSO</label>
                      <input type="text" id="rg" name="processo" class="form-control" placeholder="0025">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">SOLICITAR</button>
                  </form>
                </div>
              </div>
            </div>
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">SOLICITAÇÕES PENDENTES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            FAMÍLIA
                          </th>
                          <th>
                            SOLICITAÇÃO
                          </th>
                          <th>
                            PROCESSO
                          </th>
                          <th>
                            DATA
                          </th>
                          <th>
                            USER
                          </th>
                          <th>
                            AÇÕES
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $stmt = $pdo->prepare("SELECT * FROM cras_edit WHERE status='PENDENTE'");
                      $stmt->execute();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["familia"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["solicitacao"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["processo"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <a class="btn btn-sm btn-primary" href="../admin/craspend.php?editpend=<?php echo $dados["id"] ?>"><i class="mdi mdi-border-color"></i></a>
                          </td>
                        </tr>
                <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">SOLICITAÇÕES ACEITAS</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            FAMÍLIA
                          </th>
                          <th>
                            PROCESSO
                          </th>
                          <th>
                            STATUS
                          </th>
                          <th>
                            CRIADO EM
                          </th>
                          <th>
                            SOLICITADO POR
                          </th>
                          <th>
                            EXECUTADO POR
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $stmt = $pdo->prepare("SELECT * FROM cras_edit WHERE status='ACEITO' ORDER BY id DESC");
                      $stmt->execute();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["familia"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["processo"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["status"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                        </td>
                        <td>
                          <?php echo $dados["moderador"]; ?>
                        </td>
                        </tr>
                <?php } ?>
                      </tbody>
                    </table>
                  </div>
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
