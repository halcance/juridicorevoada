<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../admin/index.php">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Início</span>
            </a>
            </li>
          <li class="nav-item nav-category">SERVIÇOS</li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-bookmark-check"></i>
              <span class="menu-title">ASSISTÊNCIAS</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../admin/assistencia.php">Registrar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../admin/verassistencia.php">Visualizar</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($err_profile == true) { echo'disabled text-danger';}?>" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-briefcase-upload"></i>
              <span class="menu-title">FAMÍLIAS</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
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
            <a class="nav-link  <?php if($err_profile == true) { echo'disabled text-danger';}?>" href="../admin/trocanomes.php">
              <i class="menu-icon mdi mdi-alphabetical"></i>
              <span class="menu-title">TROCA DE NOME</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
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
          <li class="nav-item nav-category">DOCUMENTAÇÃO</li>
          <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">AJUDA</span>
            </a>
          </li>
        </ul>
      </nav>