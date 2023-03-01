<?php
/**
 * Administration of tags
 */
namespace App\Controllers\Admin;

use App\Controllers\Controller;
/**use App\Models\Post;*/
use App\Models\Tag;

class TagController extends Controller {
/**
 * Function to make the listing of the tags
 */
    public function index()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.tags.index', compact('tags'));
        /**
         * Here we need to make admin.tags.index.php in the "views" folder
         */
    }

    public function create()
    {
        $this->isAdmin();

        //$tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.tags.form' );//compact('tags')
				
    }
/**
 * Functions CRUD for manipulations with the posts using administator rights
 */
    public function createTag()
    {
        $this->isAdmin();

        $tags = new Tag($this->getDB());

        $tags = array_pop($_POST);

        $result = $tags->create($_POST, $tags);

        if ($result) {
            return header('Location:'.HREF_ROOT.'admin/tags');
        }
    }
/** Function used to get posts and tags from DB */
    public function edit(int $id)
    {
       // var_dump("Model edit:", $id);
        $this->isAdmin();

        //$post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();
        
        //var_dump("Model edit:", $post);
        //var_dump("Model edit:", $tags);
        return $this->view('admin.tags.form', compact('post', 'tags'));
        //return $this->view('admin.post.form', compact('post'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());

        // var_dump("PostController update:",$_POST);
        $tags = array_pop($_POST);
       // var_dump("PostController update:",$_POST, $tags);

        $result = $post->update($id, $_POST, $tags);

        if ($result) {
            return header('Location: '.HREF_ROOT.'admin/tags');
        }
    }

    public function destroy(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if ($result) {
            return header('Location: '.HREF_ROOT.'admin/tags');
        }
    }
}
