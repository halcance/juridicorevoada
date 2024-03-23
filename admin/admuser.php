<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Troca de Nome";

$stmt = $pdo->prepare("SELECT * FROM users ORDER BY id ASC");
$stmt->execute();
$total = $stmt->rowCount();

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

// ATIVA REGISTROS QUE ESTÃO IRREGULARES
if(isset($_GET['active'])){

    $id = (int)$_GET['active'];
    $query = "UPDATE users SET active=:active WHERE id=$id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':active', $param_active, PDO::PARAM_STR);
    // PARAMETROS
    $param_active = "1";
    if($edit->execute()){
        $usuario = $_SESSION['username'];
              $mensagem = "O usuário ".$_SESSION['username']." ATIVOU o usuário ".$id;
              $sql = "INSERT INTO logs(data, mensagem, usuario) VALUES(:data, :mensagem, :usuario)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(":data", $dataform, PDO::PARAM_STR);
              $stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
              $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
              $stmt->execute();
            // CRIAR NOVO WEBHOOK COM NOVOS PARAMETROS OU ALTERAR O EXISTENTE
            //include_once("../cna/cnaoab.php");
            header("Location: ../admin/admuser.php");
            }
  }
  if(isset($_GET['deactive'])){

    $id = (int)$_GET['deactive'];
    $query = "UPDATE users SET active=:active WHERE id=$id";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':active', $param_active, PDO::PARAM_STR);
    // PARAMETROS
    $param_active = "0";
    if($edit->execute()){
      $usuario = $_SESSION['username'];
              $mensagem = "O usuário ".$_SESSION['username']." DESATIVOU o usuário ".$id;
              $sql = "INSERT INTO logs(data, mensagem, usuario) VALUES(:data, :mensagem, :usuario)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(":data", $dataform, PDO::PARAM_STR);
              $stmt->bindParam(":mensagem", $mensagem, PDO::PARAM_STR);
              $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
              $stmt->execute();
            // CRIAR NOVO WEBHOOK COM NOVOS PARAMETROS OU ALTERAR O EXISTENTE
            //include_once("../cna/cnaoab.php");
            header("Location: ../admin/admuser.php");
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
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Gerenciar <code><?php echo $total; ?></code> usuários</h4>
                  <p class="card-description">
                    Utilize o painel abaixo para  <code>ativar</code> ou <code>desativar</code> usuários, você só pode realizar essas ações com pessoas abaixo do seu rank.
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Usuário
                          </th>
                          <th>
                            Nome
                          </th>
                          <th>
                            Passaporte
                          </th>
                          <th>
                            Cargo
                          </th>
                          <th>
                            Rank
                          </th>
                          <th>
                            Criado em
                          </th>
                          <th>
                           Ativo?
                          </th>
                          <th>
                           Ações
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td class="py-1">
                          <img src="<?php echo $dados["image"]; ?>" alt="image"/>
                          </td>
                          <td>
                          <?php echo $dados["username"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["name"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["passport"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["role"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["rank"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["created"]; ?>
                          </td>
                          <td>
                          <?php if($dados["active"] == 1){
                            echo "Sim";
                          }else{
                            echo "Não";
                          } ?>
                          </td>
                          <td>
                          <a class="btn btn-sm btn-primary <?php if($dados["active"] == 1){echo "disabled";}?>" href="?active=<?php echo $dados["id"] ?>"><i class="mdi mdi-account-plus"></i></a>
                          <a class="btn btn-sm btn-secondary <?php if($dados["active"] == 0 || $dados["rank"] >= $_SESSION["rank"]){echo "disabled";}?>" href="?deactive=<?php echo $dados["id"] ?>"><i class="mdi mdi-account-minus"></i></a>
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
