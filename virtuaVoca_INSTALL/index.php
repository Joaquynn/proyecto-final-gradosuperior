<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bs.css">
    <link rel="stylesheet" href="assets/custom.css">
    <title>Instalación de virtuaVoca</title>
</head>
<body>
    <div class="container">
        <div class="center mt-5 p-3">
            
        <div id="s1" class="w-100 stepScene d-none">
                <h1>Asistente de instalación de virtuaVoca</h1>
                <h6>Inicio</h6>
                <hr>
                <button id="s1-button" class="btn btn-primary mx-auto d-block mt-5">Comenzar</button>
            </div>

            <div id="s2" class="w-100 stepScene d-none">
                <h1>Asistente de instalación de virtuaVoca</h1>
                <h6>Conexión a la base de datos</h6>
                <hr>
                <div class="row">
                    <div class="col-lg-7">
                        <form action="#">
                            <label for="s2-host" class="">Dirección</label>
                            <input class="form-control s2-input" type="text" name="s2-host" id="s2-host" value="localhost">
                            <label for="s2-user" class="">Usuario</label>
                            <input class="form-control s2-input" type="text" name="s2-user" id="s2-user" value="debianDB">
                            <label for="s2-pass" class="">Contraseña</label>
                            <input class="form-control s2-input" type="password" name="s2-pass" id="s2-pass" value="debianDB">
                        </form>
                    </div>
                    <div class="col-lg-5 d-flex flex-column text-center">
                        <h1 id="s2-dbTitle" class="fw-bold"></h1>
                        <img src="" alt="">
                        <p id="s2-dbComment"></p>
                    </div>
                </div>
                <button id="s2-button" class="btn btn-primary mx-auto d-block mt-5">Testear conexión</button>
            </div>

            <div id="s3" class="w-100 stepScene d-none">
                <h1>Asistente de instalación de virtuaVoca</h1>
                <h6>Creación de instancias en la base de datos</h6>
                <hr>
                <div class="bg-warning p-3 fw-bold" id="s3-warnBox">
                    <div id="s3-errorDb"></div>
                    <div id="s3-errorAdmin"></div>
                    <div id="s3-errorPass"></div>
                </div>
                    <form action="#">
                        <label for="s3-host" class="">Nombre de la base de datos</label>
                        <input class="form-control s3-input mb-5" type="text" name="s3-host" id="s3-host" value="virtuavoca">
                        <label for="s3-user" class="">Usuario administrador</label>
                        <input class="form-control s3-input" type="text" name="s3-user" id="s3-user" value="admin">
                        <label for="s3-pass" class="">Contraseña del usuario administrador</label>
                        <input class="form-control s3-input" type="password" name="s3-pass" id="s3-pass" value="admin">
                        <input type="checkbox" name="s3-test" id="s3-testData">
                        <label for="s3-test" class="mt-2"> ¿Quieres importar datos de prueba? Todas las contraseñas de los usuarios serán "123456"</label>
                    </form>
                <button id="s3-button" class="btn btn-primary mx-auto d-block mt-5">Comenzar</button>
            </div>

            <div id="s4" class="w-100 stepScene d-none">
                <h1>Asistente de instalación de virtuaVoca</h1>
                <h6>Log de instalación</h6>
                <hr>
                <div id="s4-log"></div>
            </div>

            <div id="s5" class="w-100 stepScene d-none">
                <h1>Asistente de instalación de virtuaVoca</h1>
                <h6>Fin de la instalación</h6>
                <hr>
                <h1>Resumen:</h1>
                <h3>URL: <span id="s5-url"></span></h3>
                <h3>Usuario: <span id="s5-user"></span></h3>
                <h3>Contraseña: <span id="s5-pass"></span></h3>
                <p>Puedes entrar copiando la URL de la parte superior o haciendo click <a href="" id="s5-link">aquí</a></p>
            </div>

        </div>
    </div>

</body>
</html>

<script src="config/jquery.js"></script>
<script src="config/app.js"></script>

