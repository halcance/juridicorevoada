<?php

require('../config.php');
include('../includes/verificacao.php');

$page_title = "Administração";

// CONSULTA TOTAL DE USUÁRIOS
$stmt = $pdo->prepare("SELECT id FROM users");
$stmt->execute();
$mtotal = $stmt->rowCount();
// CONSULTA SE HÁ PENDENCIA DE FAMÍLIA
$ctmt = $pdo->prepare("SELECT id FROM cras");
$ctmt->execute();
$ctotal = $ctmt->rowCount();
// CONSULTA CNA ATIVA
$cntmt = $pdo->prepare("SELECT id FROM cna WHERE status='REGULAR'");
$cntmt->execute();
$cntotal = $cntmt->rowCount();
// CONSULTA VENDAS
$vntmt = $pdo->prepare("SELECT id FROM vendas");
$vntmt->execute();
$vtotal = $vntmt->rowCount();
// CONSULTA PORTES
$pntmt = $pdo->prepare("SELECT id FROM porte_arma");
$pntmt->execute();
$ptotal = $pntmt->rowCount();
// CONSULTA DINHEIRO PAINEL
$pan = $pdo->prepare("SELECT total FROM painel ORDER BY id DESC");
$pan->execute();
$panmov = $pan->rowCount();
$pantotal = $pan->fetch(PDO::FETCH_ASSOC);
$painel = $pantotal["total"];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php include("partials/head.php"); ?>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <?php include("partials/navbar.php"); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php include("partials/settings-panel.php"); ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
<?php include("partials/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?php if($err_profile == true) { ?>
          <div class="alert alert-warning" role="alert">
  <h1>⚠ Você deve atualizar seu perfil.</h1>
</div>
<?php } ?>
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Geral</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Auditoria</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demonstrações</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <!-- <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a> -->
                      <!-- <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a> -->
                      <!-- <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a> -->
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">USUÁRIOS</p>
                            <h3 class="rate-percentage"><?php echo $mtotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">FAMÍLIAS</p>
                            <h3 class="rate-percentage"><?php echo $ctotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                          <div>
                            <p class="statistics-title">CNA REGULAR</p>
                            <h3 class="rate-percentage"><?php echo $cntotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">VENDAS REALIZADAS</p>
                            <h3 class="rate-percentage"><?php echo $vtotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">PORTES LIBERADOS</p>
                            <h3 class="rate-percentage"><?php echo $ptotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">MOV. FINANCEIRAS</p>
                            <h3 class="rate-percentage"><?php echo $ptotal; ?></h3>
                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.0%</span></p>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Linha de Performance</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Comparação do mês atual e o mês anterior</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5">
                                  <canvas id="performaneLine"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card bg-primary card-rounded">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash text-white mb-4">MURAL DE AVISOS</h4>
                                <div class="row">
                                  <div class="col">
                                    <p class="status-summary-ight-white mb-1">Sem avisos no momento.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div class="circle-progress-width">
                                        <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">SEM DADOS</p>
                                        <h4 class="mb-0 fw-bold">0%</h4>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="circle-progress-width">
                                        <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                      </div>
                                      <div>
                                        <p class="text-small mb-2">SEM DADOS</p>
                                        <h4 class="mb-0 fw-bold">0</h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">PAINEL FINANCEIRO</h4>
                                   <p class="card-subtitle card-subtitle-dash">Resumo das movimentações financeiras</p>
                                  </div>
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0 disabled" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configurações</button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$ <?php echo number_format( $painel, 0, '.', '.' ); ?></h2><h4 class="me-2">DÓLARES</h4><h4 class="text-success">(+1%)</h4></div>
                                  <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- 
                        BANNER LEGAL PARA COISAS ESPECIAIS  
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <?php if ($uss_rank > 4) { ?>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Pending Requests</h4>
                                   <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Customer</th>
                                        <th>Company</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="../admin/assets/images/faces/face1.jpg" alt="">
                                            <div>
                                              <h6>Brandon Washington</h6>
                                              <p>Head admin</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Company name 1</h6>
                                          <p>company type</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">79%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td>
                                      </tr>
                                      
                                      
                                      
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body card-rounded">
                                <h4 class="card-title  card-title-dash">Eventos Recentes</h4>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Alinhamentos
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">15 Mar, 2024</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Ver todos <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                  <h4 class="card-title card-title-dash">Atividades</h4>
                                  <p class="mb-0">1 total</p>
                                </div>
                                <ul class="bullet-line-list">
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Erick Collins</span> criou o site</div>
                                      <p>Agora</p>
                                    </div>
                                  </li>
                            
                                </ul>
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Exibir todas <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title card-title-dash">TAREFAS</h4>
                                      <div class="add-items d-flex mb-0">
                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                        <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Contratar Defensor Público <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">15 Mar 2024</div>
                                              <div class="badge badge-opacity-danger me-3">CONSELHO</div>
                                              <i class="mdi mdi-flag ms-2 flag-color"></i>
                                            </div>
                                          </div>
                                        </li>
                                      
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">TOTAL POR SERVIÇO</h4>
                                    </div>
                                    <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                    <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Top Membros</h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-10" src="../admin/assets/images/faces/65fe6b68dec0c.png" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Erick Collins</p>
                                            <small class="text-muted mb-0">Infinito</small>
                                          </div>
                                        </div>
                                        <div class="text-muted text-small">
                                          Hoje
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
              <?php include('partials/footer.php') ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>

