<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "EDITAR USUÁRIOS";

$stmt = $pdo->prepare("SELECT * FROM users where active=1");
$stmt->execute();

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
        
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">EDITAR USUÁRIO</h4>
                  <p class="card-description">
                    Selecione o usuário abaixo que você deseja alterar:
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
                          <a class="btn btn-sm btn-primary <?php if($dados["rank"] >= $_SESSION["rank"]){echo "disabled";}?>" href="../admin/editprof.php?edit=<?php echo $dados["id"] ?>"><i class="mdi mdi-account-minus"></i></a>
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
