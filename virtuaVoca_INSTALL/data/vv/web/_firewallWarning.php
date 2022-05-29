<?php
    ////
    // 0 = No está logeado
    // 1 = Es usuario
    // 2 = Es admin
    ////
    if (isset($_GET["err"])) {
        switch ($_GET["err"]) {
            case 0:
                echo "<script>
            Swal.fire(
                '¿Qué fué eso?',
                'No tienes permiso para acceder a esa zona, inicia sesión antes.',
                'warning'
                )
                </script>
                ";
                break;
            case 1:
                echo "<script>
            Swal.fire(
                '¿Qué fué eso?',
                'No tienes permiso para acceder a esa zona, inicia sesión antes.',
                'warning'
                )
                </script>
                ";
                break;
            case 2:
                echo "<script>
            Swal.fire(
                '¿Qué fué eso?',
                'No tienes permiso para acceder a esa zona.',
                'warning'
                )
                </script>
                ";
                break;
            case 3:
                echo "<script>
            Swal.fire(
                '¿Qué fué eso?',
                'Entra a los posts desde los enlaces.',
                'warning'
                )
                </script>
                ";
                break;
            case 4:
                echo "<script>
            Swal.fire(
                'Vaya...',
                'Me temo que esa parte aún está en construcción.',
                'info'
                )
                </script>
                ";
                break;
            case 5:
                echo "<script>
            Swal.fire(
                '¿Quién eres?',
                'Inicia sesión o regístrate antes de publicar posts.',
                'question'
                )
                </script>
                ";
                break;
            default:
                # code...
                break;
        }
    }