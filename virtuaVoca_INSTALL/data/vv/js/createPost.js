// Te muestra la vista previa y los carácteres que te quedan
setInterval(() => {
    $("#postPreview").html(marked.parse($("#postBody").val()))
    $("#postBodyLength").html($("#postBody").val().length)
}, 10);

// Botón que activa y desactiva la vista previa del markdown
$("#enablePreview").click( () => {
    if (!($("#enablePreview").prop('checked'))) {
        $("#containerPreview").hide()
    } else {
        $("#containerPreview").show()
    }
})

// Valida el post devolviendo false si no está correcto
function validarPost(title, text) {
    if (!text && !title) {
        Swal.fire(
            '¡Error!',
            `Ponle algo de contenido al post`,
            'error'
          )
        return false
    } else if (!title) {
        Swal.fire(
            '¡Error!',
            `Ponle título al post`,
            'error'
          )
        return false
    } else if (!text) {
        if (!text) {
            Swal.fire(
                '¡Error!',
                `Ponle contenido al post`,
                'error'
              )
            return false
        }
    } else if (getPostType() == -1) {
        Swal.fire(
            '¡Error!',
            `Selecciona el tipo de post`,
            'error'
          )
          return false

    }
    return true
}
// Consigue el tipo de post de los botones circulares y los valida
function getPostType() {
    resultado = -1
    let element = document.getElementsByName('type')
    element.forEach(check => {
        if (check.checked) {
            resultado = parseInt(check.value)
        }
    })
    return resultado
}

// Guarda el post
$("#postSubmit").click( (e) => {
    const title = $("#postTitle").val() 
    const text = $("#postBody").val()
    if (validarPost(title, text)) {
        const author = localStorage.getItem('user')
        Swal.fire({
            title: '¿Confirmar post y enviar?',
            html: "No podrás editar el post, sólo eliminarlo.\nAsegurate de que todo, todo, absolutamente <strong>todo</strong> está correcto.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar y enviar',
            cancelButtonText: 'Espera un momento'
        }).then((result) => {
            const file_data = $("#postAudio").prop("files")[0];   
            const form_data = new FormData();
            // Verifica que la imagen es subible
            if (result.isConfirmed) {
                form_data.append("file", file_data)
                form_data.append("user", "Evelynn")
                $.ajax({
                    url: "db/api/uploadSong.php",
                    dataType: "text",
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    data: form_data,
                    success: function (e) {
                        e = JSON.parse(e)
                            if (e.result == false) {
                                Swal.fire(
                                    '¡Error!',
                                    `¿Cómo envías una canción en formato ${e.ext}?\nFíjate bien en las extensiones permitidas e inténtalo de nuevo`,
                                    'error'
                                )
                            } else {
                                if (e.ext == null) {
                                    $.ajax({
                                        url: "db/api/postCreate.php",
                                        type: "POST",
                                        data: {title, text, author, type: getPostType()},
                                        success: function (e) {
                                            console.log(e)
                                            Swal.fire(
                                                '¡Todo correcto sin audio!',
                                                `Felicidades, ya puedes ir a ver tu nuevo post`,
                                                'success'
                                            )
                                        }
                                    })
                                } else {
                                    $.ajax({
                                        url: "db/api/postCreate.php",
                                        type: "POST",
                                        data: {title, text, author, media: e.media, type: getPostType()},
                                        success: function (e) {
                                            console.log(e)
                                            Swal.fire(
                                                '¡Todo correcto con audio!',
                                                `Felicidades, ya puedes ir a ver tu nuevo post`,
                                                'success'
                                            )
                                        }
                                    })
                                }
                                
                            }
                        }
                })
            }
        })
    }
})

// Añade todos los addons de Markdown
$("#addBold").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = "**"+name+"** "
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})

$("#addItalic").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = "*"+name+"* "
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})

$("#addBoldItalic").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = "***"+name+"*** "
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})


$("#addPoints").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = `* ${name}\n* ${name}\n    * ${name}\n    * ${name}`
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})


$("#addNumbers").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = `1. ${name}\n2. ${name}\n    1. ${name}\n    2. ${name}`
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})

$("#addDivision").click( () => {
    let mdAdd = `---`
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})

$("#addLink").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = `[${name}](https://virtuavoca.es)`
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})

$("#addHeaders").click( () => {
    let name = localStorage.getItem('user')
    let mdAdd = `# ${name}\n## ${name}\n### ${name}`
    let postBodyContent = $("#postBody").val()
    let final = postBodyContent+mdAdd
    $("#postBody").text(final)
})