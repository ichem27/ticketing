<?php $this->titre = "Ticket"; ?>


<div class="container">
   <h4 class="blog-post-title" style="text-align:center;">Les Tickets</h4>
   <br>

   <div class="row mb-2">
      <?php foreach ($tickets as $ticket) : ?>


         <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
               <div class="card-body d-flex flex-column align-items-start">


                  <?php if ($ticket['id_etat'] == 1) : ?>
                     <strong class="d-inline-block mb-2 text-primary"><?= ($ticket['nometat']) ?></strong>
                  <?php endif; ?>
                  <?php if ($ticket['id_etat'] == 2) : ?>
                     <strong class="d-inline-block mb-2 text-warning"><?= ($ticket['nometat']) ?></strong>
                  <?php endif; ?>
                  <?php if ($ticket['id_etat'] == 3) : ?>
                     <strong class="d-inline-block mb-2 text-success"><?= ($ticket['nometat']) ?></strong>
                  <?php endif; ?>
                  <?php if ($ticket['id_etat'] >= 4) : ?>
                     <strong class="d-inline-block mb-2 text-danger"><?= ($ticket['nometat']) ?></strong>
                  <?php endif; ?>
                  <h2><?= ($ticket['titre']) ?></h2>
                  <div class="mb-1 text-muted"><?= $ticket['date'] ?></div>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">

                     <a class="btn btn-info" href="<?= "index.php?action=ticket&id=" . $ticket['id'] ?>"> Voir
                     </a>

                     <a class="btn btn-warning" href="<?= "index.php?action=editerticket&id=" . $ticket['id'] ?>" input type="radio" name="options" id="option1" autocomplete="off" checked> Modifier
                     </a>

                     <a class="btn btn-danger" onclick="return confirm('Supprimer ticket?')" href="<?= "index.php?action=supprimerticket&id=" . $ticket['id'] ?>" input type="radio" name="options" id="option1" autocomplete="off" checked> Effacer
                     </a>
                  </div>
               </div>

            </div>
         </div>
      <?php endforeach; ?>
      <div class="col-md-6">
         <h6>Nouveau Ticket</h6>
         <form method="post" action="index.php?action=ticketadd">
            <div class="col">
               <input type="hidden" name="etat" value="etat">
               <input type="text" id="titre" name="titre" class="form-control" placeholder="Le titre de votre ticket" required>
               <input type="text" id="auteur" name="auteur" class="form-control" placeholder="Votre nom" required>
            </div>
            <div class="form-group">
               <div class="col">
                  <textarea id="contenu" class="form-control" name="contenu" rows="4" placeholder="Exprimez votre problème." .." required></textarea><br />
                  <button type="submit" class="btn btn-dark" value="Signaler">Créer</button>
               </div>
         </form>
      </div>
   </div>



   </br>

</div>