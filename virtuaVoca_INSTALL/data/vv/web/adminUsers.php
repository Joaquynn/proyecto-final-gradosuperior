<h1 class="my-3">Administración</h1>
<div class="row">
    <div class="col-lg-3">
        <ul class="list-unstyled">
            <li class="mb-3">
                <a href="#" class="linkIndexPost border-bottom border-top border-success px-2 mb-4">Administrar usuarios</a>
            </li>
            <li class="mb-3">
                <a href="#" class="linkIndexPost px-2 mb-4">Administrar posts</a>
            </li>
            <li class="mb-3">
                <a href="#" class="linkIndexPost px-2 mb-4">Administrar UTAUs</a>
            </li>
        </ul>
    </div>
    <div class="col-lg-7">
        <div id="adminUsers">
            <h2 id="admin_newUsersTitle">Usuarios pendientes de confirmación</h2>
            <div id="admin_newUsers">
                <p id="admin_newUsers_emptyMessage"></p>
                <?php
                include('db/db_connection.php');
                
                $sql = "SELECT username FROM users WHERE status = 0";
                $res = $cx->query( $sql );
                $count = 0;
                foreach ($res as $row) {
                    $count++;
                    echo "<span class='d-flex mb-2 justify-content-between w-100' id='user".$row["username"]."'>".$row["username"]." 
                    <div>
                    <button id='accept".$row["username"]."' type='accept' class='btn btn-success'><i class='lni lni-lg lni-checkmark'></i></button>
                    <button id='deny".$row["username"]."' type='deny' class='btn btn-danger'><i class='lni lni-lg lni-close'></i></button>
                    </div>
                    </span>"; 
                    } ?>
                <script>
                    // emptyMessage()
                    localStorage.setItem('newUserCount', <?=$count?>)
                    </script>
            </div>
            <div id="admin_usersBarName" class="d-flex justify-content-between">
                <h2 id="admin_usersTitle">Usuarios</h2>
                <a href="db/api/pdfGens/pdfUsers.php">
                    <button class="btn btn-warning">Descargar PDF</button>
                </a>
            </div>
                <p id="admin_users_emptyMessage" class="d-flex"></p>
            <div class="d-flex flex-column">
                <?php
                    $sql = "SELECT username, status FROM users WHERE status = 1 OR status = 2";
                    $res = $cx->query( $sql );
                    $count = 0;
                    foreach ($res as $row) {
                        $count++;
                        echo "<span class='d-flex mb-2 justify-content-between w-100' id='user".$row["username"]."'><p>".$row["username"]."</p> 
                        <div>";
                        if ($row["status"] == 1) {
                            echo "<button id='ban".$row["username"]."' type='ban' class='btn btn-ban'>Banear</button>";
                            echo "<button id='unban".$row["username"]."' type='unban' class='d-none btn btn-unban'>Desbanear</button>";
                        } elseif ($row["status"] == 2) {
                            echo "<button id='ban".$row["username"]."' type='ban' class='d-none btn btn-ban'>Banear</button>";
                            echo "<button id='unban".$row["username"]."' type='unban' class='btn btn-unban'>Desbanear</button>";
                        }
                        echo "<button id='edit".$row["username"]."' type='edit' class='mx-1 adminUser btn btn-edit ps-2'>Editar</button>";
                        echo "<button id='rem".$row["username"]."' type='remove' class='adminUser btn btn-remove ps-2'>Eliminar</button>
                        </div>
                        </span>"; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/admin.js"></script>