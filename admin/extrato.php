<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "GERENCIAR USUÁRIOS";

$stmt = $pdo->prepare("SELECT * FROM painel ORDER BY id DESC");
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
                  <h4 class="card-title">EXTRATO FINANCEIRO</h4>
                  <p class="card-description">
                    Confira abaixo todas as movimentações financeiras
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            TIPO
                          </th>
                          <th>
                            VALOR
                          </th>
                          <th>
                            RAZÃO
                          </th>
                          <th>
                            USUÁRIO
                          </th>
                          <th>
                          DATA
                          </th>
                          <th>
                           SALDO*
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
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <?php if($dados['saque'] == 0) { echo 'DEPÓSITO';}else{echo'SAQUE';} ?>
                          </td>
                          <td>
                          <?php if($dados['saque'] == 0) {
              echo number_format( $dados["deposito"], 0, ',', '.' ); 
              }
              else{
                echo number_format( $dados["saque"], 0, ',', '.' );
              }
                  ?>
                          </td>
                          <td>
                          <?php echo $dados["razao"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["total"]; ?>
                          </td>
                          <td>
                          BUTTON
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
