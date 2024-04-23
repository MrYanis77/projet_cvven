<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiteReservationModel;
use App\Models\Session; // Assurez-vous d'importer la classe Session

class CreateUser extends Controller
{
    /**
     * Vérifie si les champs manquants du formulaire sont bien remplis
     * 
     * @param void
     * @return string|object  
     * - string retourne la vue avec les erreurs
     * - object redirige sur le contrôleur home.
     */
    public function index()
    {
        helper('form');

        echo view('template/header');
        echo view('form/inscription');
        echo view('template/footer');
    }

    public function enregistrement()
    {
        // Récupération des données du formulaire
        $prenom = $this->request->getPost('prenom');
        $nom = $this->request->getPost('nom');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $numero_de_telephone = $this->request->getPost('num_tel');
        $mdp = $this->request->getPost('password');
        $mdp_c = $this->request->getPost('c_password');

        if ($mdp==$mdp_c){
            
            $r_model = new SiteReservationModel();
            $r_model->insertAdmin($username, $mdp);
           
            
                
            }
            
            
            
    }
    
}
?>
