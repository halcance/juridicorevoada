<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Visualizar Porte de Armas";

$stmt = $pdo->prepare("SELECT * FROM porte_arma ORDER BY id DESC");
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
                  <h4 class="card-title"><code><?php echo $total; ?></code> portes de armas emitidos.</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            n°
                          </th>
                          <th>
                           NOME
                          </th>
                          <th>
                            PASSAPORTE
                          </th>
                          <th>
                           REGISTRO
                          </th>
                          <th>
                            ARMA
                          </th>
                          <th>
                            MUNIÇÃO
                          </th>
                          <th>
                            EMITIDO EM
                          </th>
                          <th>
                            VALIDO ATÉ
                          </th>
                          <th>
                             POR
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
                          <?php echo $dados["nome"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["passport"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["rg"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["arma"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["municao"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["validade"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
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
