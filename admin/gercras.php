<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "GERENCIAR FAMÍLIAS";

// SELECIONA TODAS AS FAMÍLIAS
$stmt = $pdo->prepare("SELECT * FROM cras");
$stmt->execute();
$total = $stmt->rowCount();

// CONFIGURA A DATA
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
      <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { 

        ?>
    <div class="col-md-4">
    <div class="card text-black">
      <div class="card-body">
      <p class="card-text"><span class="badge rounded-pill text-<?php if($dados['status'] == 'IRREGULAR'){ ?>danger<?php } else{ ?>warning<?php } ?>"><?php echo $dados['status']; ?></span></p>  
      <h3 class="card-title"><?php echo $dados['nome']; ?></h3>
        <p class="card-text">LÍDER</p>     
        <p class="card-text text-info"><?php echo $dados['lider']; ?> | <?php echo $dados['id_lider']; ?></p>
        <p class="card-text">MEMBROS</p>    
        <p class="card-text text-info"><?php echo $dados['membros']; ?></p>
        <p class="card-text">Cadastrado em <?php echo $dados['registro']; ?></p>
        <p class="card-text">Modificado em <?php echo $dados['modificado']; ?></p>
        <p class="card-text">por <?php echo $dados['user']; ?></p>
        <a class="btn btn-sm btn-secondary" href="../admin/craspend.php?edcras=<?php echo $dados["id"] ?>"><i class="mdi mdi-comment-plus-outline"></i></a>
        <?php if($_SESSION["rank"] >= 3) { ?>
        <a class="btn btn-sm btn-primary" href="../admin/admcras.php?edcras=<?php echo $dados["id"] ?>"><i class="mdi mdi-border-color"></i></a>
          <?php  } ?>
      </div>
    </div>
  </div>
        <?php } ?>
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
