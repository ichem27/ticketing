<h6 class="blog-post-title" style="text-align:center;">Modifier l'état</h6>
<div class="container-fluid">
    <form method="post" action="index.php?action=modifieretat">
        <div class="col">
            <input type="text" id="etat" name="etat" value="<?= $etat['nometat'] ?>" class="form-control" placeholder="Titre...">
        </div>
        <div class="form-group">
            <div class="col">
                <input type="hidden" name="id" value="<?= $etat['idetat'] ?>" />
                <input type="submit" value="Modifier" />
            </div>
        </div>
</div>