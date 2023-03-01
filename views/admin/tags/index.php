<h1>Modification des tags</h1>


<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif ?>
<!--buttons on the admin page-->
<a href="<?= HREF_ROOT ?>admin/tags/create" class="btn btn-success my-3">Créer un nouvel article</a>
<!--<a href="<?= HREF_ROOT ?>admin/tags/create" class="btn btn-success my-3">Modifier les tags</a>
<a href="<?= HREF_ROOT ?>admin/tags/create" class="btn btn-success my-3">Ajouter media</a>-->
<!--Creation of the table (bootstrap)-->
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
<!-- To show information from datadase-->
        <?php foreach ($params['tags'] as $tag) : ?>
            <tr>
                <th scope="row"><?= $tag->id ?></th>
                <td><?= $tag->name ?></td>
                <td>
                    <a href="<?= HREF_ROOT ?>admin/tags/edit/<?= $tag->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="<?= HREF_ROOT ?>admin/tags/delete/<?= $tag->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
