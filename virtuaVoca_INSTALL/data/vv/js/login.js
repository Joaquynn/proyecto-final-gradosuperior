/* Expresiones regulares */
/////////////////////////////////////////////
// Usuario: Entre 5-12 carácteres alfanuméricos y guiones bajos

// Contraseña: Entre 6-30 carácteres alfanuméricos, puntos y guiones bajos
const regex = {
    username: /^[A-z0-9]{5,12}$/,
    password: /^[A-z0-9.]{6,30}$/
}

/* Funciones */

/////////////////////////////////////////////
// ===Login=== //
// Intenta logear a un usuario
// ===Resultados posibles===
// 0 = No existe esa combinación
// 1 = Existe el usuario, pero no coincide la contraseña
// 2 = Coinciden el usuario y la contraseña
/////////////////////////////////////////////
function login(pUser, pPassword) {
    let data = {
        user: pUser,
        password: pPassword
    }
    $.ajax({
        url: "db/api/login.php",
        type: "POST",
        data: data,
        success: function (r) {
            console.log(r)
            let response = JSON.parse(r)
            code = response.body.result
            switch (code) {
                case 0: // Nada
                $("#lgnAlert").html("No existe ese nombre de usuario")
                $("#lgnAlert").show()
                setTimeout( () => {$("#lgnAlert").fadeOut(1000)}, 5000)
                break;
                case 1: // User
                $("#lgnAlert").html("Contraseña incorrecta")
                $("#lgnAlert").show()
                setTimeout( () => {$("#lgnAlert").fadeOut(1000)}, 5000)
                break;
                case 2: // User + Password
                Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenid@ de vuelta!',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    timer: 2000,
                }).then( () => {
                    window.location = "index.php"
                })
                break;
        
                default:
                    break;
            }
        }, error: function (xhr) {
            console.log(xhr.responseText)
        }
    })

}

/////////////////////////////////////////////
// ===Register=== //
// Intenta registrar a un usuario
// ===Resultados posibles===
// 0 = No se ha registrado, usuario existente
// 1 = Se ha registrado correctamente
/////////////////////////////////////////////
function register(pUser, pPassword) {
    let data = {
        user: pUser,
        password: pPassword
    }
    $.ajax({
        url: "db/api/register.php",
        type: "POST",
        data: data,
        success: function (r) {
            response = JSON.parse(r)
            let code = response.body.exec
            switch (code) {
                case 0:
                    console.log("Ese usuario ya existe")
                    return 1
                    // $.ajax({
                    //     url: "db/api/login.php",
                    //     type: "POST",
                    //     data: {user: pUser, password: pPassword},
                    //     success: function (r) {
                    //         response = JSON.parse(r)
                    //         let code = response.body.result
                    //         if (code > 0) {
                    //             return 0
                    //         }
                    //     }
                    // })
                    break;
                default:
                    console.log("Se ha registrado")
                    return 1
                    break;
            }
        }, error: function (xhr) {
            console.log(xhr)
        }
    })
}

/////////////////////////////////////////////
// ===Validar=== //
// Intenta validar el registro
// ===Resultados posibles===
// 0 = Validado completamente
// 1 = No cumple los requisitos
// 2 = Las contraseñas no coinciden
/////////////////////////////////////////////
function validar(value, type) {
    switch (type) {
        case "username":
            if (regex.username.test(value)) {
                return 0
            } else {
                return 1
            }
            break;
        case "password":
            let vPass1 = $("#rgsPassword1").val();
            let vPass2 = $("#rgsPassword2").val();
            if (regex.password.test(value)) {
                if (vPass1 == vPass2) {
                    return 0
                } else {
                    return 2
                }
            } else {
                return 1
            }
            break;
        default:
            break;
    }
}

/* Listeners */

/////////////////////////////////////////////
// Botón de registro
/////////////////////////////////////////////
$("#rgsSubmit").click( (e) => {
    e.preventDefault();

    let vUser = $("#rgsUsername").val();
    let vPass1 = $("#rgsPassword1").val();
    let vPass2 = $("#rgsPassword2").val();

    if ((validar(vUser, "username") == 0) && 
            validar(vPass1, "password") == 0) {
        register(vUser, vPass1)
        Swal.fire({
            icon: 'success',
            title: '¡Registro completado!',
            html: 'En cuanto un administrador confirme tu cuenta, podrás publicar en VirtuaVoca',
            allowOutsideClick: false,
            confirmButtonColor: '#fabb04',
            confirmButtonText: '¡Estupendo!',
            timer: 8000,
            timerProgressBar: true,
        }).then( () => {
            window.location = "index.php"
        })
    }

    if (validar(vUser, "username") == 1) {
        $("#rgsUsernameError").addClass("d-block")
        $("#rgsUsernameError").removeClass("d-none")
        setTimeout( () => {
            $("#rgsUsernameError").removeClass("d-block")
            $("#rgsUsernameError").addClass("d-none")
        }, 3000)
    }

    if (validar(vPass1, "password") == 1) {
        $("#rgsPassword1Error").addClass("d-block")
        $("#rgsPassword1Error").removeClass("d-none")
        setTimeout( () => {
            $("#rgsPassword1Error").removeClass("d-block")
            $("#rgsPassword1Error").addClass("d-none")
        }, 3000)
    }

    if (validar(vPass1, "password") == 2) {
        $("#rgsPassword2Error").addClass("d-block")
        $("#rgsPassword2Error").removeClass("d-none")
        setTimeout( () => {
            $("#rgsPassword2Error").removeClass("d-block")
            $("#rgsPassword2Error").addClass("d-none")
        }, 3000)
    }
})

/////////////////////////////////////////////
// Botón de identificación
/////////////////////////////////////////////
$("#lgnSubmit").click( (e) => {
    e.preventDefault();

    let vUser = $("#lgnUsername").val();
    let vPass = $("#lgnPassword").val();

    if (login(vUser, vPass)) {
        console.log("Bitch loged")
    }

    console.log("works")
})

/* Eventos automáticos */
$("#rgsUsername").focus( () => {
    $("#rgsUsernameInfo").removeClass("d-none")
    $("#rgsUsernameInfo").addClass("d-block")
})
$("#rgsUsername").blur( () => {
    $("#rgsUsernameInfo").addClass("d-none")
    $("#rgsUsernameInfo").removeClass("d-block")
})
$("#rgsPassword1").focus( () => {
    $("#rgsPassword1Info").removeClass("d-none")
    $("#rgsPassword1Info").addClass("d-block")
})
$("#rgsPassword1").blur( () => {
    $("#rgsPassword1Info").addClass("d-none")
    $("#rgsPassword1Info").removeClass("d-block")
})
$("#rgsPassword2").focus( () => {
    $("#rgsPassword2Info").removeClass("d-none")
    $("#rgsPassword2Info").addClass("d-block")
})
$("#rgsPassword2").blur( () => {
    $("#rgsPassword2Info").addClass("d-none")
    $("#rgsPassword2Info").removeClass("d-block")
})
$("#lgnAlert").hide();

