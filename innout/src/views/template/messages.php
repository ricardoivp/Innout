<?php

$errors = []; //13:48 min aula 255
$message = [];

if (isset($exception)) {
    $message = [
        'type'      => 'error',
        'message'   => $exception->getMessage()
    ];

    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';

// Verificando se message não é vazia recebe chaves
if (!empty($message)) {
    if ($message['type'] === 'error') {
        $alertType = 'danger';
    } else {
        $alertType = 'success';
    }
}
?>

<?php if (count($message) > 0) : ?>
    <div role="alert" class="my-2 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php endif; ?>