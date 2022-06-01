// Consigue la info del post
function getPostInfo(id) {
    $.ajax({
        url: "db/api/readPost.php",
        data: { id },
        type: "POST",
        success: function (e) {
            try {
                e = JSON.parse(e)
            } catch (error) {
            }
            $("#postTitle").text(e.body.title)
            $("#postBody").html(marked.parse(e.body.text))
            $("#postAuthor").text("Por: " + e.body.author)
            if (e.body.media) {
                $('#postSong').removeClass("d-none");
                $('#postSong').prop("volume", 0.1);
                $("#postSong").attr("src", "uploads/"+e.body.media)
            }
        }
    })
}

// Recarga los comentarios
function spawnComments(comments) {
    $("#commentSection").empty();
    comments.forEach(comment => {
        const cAuthor = comment.author
        const cText = comment.text
        const cDate = comment.creationDate

        const eAuthor = `<span class="pt-4"><strong>${cAuthor}</strong> dice:</span>`
        const eText = `<div>`+marked.parse(cText)+`</div>`
        const eDate = `<span class="border-bottom mt-3 d-block">${cDate}</span>`

        $("#commentSection").append(eAuthor, eText, eDate)
    });
}

// Consigue los comentarios de un post
function getPostComments(id) {
    $.ajax({
        url: "db/api/getComments.php",
        data: { id },
        type: "POST",
        success: function (e) {
            try {
                e = JSON.parse(e)
            } catch (error) {
            }
            spawnComments(e)
        }
    })
}



window.onload = function () {
    getPostComments( $("#idcoms").val() )
    console.log( $("#jsoncoms").html() )
    $("#previewContent").hide()

    // Valida y comenta
    $("#commentSubmit").click( () => {
        if ($("#commentContent").val().length == 0) {
            Swal.fire(
                '¡Error!',
                `Comenta algo`,
                'error'
              )
        } else {
            let author = localStorage.getItem('user')
            let post_id = localStorage.getItem('post_id')
            let text = $("#commentContent").val()
            $.ajax({
                url: "db/api/createComment.php",
                type: "POST",
                data: {author, text, post_id},
                success: function (e) {
                    console.log(e)
                    Swal.fire(
                        '¡Perfecto!',
                        `Comentario enviado`,
                        'success'
                      ).then( () => {
                        window.location.reload()
                      })
                }
            })
        }
    })
    setInterval(() => {
        $("#commentLimit").text($("#commentContent").val().length)
        $("#previewContent").html(marked.parse($("#commentContent").val()))
    }, 10);

    // Esconde o muestra la vista previa del comentario
    $("#previewButton").click( () => {
        console.log($("#previewButton").hasClass("btn-success"))
        if ($("#previewButton").hasClass("btn-success")) {
            $("#commentContent").hide()
            $("#previewContent").show()
            $("#previewButton").removeClass("btn-success")
            $("#previewButton").addClass("btn-secondary")
            $("#previewButton").text("Cambiar a comentario")
        } else {
            $("#commentContent").show()
            $("#previewContent").hide()
            $("#previewButton").removeClass("btn-secondary")
            $("#previewButton").addClass("btn-success")
            $("#previewButton").text("Cambiar a vista previa")
        }
    })
}

