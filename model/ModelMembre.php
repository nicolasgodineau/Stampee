<?php

class ModelMembre extends Crud
{

    protected $table = 'Membre';
    protected $primaryKey = 'idMembre';

    protected $fillable = ['idMembre', 'nom', 'prenom','adresse','telephone','email', 'password','Role_idRole'];

    public function checkMembre($data)
    {
        extract($data);
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($email));
        $count = $stmt->rowCount();

        if ($count == 1) {
            $membre_info = $stmt->fetch();
            if (password_verify($password, $membre_info['password'])) {

                session_regenerate_id();
                $_SESSION['idMembre'] = $membre_info['idMembre'];
                $_SESSION['prenom'] = $membre_info['prenom'];
                $_SESSION['Role_idRole'] = $membre_info['Role_idRole'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
            } else {
                return 'erreurMotDePasse';
            }
        } else {
            return 'erreurEmail';
        }
    }

}