<script src="assets/marked/marked.min.js"></script>
<h1 class="my-3">Crear un post</h1>
<div class="row">
    <div class="col-lg-8">
        <label for="postTitle">Título</label>
        <input type="text" name="postTitle" id="postTitle" class="form-control mb-3">
    </div>
    <div class="col-lg-4">
        <p>Cuidado con la información que publicas. Si infinges las normas serás baneado/a.</p>
    </div>
</div>
<div class="row" id="bodyPreview">
    <div class="col-lg-8">
        <label for="postBody">Post</label>
        <textarea maxlength="3000" name="postBody" id="postBody" cols="30" rows="10" class="form-control" placeholder="¡Escribe aquí! La entrada acepta 'Markdown', si no sabes, hay botones básicos cerca."></textarea>
        <p><span id="postBodyLength"></span>/3000</p>
        <div>
            <h6>Tipo de post</h6>
            <input type="radio" id="type_cover" name="type" value="0">
            <label for="html">Cover</label><br>
            <input type="radio" id="type_original" name="type" value="1">
            <label for="css">Canción original</label><br>
            <input type="radio" id="type_discuss" name="type" value="2">
            <label for="javascript">Discusión general</label> 
        </div>
    </div>
    <div class="col-lg-4 p-4">
    <h6 class="text-center">Tipos de letra</h6>
        <div class="d-flex justify-content-around pb-2">
            <button id="addBold" class="btn btn-primary linkIndexPost">Negrita</button>
            <button id="addItalic" class="btn btn-primary linkIndexPost">Cursiva</button>
            <button id="addBoldItalic" class="btn btn-primary linkIndexPost">N + S</button>
        </div>
        <h6 class="text-center">Listas</h6>
        <div class="d-flex justify-content-around mb-2">
            <button id="addPoints" class="btn btn-primary linkIndexPost">Puntos</button>
            <button id="addNumbers" class="btn btn-primary linkIndexPost">Números</button>
        </div>
        <h6 class="text-center">Extras</h6>
        <div class="d-flex justify-content-around mb-2">
            <button id="addDivision" class="btn btn-primary linkIndexPost">Divisor</button>
            <button id="addLink" class="btn btn-primary linkIndexPost">Enlace</button>
            <button id="addHeaders" class="btn btn-primary linkIndexPost">Títulos</button>
        </div>

        <div class="form-check d-flex my-4">
            <input type="checkbox" name="enablePreview" id="enablePreview" checked class="form-check">
            <label for="enablePreview" class="form-check-label ms-3">Vista previa</label>
        </div>
        <div class="row">
            <form action="#">
                <label for="postAudio" class="form-label">Sube tu canción</label>
                <input type="file" name="postAudio" id="postAudio" class="form-control">
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8" id="containerPreview">
        <label for="postBodyPreview">Vista previa</label>
        <div class="overflow-hidden border border-dark rounded p-2" id="postPreview">
        </div>
    </div>
    <button type="submit" id="postSubmit" class="btn btn-primary linkIndexPost w-100 mt-2">Enviar</button>
</div>

<script>
    localStorage.setItem('user', '<?=$_SESSION["user"]?>')
</script>
<script src="js/createPost.js"></script>