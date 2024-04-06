<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "PAINEL DE VENDAS";

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

    $query = "INSERT INTO vendas (item,qtd,pass,user,data) VALUES (:item,:qtd,:pass,:user,:data)";
    $edit = $pdo->prepare($query);
    $edit->bindParam(':item', $_POST["item"], PDO::PARAM_STR);
    $edit->bindParam(':qtd', $_POST["qtd"], PDO::PARAM_INT);
    $edit->bindParam(':pass', $_POST["pass"], PDO::PARAM_INT);
    $edit->bindParam(':user', $_SESSION['username'], PDO::PARAM_STR);
    $edit->bindParam(':data', $dataform, PDO::PARAM_STR);
  
    if($edit->execute()){
        echo '<div class="alert alert-success md" role="alert">
       VENDA REGISTRADA COM SUCESSO!!
      </div>';
      header("Refresh: 5");
    
  }
  
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGISTRAR VENDA</h4>
                  <p class="card-description">
                    Faça um registro de venda
                  </p>
                  <form class="form-inline" action="" method="POST">
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">ITEM</label>
                    <select class="form-control" name="item">
                    <option value="Selecione" default>Selecione...</option>
                    <option value="Aliança">Aliança</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">QUANTIDADE</label>
                    <select class="form-control" name="qtd">
                    <option value="Selecione" default>Selecione...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">PASSAPORTE DO CLIENTE</label>
                      <input type="text" id="pass" name="pass" class="form-control" placeholder="1325">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">USUÁRIO</label>
                      <input type="text" id="user" name="user" class="form-control" value ="<?php echo $uss_username; ?>" placeholder="<?php echo $uss_username; ?>" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">REGISTRAR</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">VENDAS REALIZADAS</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nº
                          </th>
                          <th>
                            ITEM
                          </th>
                          <th>
                            QUANTIDADE
                          </th>
                          <th>
                            CLIENTE	
                          </th>
                          <th>
                            USUÁRIO
                          </th>
                          <th>
                            DATA
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $stmt = $pdo->prepare("SELECT * FROM vendas ORDER BY id DESC");
                      $stmt->execute();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["item"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["qtd"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["pass"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
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
