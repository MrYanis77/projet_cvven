<?php

namespace App\Controllers;

use App\Models\User_model; // Importez la classe User_model

class ProfilController extends BaseController
{
    public function index()
    {
        // Charge la vue du profil
        return view('Pages/profil');
    }
    
    public function enregistrement()
    {
        $validationRules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Le nom d\'utilisateur est requis.',
                    'is_unique' => 'Ce nom d\'utilisateur existe déjà.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'L\'adresse e-mail est requise.',
                    'valid_email' => 'Le format de l\'adresse e-mail est incorrect.',
                    'is_unique' => 'Cette adresse mail existe déjà.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Le mot de passe est requis.',
                    'min_length' => 'Le mot de passe doit comporter au moins 8 caractères.'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'La confirmation du mot de passe est requise.',
                    'matches' => 'Les mots de passe ne correspondent pas.'
                ]
            ]
        ];

        // Validation des données
        if (!$this->validate($validationRules)) {
            $data['validation'] = $this->validator; // Passer le validateur lui-même
            return view('Pages/profil', $data);
        } 
        else{
            $username = $this->request->getPost('username');
            $email= $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $id =  session('user')['id'];
            
            $usermodel = new User_model();
            $modification = $usermodel->UpdateUser($id, $username, $password, $email);
            
            if ($modification == false) {
                session()->setFlashdata('error', 'La mise à jour de votre profil a rencontré une erreur.');
                
            } else {
                session()->setFlashdata('success', 'Votre profil a été mis à jour avec succès.');
            }
           
            return redirect()->to(site_url('profil'));
        }
            
    }
    
     public function delete(){
        $id =  session('user')['id'];
        $usermodel = new User_model();
        $suppression = $usermodel->DeleteUser($id);
        
        if ($suppression == true) {
            // Si la suppression réussit, déconnectez l'utilisateur
            return redirect()->to(site_url('logout'));
        } else {
            // Si la suppression échoue, redirigez vers la page de profil avec un message d'erreur
            session()->setFlashdata('error', 'La suppression du profil a rencontré une erreur.');
            return redirect()->to(site_url('profil'));
        }
    }
}
