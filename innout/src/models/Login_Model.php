<?php

loadModel('User_Model');

class Login_Model extends Model
{

    // validando os dados digitados no login
    public function validate(){
        $errors = [];
        
        if(!$this->email){ $errors['email'] = 'E-mail é um campo obrigatório.';}

        if(!$this->senha){ $errors['senha'] = 'Por favor, informe uma senha.'; }

        if(count($errors) > 0){ throw new ValidationException($errors); }
    }


    public function checkLogin(){
        
        // chamando a validação
        $this->validate();

        $user = User_Model::getOne(['email' => $this->email]);
        
        if ($user) {
            
            //validaçoes
            if($user->end_date) { throw new AppException('Usuário está desligado da empresa.'); }

            if (password_verify($this->senha, $user->password)) {
                return $user;
            }

            //-------------
        }
        throw new AppException('Usuário/Senha inválidos');
    }
}
