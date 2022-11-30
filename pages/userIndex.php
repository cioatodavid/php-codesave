<?php
include_once '../utils/permission.php';
include_once '../utils/queries.php';
checkPermission();

$usercount = countTable('user_profile');
$snippetcount = countTable('snippet');
$comentcount = countTable('reply');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Index</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>



<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.php">Code Save</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Configurações</a></li>
          <li><a class="dropdown-item" href="#!">Perfil</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Principal</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Painel de controle
            </a>
            <div class="sb-sidenav-menu-heading">CRUD'S</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Tabelas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="snippetIndex.php">Snippets</a>
                <a class="nav-link" href="userIndex.php">Usuários</a>
                <a class="nav-link" href="replyIndex.php">Comentários</a>
              </nav>
            </div>

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logado como:</div>
          <?php echo $_SESSION['name'] ?> -
          <?php echo $_SESSION['user_type'] ?>
        </div>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Painel de Controle</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Database
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-light">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nome</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Senha</th>
                      <th scope="col">Sobre</th>
                      <th scope="col">Avatar</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Excluir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once '../components/components.php';
                    $users = getUsers();
                    $userArray = array();
                    foreach ($users as $user) {
                      tableRowUser(
                        $user['id'],
                        $user['name'],
                        $user['email'],
                        $user['password'],
                        $user['bio'],
                        $user['picture'],
                        $user['user_type_id']
                      );
                    }
                    ?>
                  </tbody>
                </table>
               <a name="" id="" class="btn btn-primary" href="./userInsert.php" role="button">Cadastrar novo usuário</a>
              </div>
            </div>
          </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>

</html>