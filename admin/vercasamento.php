<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Visualizar Casamentos";

$stmt = $pdo->prepare("SELECT * FROM casamento ORDER BY status DESC");
$stmt->execute();
$total = $stmt->rowCount();


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
                  <h4 class="card-title"><code><?php echo $total; ?></code> casamentos.</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            MATRÍCULA
                          </th>
                          <th>
                           STATUS
                          </th>
                          <th>
                            NOIVO
                          </th>
                          <th>
                           NOIVA
                          </th>
                          <th>
                            REGIME
                          </th>
                          <th>
                            USUÁRIO
                          </th>
                          <th>
                            REGISTRO
                          </th>
                          <th>
                            AÇÕES
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <label class="badge badge-<?php if($dados["status"] == 'ACEITO'){echo'success';}else{echo'warning';} ?>"><?php echo $dados["status"]; ?></label>
                          </td>
                          <td>
                          <?php echo $dados["noivo"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["noiva"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["regime"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <a class="btn btn-sm btn-primary" href="../admin/gercasamento.php?casa=<?php echo $dados["id"] ?>"><i class="mdi mdi-eye"></i></a>
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

</body>

</html>
