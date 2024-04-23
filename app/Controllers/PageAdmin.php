<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Session;
use App\Models\SiteReservationModel;

/**
 * Classe technique permettant de visualiser les réservations d'un utilisateur
 */
class PageAdmin extends Controller
{
    /**
     * Récupère les informations de changement d'états de la réservation si l'utilisateur est bien connecté
     *
     * Elle permet notamment d'annuler une réservation s'il n'est pas déjà validé, le contrôle de l'état se fait côté vue
     *
     * @return string|object
     * - string retourne la vue
     * - object redirige vers la Connexion et demande à l'utilisateur de se connecter s'il ne l'est pas déjà
     */
    public function index()
    {
        helper('form');
        
        Session::startSession();
        if (!Session::verifyAdminSession()) {
            return redirect()->to(site_url('Connexion/deconnexion'));
        }
        
        $SiteReservationModel = new SiteReservationModel();
        if (!empty($this->request->getPost('idReservation'))) {
            $SiteReservationModel->updateisValide($this->request->getPost('idReservation'), "Annulée");
        }
        
        echo view('template/header_admin', ['idadmin' => Session::getSessionData('idAdmin')]);
        echo view("form/pageuser", ['tabReservation' => $SiteReservationModel->getLesReservationsByUser(Session::getSessionData('idUser'))]);
        echo view('template/footer');
    }
    
    public function addadmin()
    {
        Session::startSession();
        if (!Session::verifyAdminSession()) {
            return redirect()->to(site_url('Connexion/deconnexion'));
        }
        
        helper('form');
        
        if (!$this->validate([
            'username' => 'required|min_length[4]|max_length[20]',
            'password' => 'required|min_length[4]|max_length[30]|matches[c_password]'
        ], [
            'username' => [
                'required' => 'Merci d\'indiquer un nom d\'utilisateur.',
                'min_length' => 'Le nom d\'utilisateur doit avoir au moins 4 caractères',
                'max_length' => 'Le nom d\'utilisateur ne peut pas dépasser 20 caractères'
            ],
            'password' => [
                'required' => 'Merci d\'indiquer votre mot de passe',
                'min_length' => 'Le mot de passe doit avoir au moins 4 caractères',
                'max_length' => 'Le mot de passe ne peut pas dépasser 30 caractères',
                'matches' => 'Les mots de passe ne correspondent pas'
            ]
        ])) {
            echo view('template/header_admin', ['idadmin' => Session::getSessionData('idAdmin')]);
            echo view("form/addadmin", ['validation' => $this->validator]);
            echo view('template/footer');
            return;
        }
        
        $username = $this->request->getPost('username');
        $mdp = $this->request->getPost('password');
        
        $r_model = new SiteReservationModel();
        $r_model->insertAdmin($username, $mdp);
        
        // Redirection ou traitement supplémentaire après insertion de l'administrateur
        
    }
}
