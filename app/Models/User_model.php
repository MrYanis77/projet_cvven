<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users'; // Nom de la table dans la base de données

    protected $primaryKey = 'id'; // Clé primaire de la table

    protected $allowedFields = ['username', 'email', 'password']; // Champs autorisés à être insérés ou mis à jour

    // Autres propriétés et méthodes du modèle...
    
     public function UpdateUser($id, $username, $password, $email) {
        $db = \Config\Database::connect();
        $query = 'UPDATE users SET username = :username:, password = :password:, email = :email: WHERE id = :id:;';
        $params = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email,
            'id' => $id
        ];
        $db->query($query, $params);
        return true;
    }
    
    public function DeleteUser($id) {
        $db = \Config\Database::connect();
        $query = 'DELETE FROM users WHERE id = :id:;';
        $params = [
            'id' => $id
        ];
        $db->query($query, $params);
        return true;
    }
    
    
}
