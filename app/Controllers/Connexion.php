<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiteReservationModel;
use App\Models\Session; 

class Connexion extends Controller
{
    public function index()
    {
        helper('form');

        // Afficher le formulaire de connexion avec validation
        if (!$this->validate([
            'username' => 'required|min_length[4]|max_length[20]',
            'password' => 'required|min_length[4]|max_length[30]'
        ], [
            'username' => [
                'required' => 'Merci d\'indiquer un nom d\'utilisateur.',
                'min_length' => 'Le nom d\'utilisateur doit avoir au moins 4 caractères',
                'max_length' => 'Le nom d\'utilisateur ne peut pas dépasser 20 caractères'
            ],
            'password' => [
                'required' => 'Merci d\'indiquer votre mot de passe',
                'min_length' => 'Le mot de passe doit avoir au moins 4 caractères',
                'max_length' => 'Le mot de passe ne peut pas dépasser 30 caractères'
            ]
        ])) {
            echo view('template/header');
            echo view('form/login', ['validation' => $this->validator]);
            echo view('template/footer');
            return; // Sortir de la méthode si la validation échoue
        }

        // Si la validation passe, vérifiez le login et le mot de passe
        $loggedIn = $this->verifyLoginPassword();
        if ($loggedIn === true) {
            if (Session::getSessionData('idAdmin')) {
                return redirect()->to(base_url('index.php/PageAdmin'));
            } else {
                return redirect()->to(base_url('index.php/PageUser'));
            }
        } else {
            // Si la connexion échoue, rediriger vers la page de connexion avec un message d'erreur
            return redirect()->to(base_url('index.php/Connexion'))->with('error', 'Le nom d\'utilisateur ou le mot de passe est incorrect.');
        }
    }

    public function verifyLoginPassword()
    {
        // Vérifier la méthode HTTP POST
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $SiteReservationModel = new SiteReservationModel();

            // Vérifier d'abord si l'utilisateur est un admin
            $idAdmin = $SiteReservationModel->getIdAdmin($username);

            if (!empty($idAdmin)) {
                $info_admin = $SiteReservationModel->getInfoAdmin($idAdmin[0]['id_admin']); // Accéder à l'ID à partir du tableau de résultats

                // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données pour l'admin
                if (password_verify($password, $info_admin[0]['mdp'])) {
                    Session::initAdminSession($idAdmin); // Initialiser la session pour l'admin
                    return true;
                } else {
                    // Mot de passe incorrect pour l'admin
                    return false;
                }
            } else {
                // L'utilisateur n'est pas un admin, vérifier s'il est un utilisateur normal
                $id_user = $SiteReservationModel->getIdUser($username);

                if (!empty($id_user)) {
                    $info_user = $SiteReservationModel->getInfoUser($id_user[0]['id']); // Accéder à l'ID à partir du tableau de résultats

                    // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données pour l'utilisateur normal
                    if (password_verify($password, $info_user[0]['mdp'])) {
                        Session::initUserSession($id_user); // Initialiser la session pour l'utilisateur normal
                        return true;
                    } else {
                        // Mot de passe incorrect pour l'utilisateur normal
                        return false;
                    }
                } else {
                    // L'utilisateur n'existe pas
                    return false;
                }
            }
        }
        return false; // Retourner false si l'authentification échoue
    }

    public function deconnexion()
    {
        Session::startSession();
        Session::destructSession();
        return redirect()->to(base_url('index.php/Connexion'));
    }
}

?>
