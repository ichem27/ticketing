   <h6 class="blog-post-title" style="text-align:center;">Gestion des états</h6>
   <table class="table">
       <thead class="thead-dark">
           <tr>
               <th scope="col">#</th>
               <th scope="col">Nom de l'état</th>
               <th scope="col">Action</th>
           </tr>
       </thead>
       <tbody>
           <?php foreach ($etats as $etat) : ?>
               <tr>
                   <th scope="row"><?= $etat['idetat'] ?></th>
                   <td><?= $etat['nometat'] ?></td>
                   <td>
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                               <a href="<?= "index.php?action=editeretat&id=" . $etat['idetat'] ?>" class="btn btn-sm btn-outline-secondary">Modifier</a>
                               <a onclick="return confirm('&Ecirc;êtes vous sur de supprimer cette état?')" href="<?= "index.php?action=supprimeretat&id=" . $etat['idetat'] ?>" button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</a>
                           </div>
                       </div>

                   </td>
               </tr>
           <?php endforeach; ?>

       </tbody>
   </table>






   <div class="container-fluid">
       <form method="post" action="index.php?action=etatadd">
           <div class="col">
               <h6>Ajouter un état</h6>
               <input type="hidden" name="id" id="id" value="" />
               <input type="text" id="etat" name="etat" class="form-control" placeholder="Entrez un nouvelle état" style="width: 20%" required>
               <input type="submit" class="btn btn-light" value="Ajouter" style="width: 20%" />
           </div>
   </div>