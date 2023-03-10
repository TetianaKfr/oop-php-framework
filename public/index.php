<?php

use Router\Router;
use App\Exceptions\NotFoundException;


require '../vendor/autoload.php';
//Indiquer la racine de votre site ici HREF_ROOT. Si votre site en localhost est à la racine indiquer /
define('HREF_ROOT', 'http://127.0.0.1:8888/oop-php-framework/' );
// Not in use now. J'ai utilisé cette constante pour trouvé des bugs dans le les formulaire. Est peut remplacer HREF_ROOT
define('VIEWS_FORM_ROOT', '../../../' );

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR); // Code original
//define('SCRIPTS', HREF_ROOT.'public/');
define('DB_NAME', 'myapp');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'root');
/**
 * Initialization of the router and define our routes. 
 * Using a routing system allows us to structure our application in a better way instead of designating each request to a file.A routing system works by mapping an HTTP request to a request handler based on the request method and path specified in the URL of the request.
 */
$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');

$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
