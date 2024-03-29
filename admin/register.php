<?php

$page_title = "Registrar-se";

// Incluir arquivo de configuração
require_once "../config.php";
 
// Defina variáveis e inicialize com valores vazios
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar nome de usuário
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de usuário.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados. Não pode conter espaços.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário já está em uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Validar senha
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não confere.";
        }
    }
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
      $data = new DateTime();
      $dataform = $data->format('d-m-Y');
  
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO users (username, password, created) VALUES (:username, :password, :created)";
         
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":created", $dataform, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Redirecionar para a página de login
                header("location: ../admin/login.php");
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include("partials/head.php"); ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="../img/logojuridico.png" alt="logo">
              </div>
              <h4>Crie sua conta</h4>
              <h6 class="fw-light">Escolha um usuário e senha.</h6>
              <form class="pt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="exampleInputEmail1" placeholder="Usuário">
                  <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" id="exampleInputPassword1" placeholder="Senha">
                </div>
                <div class="form-group">
                  <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" id="exampleInputPassword1" placeholder="Confirme sua senha">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" type="submit">CRIAR CONTA</button>
  
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
                <div class="text-center mt-4 fw-light">
                  Já tem uma conta? <a href="../admin/login.php" class="text-primary">Entre</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../admin/js/off-canvas.js"></script>
  <script src="../admin/js/hoverable-collapse.js"></script>
  <script src="../admin/js/template.js"></script>
  <script src="../admin/js/settings.js"></script>
  <script src="../admin/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
