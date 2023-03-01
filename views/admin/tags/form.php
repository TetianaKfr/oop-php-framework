<script language=javascript>
function submitPostLink()
{    
    document.postlink.submit();
}
</script>

<h1><?= $params['post']->title ?? 'Créer un nouvel tag' ?></h1>

<?php 
// var_dump($_REQUEST);
// $_REQUEST['url'] = "http://localhost/".$_REQUEST['url'];
// var_dump($_REQUEST);
?>

<form method="POST" name="postlink" action="<?= isset($params['post']) ? HREF_ROOT."admin/tags/edit/{$params['post']->id}" :  "../../admin/tags/create" ?>" >
    <div class="form-group">
       
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? '' ?>">
    </div>
    <button type="submit"  class="btn btn-primary"><?= isset($params['post']) ? "Enregistrer les modifications": "Enregistrer les modifications" ?></button>
    
    </form>




