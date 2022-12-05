<?php
include_once '../utils/permission.php';
include_once '../utils/queries.php';
checkPermission();

$usercount = countTable('user_profile');
$snippetcount = countTable('snippet');
$comentcount = countTable('reply');

$user = getUserById($_SESSION['user']);

if ($user[0]['picture'] == '' || $user[0]['picture'] == null) {
    $user[0]['picture'] = 'https://cdn.discordapp.com/embed/avatars/0.png';
}

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
                        <a class="nav-link" href="index.php">
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
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-info text-dark mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="m-0">Snippets</h6>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                                <div class="card-body"><?php echo $snippetcount ?> snippets salvos no sistema</div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-info text-dark mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="m-0">Usuários</h6>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                                <div class="card-body"><?php echo $usercount ?> usuários registrados no sistema</div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-info text-dark mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h6 class="m-0">Comentários</h6>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                                <div class="card-body"><?php echo $comentcount ?> comentários salvos no sistema</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user me-1"></i>
                            Perfil
                        </div>
                        <div class="container-fluid">
                            <div class="row justify-content-center align-items-center g-2">

                                <div class="col-8 col-md-6 col-lg-5 col-xl-3">
                                    <div class="card text-center m-4">
                                        <div class="p-1 p-md-2 p-lg-3">

                                            <img class="card-img-top" src=" <?php echo $user[0]['picture'] ?> " alt="picture_image">
                                            <div class="card-body">
                                                <h4 class="card-title"> <?php echo $user[0]['name'] ?> <span class="idtext"> <?php echo "#" . $user[0]['id'] ?></span></h4>
                                                <p class="card-text"> <?php echo $user[0]['bio'] ?> </p>
                                            </div>
                                        </div>
                                        <div class="card-footer text-muted">
                                            <?php echo $user[0]['email'] ?>
                                        </div>
                                    </div>
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