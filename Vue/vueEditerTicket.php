   <h6 class="blog-post-title" style="text-align:center;">Modifier le ticket n°<?= $ticket['id'] ?></h6>
   <div class="container-fluid">
       <form method="post" action="index.php?action=modifierticket">
           <div class="col">
               <input type="text" id="titre" name="titre" value="<?= $ticket['titre'] ?>" class="form-control" placeholder="<?= $ticket['titre'] ?>">
           </div>
           <div class="form-group">
               <div class="col">
                   <textarea id="contenu" class="form-control" name="contenu" rows="4" require><?= $ticket['contenu'] ?></textarea><br />
                   <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
                   <input type="submit" value="Modifier" />
               </div>
           </div>
   </div>