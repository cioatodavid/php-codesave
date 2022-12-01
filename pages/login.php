<?php
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user'])) {
    header('Location: ../pages/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="bg-info">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form class="need-validation" action="" method="POST" novalidate>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="inputEmail" type="email" required />
                                            <label for="inputEmail">E-mail</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="inputPassword" type="password" required />
                                            <label for="inputPassword">Senha</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Mantenha-me conectado</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-4 mb-0">
                                            <a class="small" href="#">Recuperar senha</a>
                                            <button id="btnLogin" name="btnLogin" type="submit" class="btn btn-primary">Entrar</button>
                                        </div>
                                        <?php

                                        include_once '../utils/connect.php';
                                        include_once '../components/components.php';

                                        if (isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
                                            $email = $_POST['inputEmail'];
                                            $password = $_POST['inputPassword'];

                                            if (strlen($email) > 0 && strlen($password) > 0) {
                                                $conn = connect();
                                                $sql = "SELECT * FROM user_profile WHERE email = '$email' AND password = '$password'";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if (!isset($_SESSION)) {
                                                            session_start();
                                                        }
                                                        $type = '';
                                                        if ($row['user_type_id'] == 1) {
                                                            $type = 'Admin';
                                                        } else {
                                                            $type = 'User';
                                                        };
                                                        $_SESSION['user'] = $row['id'];
                                                        $_SESSION['user_type'] =  $type;
                                                        $_SESSION['name'] = $row['name'];

                                                        header('Location: ../pages/index.php');
                                                    }
                                                } else {
                                                    error("Usuário ou senha incorretos");
                                                }
                                                disconnect($conn);
                                            } else {
                                                error("Preencha todos os campos");
                                            }
                                        }



                                        ?>

                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Não tem uma conta? Cadastre-se</a></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>