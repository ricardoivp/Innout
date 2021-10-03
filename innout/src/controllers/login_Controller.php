<?php

ob_start();
ini_set('display_errors', 1);
loadModel('Login_Model');
$exception = null;
//video é count ao invés de isset
if(count($_POST) > 0){
    // neste ponto está criando um objeto de nome 'login
    //*  na sua criação passa direto o $_POST pois ela já é
    //* composta por chave valor.
    //* Em exemplos do João Ribeiro tudo que vinha de $_POST
    //* era associado a uma variável que era criada.
        
    $login = new Login_Model($_POST);
    try {
        $user = $login->checkLogin();

        //---------------------------
        //echo dirname(__FILE__, 1) . "\day_records_Controller.php";    
        $path =  dirname(__FILE__, 1);
        
            //die();
        //---------------------------
        
        header("Location: day_records_Controller.php");    
        die();    
    } catch (AppException $e) {
        $exception = $e;
    }
}
loadView('login', $_POST + ['exception' => $exception]);
ob_end_flush();

?>

