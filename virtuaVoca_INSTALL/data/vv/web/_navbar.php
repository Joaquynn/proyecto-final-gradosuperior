<?php
$uriCode = substr($_SERVER["REQUEST_URI"], 12, 4);

if (isset($_SESSION["user"])) {
    $isLogin = 1;
    switch ($_SESSION["status"]) {
        case 0: ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: '¡Ha habido un problema!',
                html: 'Parece que tu cuenta aún no ha sido <strong>activada</strong>\<p>Espera a que un administrador la confirme, puede tardar entre ahora mismo y 72 horas.</p>\n¡Sentimos los inconvenientes!',
                allowOutsideClick: false,
                confirmButtonColor: '#fabb04',
                confirmButtonText: 'Vale'
            }).then( () => {
                window.location = "logout.php"
            })
        </script>
             <?php
            break;
        case 2: ?>
            <script>
            Swal.fire({
                icon: 'error',
                title: '¡Ha habido un problema!',
                html: 'Lo sentimos, tu cuenta ha sido <strong>baneada</strong> por inflingir las normas de la comunidad.',
                footer: 'Lee las normas de la comunidad para saber más acerca de las normas.',
                allowOutsideClick: false,
                confirmButtonColor: '#fabb04',
                confirmButtonText: 'Vale'
            }).then( () => {
                window.location = "logout.php"
            })
        </script>
            <?php
            break;
    }
} else {
    $isLogin = 0;
}
?>

<link rel="stylesheet" href="assets/css/login.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img class="img-fluid" width="64" src="assets/_media/logo/vvwhite.png" alt="Logotipo de VirtuaVoca">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="row w-100">
                <!-- <div class="col-lg-9 bg-info"> -->
                    <div class="col-lg-9">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link <?php if ($uriCode == "inde") echo "active" ;?>" href="index.php">Inicio</a>
                        <a class="nav-item nav-link <?php if ($uriCode == "cove") echo "active" ;?>" href="covers.php">Covers</a>
                        <a class="nav-item nav-link <?php if ($uriCode == "orig") echo "active" ;?>" href="originals.php">Originales</a>
                        <a class="nav-item nav-link <?php if ($uriCode == "disc") echo "active" ;?>" href="discussions.php">Discusiones</a>
                        <a class="nav-item nav-link <?php if ($uriCode == "open") echo "active" ;?>" href="openutau.php">OpenUTAU</a>
                        <a href="<?php if ($isLogin == 1) echo "createPost.php" ?> <?php if ($isLogin == 0) echo "index.php?err=5" ?>">
                            <button href="createPost.php" class="btn btn-primary" <?php if ($isLogin == 0) echo "disabled"; ?> ><strong class="linkIndexPost">Nuevo post</strong></button>
                        </a>
                        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) { ?>
                            <a class="nav-item nav-link" href="adminUsers.php">⚙️</a>
                            <?php }
                        ?>
                    </div>
                </div>
                <!-- <div class="col-lg-3 bg-secondary"> -->
                    <div class="col-lg-3">
                        <div class="navbar-nav d-block" id="navRight">
                            <?php
                                switch ($isLogin) {
                                    case 0:
                                        echo '  <div class="d-lg-flex">';
                                        echo '<a class="nav-item nav-link text-white" id="btnLogin" href="#login">Identifícate</a>';
                                        echo '<a class="nav-item nav-link text-white" id="btnRegister" href="#register">Regístrate</a>';
                                        echo '  </div>';
                                        break;
                                    default:
                                        echo '  <div class="d-lg-flex">';
                                        echo '<a class="nav-item nav-link text-white" href="#">Hola, '.$_SESSION["user"].'</a>';
                                        echo '<a aria-label="Cerrar sesión" class="d-none d-lg-inline nav-item nav-link text-white" href="logout.php"><i class="lni lni-lg lni-exit"></i></a>';
                                        echo '<a class="d-inline d-lg-none nav-item nav-link text-white" href="logout.php">Cerrar sesión</i></a>';
                                        echo '  </div>';
                                        break;
                                }
                            ?>

                            <div id="login" class="popup">
                                <div class="popupBody">
                                    <a id="lgnClose" href="#" class="linkIndexPost">&times;</a>
                                    <form action="#" method="post" class="">
                                        <span class="d-block mb-3">¿No tienes cuenta? <a href="#register" class="linkIndexPost">Regístrate</a></span>
                                        <div class="alert alert-warning" id="lgnAlert" role="alert"></div>
                                        <label for="lgnUsername">Usuario</label>
                                        <input type="text" name="lgnUsername" id="lgnUsername" class="form-control">
                                        <label for="lgnPassword">Contraseña</label>
                                        <input type="password" name="lgnPassword" id="lgnPassword" class="form-control">
                                        <input type="submit" value="Identificarse" id="lgnSubmit" name="lgnSubmit" class="btn btn-danger mt-3">
                                    </form>
                                </div>
                            </div>

                            <div id="register" class="popup">
                                <div class="popupBody">
                                    <a id="rgsClose" href="#" class="linkIndexPost">&times;</a>
                                    <form action="#" method="post" class="">
                                        <span class="d-block mb-3">¿Ya tienes cuenta? <a href="#login" class="linkIndexPost">Identifícate</a></span>
                                        
                                        <label for="rgsUsername">Usuario</label>
                                        <input type="text" name="rgsUsername" id="rgsUsername" class="form-control">
                                        <span id="rgsUsernameInfo" class="d-none info">De 5 a 12 carácteres alfanuméricos y/o guiones bajos. Sin tildes ni carácteres especiales.</span>
                                        <span id="rgsUsernameError" class="fw-bolder d-none bg-alert">&times; No cumple los requisitos</span>
                                        
                                        <label for="rgsPassword1">Contraseña</label>
                                        <input type="password" name="rgsPassword1" id="rgsPassword1" class="form-control">
                                        <span id="rgsPassword1Info" class="d-none info">De 6 a 20 carácteres alfanuméricos, puntos y/o guiones bajos. Sin tildes ni carácteres especiales.</span>
                                        <span id="rgsPassword1Error" class="fw-bolder d-none bg-alert">&times; No cumple los requisitos</span>
                                        
                                        <label for="rgsPassword2">Confirme la contraseña</label>
                                        <input type="password" name="rgsPassword2" id="rgsPassword2" class="form-control">
                                        <span id="rgsPassword2Info" class="d-none info">De 6 a 20 carácteres alfanuméricos, puntos y/o guiones bajos. Sin tildes ni carácteres especiales.</span>
                                        <span id="rgsPassword2Error" class="fw-bolder d-none bg-alert">&times; No coinciden</span></span>
                                        
                                        <input type="submit" value="Registrarse" id="rgsSubmit" name="rgsSubmit" class="btn btn-danger mt-3">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        


<script src="js/login.js"></script>

<!-- <form action="#" method="get" class="row mt-1">
    <input type="text" name="query" id="query" class="form-control col-9">
    <button type="submit" class="btn btn-primary col-3">🔍</button>
<form> -->