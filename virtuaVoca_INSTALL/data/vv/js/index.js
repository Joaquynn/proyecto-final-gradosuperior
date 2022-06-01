// Barra de búsqueda
window.onload = function() {
    $("#searchContainer").hide();
    $.ajax({
        url: "db/api/getPosts.php",
        type: "POST",
        success: function (e) {
            e = JSON.parse(e)
            console.log(e)
            e.forEach(element => {
                console.log(element)
                spawnPost(element)
            });
        }
    })

    $('#searchForm').on('keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          e.preventDefault();
          buscar($("#query").val())
        }
    });
    
// Funcion que busca
    $('#searchButton').click( (e) => {
        e.preventDefault();
        buscar($("#query").val())
      })

}

function buscar(search) {
    $("#postContainer").empty();

    if (search) {
        vUrl = "db/api/getPostsByName.php"
    } else {
        vUrl = "db/api/getPosts.php"
    }

    $.ajax({
        url: vUrl,
        type: "POST",
        data: { search },
        success: function (e) {
            e = JSON.parse(e)
            console.log(e)
            e.forEach(element => {
                console.log(element)
                spawnPost(element)
            });
        }
    })
}

// Al tener las búsquedas, esto es ejecutado mostrando todos los posts
function spawnPost(json) {
    let jsonPreview = json.text
    if (jsonPreview.length > 200) {
        jsonPreview = jsonPreview.substring(0,200)+"..."
    }
    post = `
    <article class="row">
        <h2 class="ms-5 d-block">${json.title}</h2>
        <span class="d-block"><strong>Por: ${json.author}</strong></span>
        <p>${jsonPreview}</p>
        <p class="d-flex border-bottom"><a href="viewPost.php?id=${json.id}" class="text-right w-100 linkIndexPost">Ver post completo</a></p>
    </article>
    `
    $("#postContainer").append(post)
}
