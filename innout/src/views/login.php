<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/comum.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/icofont.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>In 'N Out</title>
</head>

<body>
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling"></i>
                <span class="font-weight-light p-1">In</span>
                <span class="font-weight-bold">N'</span>
                <span class="font-weight-light p-1"> Out</span>
                <i class="icofont-runner-alt-1"></i>
            </div>
            <div class="card-body">
                <?php include(VIEW_PATH . '/template/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" 
                    class="form-control <?= isset($errors['email']) ? ($errors['email'] ? 'is-invalid' : '') : ''?>" 
                    value="<?= isset($email) ? $email : '' ?>"
                    placeholder="Informe o e-email" autofocus>
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email'] : null
                        //isset($exception) ? $exception->get('email') : null ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" 
                    class="form-control <?= isset($errors['senha']) ? ($errors['senha'] ? 'is-invalid' : '') : ''?>" 
                    placeholder="Informe a senha">
                    <div class="invalid-feedback">
                        <?= isset($errors['senha']) ? $errors['senha'] : ''
                        //isset($exception) ? $exception->get('senha') : null ?>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</body>

</html>