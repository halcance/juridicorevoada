<?php
ob_start();
require('../config.php');
include('../includes/verificacao.php');

$page_title = "LOGS";

 //Limita o número de registros a serem mostrados por página
 $limite = 25;
 //Se pg não existe atribui 1 a variável pg
 $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1 ;
 //Atribui a variável inicio o inicio de onde os registros vão ser mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
 $inicio = ($pg * $limite) - $limite;
  
 //seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite
 $sql = "SELECT * FROM logs ORDER BY id DESC LIMIT ".$inicio. ",". $limite;
  
 try{
   $query = $pdo->prepare($sql);  
   $query->execute();
    
   }catch(PDOexception $error_sql){
   echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
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
                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> LOGS ENCONTRADAS</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            DATA
                          </th>
                          <th>
                            USUÁRIO
                          </th>
                          <th>
                            MENSAGEM
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      while($dados = $query->fetch(PDO::FETCH_ASSOC)) { 
              
              ?>
                        <tr>
                          <td>
                          <?php echo $dados["id"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["data"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["user"]; ?>
                          </td>
                          <td>
                          <?php echo $dados["mensagem"]; ?>
                          </td>
                        </tr>
                <?php } ?>
                      </tbody>
                      </table>
                      <?php
                //seleciona o total de registros  
  $sql_Total = 'SELECT id FROM logs';
   
  try{
   $query_Total = $pdo->prepare($sql_Total);  
   $query_Total->execute();
    
   $query_result = $query_Total->fetchAll(PDO::FETCH_ASSOC);
    
   //conta quantos registros tem no banco de dados
   $query_result =  $query_Total->rowCount();
   
  //calcula o total de paginas a serem exibidas
   $qtdPag = ceil($query_result/$limite);
    
   }catch(PDOexception $error_Total){
   echo 'Erro ao retornar os Dados. '.$error_Total->getMessage();
 } ?>
 <div class="btn-group" role="group" aria-label="Basic example">
 <?php 
 //Cria os links para navegação das paginas
echo '  <a class="btn btn-outline-secondary" href="admlog.php?pg=1"><i class="mdi mdi-arrow-left-bold"></i></a>   ';
if($qtdPag > 1 && $pg<= $qtdPag){
  for($i=1; $i <= $qtdPag; $i++){
       
      if($i == $pg){
           
          echo "<a class=\"btn btn-outline-primary\" href='admlog.php?pg=$i'>".$i."</a>";
      }else{
    
  echo "<a class=\"btn btn-outline-primary\" href='admlog.php?pg=$i'>".$i."</a>";
    }
 }

}
echo "    <a class=\"btn btn-outline-secondary\" href=\"admlog.php?pg=$qtdPag\"><i class=\"mdi mdi-arrow-right-bold\"></i></a>  ";
 ?>
 </div>
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
  <!-- plugins:js -->
</body>

</html>
