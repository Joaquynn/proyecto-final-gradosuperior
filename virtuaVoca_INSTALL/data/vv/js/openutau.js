function spawnVoicebanks(lang) {
    let elements = document.querySelectorAll(".navVB")
    elements.forEach(element => {
        $(element).removeClass("border-bottom border-top border-primary")
    });
    $("#"+lang).addClass("border-bottom border-top border-primary")
    $("#voicesContainer").fadeOut(100)
    setTimeout(() => {
        $("#voicesContainer").empty()
        $.ajax({
            url: "db/api/getVoicebanksByLang.php",
            type: "POST",
            data: { lang: lang },
            success: function (e) {
                try {
                    e = JSON.parse(e)
                } catch (error) {
                    console.log(e)
                }
                e.forEach(vb => {
                    let vbArticle = voicebankTemplate
                    vbArticle = vbArticle.replace("%CDNM%", vb.codename)
                    vbArticle = vbArticle.replace("%CDNM%", vb.codename)
                    vbArticle = vbArticle.replace("%CDNM%", vb.codename)
                    vbArticle = vbArticle.replace("%NAME%", vb.name)
                    vbArticle = vbArticle.replace("%DESC%", vb.description)
                    vbArticle = vbArticle.replace("%LINK%", vb.link)
                    $("#voicesContainer").append(vbArticle)
                    $("#demo-"+vb.codename).click( () => {
                        Swal.fire({
                            title: 'Escucha a '+vb.name,
                            html:`
                            <h5>Rango y escala</h5>
                            <audio id="postSong" class="w-100" controls controlsList="nodownload" src="openutau/ouvb-${vb.codename}/scale.mp3"></audio>
                            <h5>Demostración</h5>
                            <audio id="postSong" class="w-100" controls controlsList="nodownload" src="openutau/ouvb-${vb.codename}/demo.mp3"></audio>
                            `,
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                              '<i class="fa fa-thumbs-up"></i> Great!',
                            confirmButtonAriaLabel: 'Thumbs up, great!',
                            cancelButtonText:
                              '<i class="fa fa-thumbs-down"></i>',
                            cancelButtonAriaLabel: 'Thumbs down'
                          })
                    })
                });
                
            }
        })
        $("#voicesContainer").fadeIn(100)
    }, 101);
}

let voicebankTemplate = `<article class="w-50 p-2">
<div class="p-2 border border-primary rounded">
<div class="row">
<div class="col-lg-3">
<div class="headshot mb-2" style="background-image: url('openutau/ouvb-%CDNM%/headshot.png')">
</div>
</div>
    <div class="col-lg-9">
    <h5>%NAME%</h5>
    <p>%DESC%</p>
    </div>
    </div>
    <button class="btn btn-danger" id="demo-%CDNM%">Demo</button>
    <button class="btn btn-info" id="btn-%CDNM%">Más información...</button>
    </div>
    </article>
    `
    window.onload = function() {
        let elements = document.querySelectorAll(".navVB")
        elements.forEach(element => {
            $(element).click( (e) => {
                e.preventDefault()
                spawnVoicebanks(element.id)
            })
        });
}

