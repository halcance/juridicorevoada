<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../admin/">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">DASHBOARD</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" target="_blank" href="../index.php">
              <i class="menu-icon mdi mdi-apple-safari"></i>
              <span class="menu-title">SITE</span>
            </a>
          </li>
          <li class="nav-item nav-category">SERVIÇOS</li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#assist" aria-expanded="false" aria-controls="assist">
              <i class="menu-icon mdi mdi-bookmark-check"></i>
              <span class="menu-title">ASSISTÊNCIAS</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="assist">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/assistencia.php">Registrar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/verassistencia.php">Visualizar</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#nome" aria-expanded="false" aria-controls="assist">
              <i class="menu-icon mdi mdi-alphabetical"></i>
              <span class="menu-title">TROCA DE NOME</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="nome">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/trocanomes.php">Registrar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/vernomes.php">Visualizar</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#cras" aria-expanded="false" aria-controls="cras">
              <i class="menu-icon mdi mdi-file-tree"></i>
              <span class="menu-title">FAMÍLIAS</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="cras">
              <ul class="nav flex-column sub-menu">
              <?php if($uss_rank >= 3)  {?>
                <li class="nav-item"> <a class="nav-link" href="../admin/cadfam.php">Cadastrar</a></li>
                <?php }?>
                <li class="nav-item"> <a class="nav-link" href="../admin/gercras.php">Gerenciar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/craspend.php">Pendências</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#portarma" aria-expanded="false" aria-controls="portarma">
              <i class="menu-icon mdi mdi-file-powerpoint-box"></i>
              <span class="menu-title">PORTE DE ARMA</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="portarma">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/portarma.php">Solicitar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/verport.php">Visualizar</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adocao" aria-expanded="false" aria-controls="adocao">
              <i class="menu-icon mdi mdi-face"></i>
              <span class="menu-title">ADOÇÃO</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="adocao">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/adocao.php">REGISTRAR</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/vernascimento.php">VISUALIZAR</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#casamento" aria-expanded="false" aria-controls="casamento">
              <i class="menu-icon mdi mdi-diamond"></i>
              <span class="menu-title">CASAMENTO</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="casamento">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/casamento.php">REGISTRAR</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/vercasamento.php">VISUALIZAR</a></li>
              </ul>
            </div>
          </li>
          <?php if($uss_rank > 1)  {?>
          <li class="nav-item nav-category">ADMINISTRAÇÃO</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Usuários</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/admuser.php"> Gerenciar </a></li>
                <?php if($uss_rank >= 4)  {?>
                <li class="nav-item"> <a class="nav-link" href="../admin/edituser.php"> Editar </a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/admcna.php"> CNA </a></li>
                <?php }?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php if($err_profile == true) { echo'disabled text-danger';}?>" href="../admin/admlog.php">
              <i class="menu-icon mdi mdi-alphabetical"></i>
              <span class="menu-title">LOGS</span>
            </a>
          </li>
          <?php }?>
          <li class="nav-item nav-category">FINANCEIRO</li>
          <li class="nav-item">
            <a class="nav-link  <?php if($err_profile == true) { echo'disabled text-danger';}?>" href="../admin/verservicos.php">
              <i class="menu-icon mdi mdi-alphabetical"></i>
              <span class="menu-title">SERVIÇOS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php if($err_profile == true) { echo'disabled text-danger';}?>" href="../admin/gerservicos.php">
              <i class="menu-icon mdi mdi-alphabetical"></i>
              <span class="menu-title">ADICIONAR SERVIÇO</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#painel" aria-expanded="false" aria-controls="painel">
              <i class="menu-icon mdi mdi-file-powerpoint-box"></i>
              <span class="menu-title">PAINEL</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="painel">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/paineldep.php">Depósito</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/verport.php">Extrato</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">DOCUMENTAÇÃO</li>
        </ul>
      </nav>