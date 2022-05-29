<script src="assets/marked/marked.min.js"></script>
<script src="assets/howler/dist/howler.js"></script>
<script src="js/viewPost.js"></script>
<?php
    if (!isset($_GET["id"])) { ?>
        <script> window.location.replace("index.php?err=3")</script>
    <?php }
?>
<script> 
    getPostInfo(<?=$_GET["id"]?>) 
    // let comments = JSON.parse(localStorage.getItem('comments'))
</script>

<input type="hidden" name="idcoms" id="idcoms" value="<?=$_GET["id"]?>">
<input type="hidden" name="jsoncoms" id="jsoncoms"></input>


<div class="row">
    <div class="col-lg-8">
        <h2 id="postTitle"></h2>
        <audio id="postSong" class="d-none w-100" controls controlsList="nodownload"></audio>
        <h6 id="postAuthor" class="border-bottom"></h6>
        <div id="postBody"></div>
    </div>
    <div class="col-lg-4">
        <?php if (isset($_SESSION["user"])) { ?>
            <div id="createComment" class="border-bottom">
                <p>Publicar comentario como: <strong><?=$_SESSION["user"]?></strong></p>
                <button id="previewButton" class="btn btn-info linkIndexPost2 w-100 mb-3">Cambiar a vista previa</button>
                <form action="#">
                    <label for="commentContent">Comentario:</label>
                    <textarea name="commentContent" maxlength="420" placeholder="Los comentarios soportan Markdown" id="commentContent" cols="30" rows="10" class="form-control"></textarea></form>
                    <div id="previewContent"></div>
                    <div id="commentFooter" class="d-flex justify-content-between my-2">
                        <p><span id="commentLimit"></span>/420</p>
                        <button id="commentSubmit" class="btn btn-outline-success linkIndexPost">
                            Enviar comentario
                        </button>
                    </div>
                </div>
                <?php } else { ?>
                    <textarea name="commentContent" maxlength="420" placeholder="Los comentarios soportan Markdown" id="commentContent" cols="30" rows="10" class="form-control d-none"></textarea></form>
                    <?php } ?>
        <h4 id="noCommentsText">Comentarios</h4>

        <div id="commentSection">

        </div>
        <script>
            // getPostComments(<?=$_GET["id"]?>) 
            // spawnComments(comments)
        </script>
    </div>
</div>



<script>
    localStorage.setItem('user', '<?=$_SESSION["user"]?>')
    localStorage.setItem('post_id', '<?=$_GET["id"]?>')
</script>
