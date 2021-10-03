<?php

/**
 * Responsável em carregar
 * o model das classes.
 * 
 * Obs: as funções não podem ser publicas
 * por não estarem dentro de um bloco class Xxxx{}
 */

function loadModel($modelName)
{
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = []){
    // verica se veio algo como parâmetro
    if (count($params) > 0) {

        foreach ($params as $key => $value) {
            // verifica se veio algo na chave
            if (strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    
    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = []){
    // verica se veio algo como parâmetro
    if (count($params) > 0) {

        foreach ($params as $key => $value) {
            // verifica se veio algo na chave
            if (strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    
    // require_once(TEMPLATE_PATH . "/header.php");
    // require_once(TEMPLATE_PATH . "/menu.php");
    
    // echo 'em loader <br>';
    // echo "/{$viewName}.php";
    // die();

    require_once(VIEW_PATH . "/{$viewName}.php");
    // require_once(TEMPLATE_PATH . "/footer.php");
}
