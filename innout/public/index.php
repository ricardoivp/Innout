<?php

ini_set('display_errors', 1);

/**
 * dirname = nome do diretorio que 
 * o arquivo está (no caso é o index);
 * 
 * __FILE__ = arquivo que está (index.php no caso)
 * 
 * '2' = quantas pastas quer voltar, seria 
 * como usar "../../"
 */
require_once(dirname(__FILE__, 2) . '/src/config/config.php');


$uri = urldecode(
     parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
//$uri = str_ireplace("/innout/public", "", "$uri");  // ====>>>> linha adicionado sugerido nas perguntas e respostas (https://www.udemy.com/course/php-7-completo/learn/lecture/16288004#questions/13097850)


if($uri === '/' || $uri === '' || $uri = '/index.php'){
    $uri = '/login_Controller.php';
}

// echo "/{$uri}";
// die();
require_once(CONTROLLER_PATH . "/{$uri}");

?>
