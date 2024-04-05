<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "DEPÓSITO FINANCEIRO";

$data = new DateTime();
$dataform = $data->format('d-m-Y H:i:s');

$deposito = $saque = $razao = "";

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

$stmt = $pdo->prepare("SELECT * FROM painel ORDER BY id DESC");
$stmt->execute();

$totalpainel = $stmt->fetch(PDO::FETCH_ASSOC);
$painel = $totalpainel["total"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

 
// VARIAVEIS
$deposito = $_POST["deposito"];
$saque = $_POST["saque"];
$razao = $_POST["razao"];
$username = $_SESSION["username"];

if(empty($_POST['saque'])){
  $saque = 0;
  $total = $deposito + $painel;
}

if(empty($_POST['deposito'])){
  $deposito = 0;
  $total = $painel - $saque;
}

  $sql = "INSERT INTO painel (deposito, saque, razao, user, total, data) VALUES (:deposito, :saque, :razao, :user, :total, :data)";
  
  if($conn = $pdo->prepare($sql)){
    // Vincule as variáveis à instrução preparada como parâmetros
    $conn->bindParam(":deposito", $param_deposito, PDO::PARAM_INT);
    $conn->bindParam(":saque", $param_saque, PDO::PARAM_INT);
    $conn->bindParam(":razao", $param_razao, PDO::PARAM_STR);
    $conn->bindParam(":user", $param_usuario, PDO::PARAM_STR);
    $conn->bindParam(":total", $param_total, PDO::PARAM_INT);
    $conn->bindParam(':data', $dataform, PDO::PARAM_STR);

  // Definir parâmetros
  $param_deposito = $deposito;
  $param_saque = $saque;
  $param_razao = $razao;
  $param_usuario = $username;
  $param_total = $total;
    // Tente executar a declaração preparada
    if($conn->execute()){
        header("Location: ../admin/paineldep.php");
    } else{
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
    }
  
    // Fechar declaração
    unset($conn);
  }
  }
      ?>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">DESPOSITAR UM VALOR</h4>
                  <p class="card-description">
                    <strong>APÓS o depósito dentro da cidade</strong> preencha o formulário abaixo para registrar um depósito.
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">RAZÃO</label>
                    <select class="form-control" name="razao">
                    <option value="Selecione" default>Selecione...</option>
                    <?php 
                      $stmt = $pdo->prepare("SELECT name FROM servicos");
                      $stmt->execute();
                      while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                              <option value="<?php echo $dados['name'];?>"><?php echo $dados['name'];?></option>
                              <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                      <label for="exampleInputPassword4">VALOR A SER DEPOSITADO</label>
                      <input type="text" id="rg" name="deposito" class="form-control" placeholder="150000">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">DEPOSITAR</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">SACAR VALORES</h4>
                  <p class="card-description">
                    Sacar valor do painel
                  </p>
                  <form class="form-inline" action="" method="POST">
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputName2">RAZÃO</label>
                    <select class="form-control" name="razao">
                    <option value="Selecione" default>Selecione...</option>
                    <option value="PAGAMENTOS" default>Pagamentos</option>
                    <option value="AJUSTES" default>Reajuste</option>
                            </select>
                            </div>
                            <div class="form-group">
                      <label for="exampleInputPassword4">VALOR A SER SACADO</label>
                      <input type="text" id="rg" name="saque" class="form-control" placeholder="150000">
                    </div>
                    <button type="submit" class="btn btn-warning mb-2">SACAR</button>
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
