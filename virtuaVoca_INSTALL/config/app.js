const regex = {
    alphanumeric: /^[a-zA-Z0-9_]{4,}$/
}

function goToStep(step) {
    let realStep = "s"+step
    let pasos = document.querySelectorAll(".stepScene")
    console.log(pasos)
    pasos.forEach(paso => {
        $(paso).hide()
    });
    $("#"+realStep).fadeIn(200)
}

$("#s2-button").click( (e) => {
    e.preventDefault();
    $.ajax({
        url: "config/testDatabase.php",
        data: {
            user: $("#s2-user").val(),
            pass: $("#s2-pass").val(),
            host: $("#s2-host").val()},
        type: "POST",
        success: function (e) {
            try {
                e = JSON.parse(e)
                $("#s2-dbTitle").text(e.title)
                $("#s2-dbComment").text(e.comment)
                if (e.return == 1) {
                    $("#s2-button").removeClass("d-block")
                    $("#s2-button").addClass("d-none")
                    let inputs = document.querySelectorAll(".s2-input")
                    inputs.forEach(input => {
                        $(input).prop('readonly', true)
                    });
                    setTimeout(() => {
                        goToStep(3)
                    }, 1000);
                }
            } catch (error) {
                
            }
        }
    })
})

$("#s3-button").click( (e) => {
    e.preventDefault();
    let isOk = {
        db: regex.alphanumeric.test($("#s3-host").val()),
        auser: regex.alphanumeric.test($("#s3-user").val()),
        apass: regex.alphanumeric.test($("#s3-pass").val())
    }
    console.log(isOk)

    if (isOk.apass == false || isOk.auser == false || isOk.db == false) {
        $("#s3-warnBox").show()
        setInterval(() => {
            $("#s3-warnBox").hide()
        }, 3000);
        if (isOk.db == false) {
            $("#s3-errorDb").text("Nombre de la base de datos no válido")
        }
        if (isOk.auser == false ) {
            $("#s3-errorAdmin").text("Nombre de administrador no válido")
        }
        if (isOk.apass == false ) {
            $("#s3-errorPass").text("Contraseña de administrador no válido")
        }
        return 0
    }

    if ($("#s3-testData").prop('checked')) {
        $.ajax({
            url: "config/createDatabase.php",
            data: {
                user: $("#s2-user").val(),
                pass: $("#s2-pass").val(),
                host: $("#s2-host").val(),
                adminUser: $("#s3-user").val(),
                adminPassword: $("#s3-pass").val(),
                testData: true,
                database: $("#s3-host").val()},
            type: "POST",
            success: function (e) {
                $("#s4-log").html(e)
                goToStep(4)
            }
        })
    } else {
        $.ajax({
            url: "config/createDatabase.php",
            data: {
                user: $("#s2-user").val(),
                pass: $("#s2-pass").val(),
                host: $("#s2-host").val(),
                adminUser: $("#s3-user").val(),
                adminPassword: $("#s3-pass").val(),
                testData: false,
                database: $("#s3-host").val()},
            type: "POST",
            success: function (e) {
                $("#s4-log").html(e)
                goToStep(4)
            }
        })
    }
})

function resume() {
    let link = "http://"+window.location.hostname+"/"+"virtuaVoca_"+$("#s3-host").val()
    $("#s5-url").text(link)
    $("#s5-user").text($("#s3-user").val())
    $("#s5-pass").text($("#s3-pass").val())
    $("#s5-link").attr("href", link)
}

function end() {
    resume()
    goToStep(5)
}


window.onload = function () {
    $("#s3-warnBox").hide()
    let pasos = document.querySelectorAll(".stepScene")
    pasos.forEach(paso => {
        $(paso).hide()
        $(paso).removeClass("d-none")
    });
    goToStep(1);

    //Pasos
    $("#s1-button").click( () => { goToStep(2) })
    // Paso 2 - Línea 29
}