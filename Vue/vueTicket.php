<?php $this->titre = "Mon Blog - " . $ticket['titre']; ?>
<form method="post" action="index.php?action=changestatus" class="mb-3">
  <h6>Modifier l'état de l'incident n°<?= $ticket['id'] ?></h6>
  <div class="form-group mb-1">
    <select name="statut" class="btn btn-outline-dark" style="width: 20%" id="statut">
      <?php foreach ($statut as $statuts) : ?>
        <option value=<?= $statuts['id'] ?>><?= $statuts['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
  <input type="submit" class="btn btn-light" name="modifystatus" style="width: 20%" value="Modifier">
</form>

<article>

  <div class="blog-post">
    <h1 class="blog-post-title" style="text-align:center;"><?= $ticket['titre'] ?> </h1>
    <h5 class="blog-post-meta">Créer le <?= strftime("%d %B %Y", strtotime($ticket['date'])); ?> par <a><?= ($ticket['auteur']) ?></a></h5>

    <p><?= $ticket['contenu'] ?></p>
    <hr>

  </div><!-- /.blog-post -->

  <header>
    <hr />
    <header>
      <h1 id="titreReponses">Suivi du ticket</h1>
    </header>


</article>


<div class="row mb-2">
  <?php foreach ($commentaires as $commentaire) : ?>
    <div class="container-fluid">
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <div class="mb-1 text-muted"><?= strftime("%d %B %Y %H:%M", strtotime($commentaire['date'])); ?>
              <strong class="d-inline-block mb-2 text-secondary">
                <p><?= $commentaire['auteur'] ?> :</p>
              </strong>
            </div>
            <p><?= $commentaire['contenu'] ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<div class="container-fluid">
  <form method="post" action="index.php?action=commenter">
    <div class="col">
      <input type="text" id="auteur" name="auteur" class="form-control" placeholder="Prénom">
    </div>
    <div class="form-group">
      <div class="col">
        <textarea id="txtCommentaire" class="form-control" name="contenu" rows="4" placeholder="Envoyez un commentaire..." required></textarea><br />
        <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
        <input type="submit" value="Commenter" />
      </div>
    </div>
</div>