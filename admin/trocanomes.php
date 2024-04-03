<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "Troca de Nome";

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
          <?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $query = "INSERT INTO nomes (idu,rg,old,new,user,data) VALUES (:idu, :rg, :old, :new, :user, :data)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':idu', $_POST["passaporte"], PDO::PARAM_INT);
    $edit->bindParam(':rg', $_POST["registro"], PDO::PARAM_STR);
    $edit->bindParam(':old', $_POST["nomeatual"], PDO::PARAM_STR);
    $edit->bindParam(':new', $_POST['novonome'], PDO::PARAM_STR);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
        Mudança de nome registrada com sucesso.
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGISTRAR TROCA DE NOME</h4>
                  <p class="card-description">
                    Preencha o formulário para registrar uma troca de nome.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">PASSAPORTE</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="passaporte" id="inlineFormInputName2" placeholder="12">
                          </div>
                      </div>
                      <div class="col-md-6">
                      <div class="col-md-6">
                          <label class="col-md-6 col-form-label">REGISTRO</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control mb-2 mr-sm-2" name="registro" id="inlineFormInputName2" placeholder="0000AAAA">
                          </div>
                      </div>
                      </div>
                    </div>
                    <label class="sr-only" for="inlineFormInputName2">Nome Atual</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="nomeatual" id="inlineFormInputName2" placeholder="Erick Collins">
                  
                    <label class="sr-only" for="inlineFormInputName2">Novo Nome</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="novonome" id="inlineFormInputName2" placeholder="Erick Voltaire">

                    <button type="submit" class="btn btn-primary mb-2">Registrar</button>
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

</body>

</html>
