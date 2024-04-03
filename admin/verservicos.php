<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "SERVIÇOS";

$stmt = $pdo->prepare("SELECT * FROM servicos");
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
                  <h4 class="card-title">Confira os valores e serviços disponíveis abaixo:</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            SERVIÇO
                          </th>
                          <th>
                           VALOR
                          </th>
                          <th>
                            ADVOGADO
                          </th>
                          <th>
                           PAINEL
                          </th>
                          <th>
                            DATA
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["name"]; ?>
                          </td>
                          <td>
                          <?php echo number_format( $dados["valor"], 0, '.', '.' ); ?>
                          </td>
                          <td>
                          <?php echo number_format( $dados["oab"], 0, '.', '.' ); ?>
                          </td>
                          <td>
                          <?php echo number_format( $dados["painel"], 0, '.', '.' ); ?>
                          </td>
                          <td>
                          <?php echo $dados["date"]; ?>
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
