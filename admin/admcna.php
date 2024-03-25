<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "CNA";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

// SELECIONA USUÁRIOS SEM CNA
$stmt = $pdo->prepare("SELECT * FROM users WHERE cna=0");
$stmt->execute();
$total = $stmt->rowCount();


// ATIVA REGISTROS QUE ESTÃO IRREGULARES
if(isset($_GET['approve'])){

    $id = (int)$_GET['approve'];
    $query = "UPDATE users SET cna=:cna WHERE id=$id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':cna', $param_cna, PDO::PARAM_STR);
    // PARAMETROS
    $param_cna = "1";
    if($edit->execute()){
              $stmt = $pdo->prepare("SELECT * FROM users WHERE id=$id");
              $stmt->execute();
              $duser = $stmt->fetch(PDO::FETCH_ASSOC);
              $sql = "INSERT INTO cna(name, passport,rg,org,role,user,created,modified) VALUES(:name, :passport, :rg, :org, :role, :user, :created, :modified)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(":name", $duser['name'], PDO::PARAM_STR);
              $stmt->bindParam(":passport", $duser['passport'], PDO::PARAM_INT);
              $stmt->bindParam(":rg", $duser['rg'], PDO::PARAM_STR);
              $stmt->bindParam(":org", $duser['org'], PDO::PARAM_STR);
              $stmt->bindParam(":role", $duser['role'], PDO::PARAM_STR);
              $stmt->bindParam(":user", $_SESSION['username'], PDO::PARAM_STR);
              $stmt->bindParam(":created", $dataform, PDO::PARAM_STR);
              $stmt->bindParam(":modified", $dataform, PDO::PARAM_STR);
              $stmt->execute();
            // CRIAR NOVO WEBHOOK COM NOVOS PARAMETROS OU ALTERAR O EXISTENTE
            //include_once("../cna/cnaoab.php");
            header("Location: ../admin/admcna.php");
            }
  }
  if(isset($_GET['suspend'])){

    $id = (int)$_GET['suspend'];
    $query = "UPDATE cna SET status=:status, modified=:modified, last=:last WHERE id=$id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':status', $param_status, PDO::PARAM_STR);
    $edit->bindParam(':modified', $dataform, PDO::PARAM_STR);
    $edit->bindParam(':last', $_SESSION['username'], PDO::PARAM_STR);
    // PARAMETROS
    $param_status = "IRREGULAR";
    if($edit->execute()){
      $usuario = $_SESSION['username'];
              $mensagem = "O usuário ".$_SESSION['username']." suspendeu a CNA N° ".$id;
              $sql = "INSERT INTO logs(data, mensagem, usuario) VALUES(:data, :mensagem, :usuario)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(":data", $dataform, PDO::PARAM_STR);
              $stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
              $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
              $stmt->execute();
            // CRIAR NOVO WEBHOOK COM NOVOS PARAMETROS OU ALTERAR O EXISTENTE
            //include_once("../cna/cnaoab.php");
            header("Location: ../admin/admcna.php");
            }
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
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CADASTRO NACIONAL DE ADVOGADOS</h4>
                  <p class="card-description">
                    O Cadastro Nacional de Advogados (CNA) concede ao advogado seu direito de exercer sua profissão junto com todos direitos que ela lhe garante.
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- cadastro irregulares -->
          <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CNA PENDENTES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            NOME
                          </th>
                          <th>
                            USUÁRIO
                          </th>
                          <th>
                         SOLICITADO EM
                          </th>
                          <th>
                           AÇÕES
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td class="py-1">
                          <img src="<?php echo $dados["image"]; ?>" alt="image"/>
                          </td>
                          <td>
                          <?php echo $dados["name"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["username"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["created"];
                           ?>
                          </td>
                          <td>
                          <a class="btn btn-sm btn-success" href="?approve=<?php echo $dados["id"] ?>"><i class="mdi mdi-check-circle"></i></a>
        
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
          <!-- fim dos cadastro irregulares -->
          <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CADASTROS REGULARES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            NOME
                          </th>
                          <th>
                            PASSAPORTE
                          </th>
                          <th>
                          CRIADO EM
                          </th>
                          <th>
                          MODIFICADO EM
                          </th>
                          <th>
                          AUTORIZADO POR
                          </th>
                          <th>
                           AÇÕES
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $stmt = $pdo->prepare("SELECT id,name,passport,created,modified,user FROM cna WHERE status='REGULAR'");
                      $stmt->execute();
                      $total = $stmt->rowCount();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["name"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["passport"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["created"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["modified"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <a class="btn btn-sm btn-warning" href="?suspend=<?php echo $dados["id"] ?>"><i class="mdi mdi-account-convert"></i></a>
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
          <!-- fim dos cadastro regulares -->
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
