   <h6 class="blog-post-title" style="text-align:center;">Gestion des tickets</h6>
   <table class="table">
       <thead class="thead-dark">
           <tr>
               <th scope="col">#</th>
               <th scope="col">Nom du ticket</th>
               <th scope="col">Contenu</th>
               <th scope="col">Date de création</th>
               <th scope="col">Auteur</th>
               <th scope="col">Etape</th>
               <th scope="col">Actions</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($tickets as $ticket) : ?>
               <tr>
                   <th scope="row"><?= $ticket['id'] ?></th>
                   <td><?= $ticket['titre'] ?></td>
                   <td><?= $ticket['contenu'] ?></td>
                   <td><?= strftime("%d %B %Y", strtotime($ticket['date'])); ?></td>
                   <td><?= $ticket['auteur'] ?></td>
                   <td><?= $ticket['nometat'] ?></td>
                   <td>
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                               <a href="<?= "index.php?action=editerticket&id=" . $ticket['id'] ?>" button type=" button" class="btn btn-sm btn-outline-secondary">Modifier</a>
                               <a onclick="return confirm('&Ecirc;êtes vous sur de supprimer ce ticket?')" href="<?= "index.php?action=supprimerticket&id=" . $ticket['id'] ?>" button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</a>
                           </div>
                       </div>

                   </td>
               </tr>
           <?php endforeach; ?>

       </tbody>
   </table>