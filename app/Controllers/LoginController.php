<?php

namespace App\Controllers;

use App\Models\User_model; // Importez la classe User_model
use App\Libraries\Session; // Importez la classe Session

class LoginController extends BaseController
{
    public function login()
    {
        return view('Pages/Login');
    }

    public function processlogin()
    {
        // Définition des règles de validation
        $validationRules = [
            'username' => [
                'rules' => 'required|is_not_unique[users.username]',
                'errors' => [
                    'required' => 'Le nom d\'utilisateur est requis.',
                    'is_not_unique' => 'Ce nom d\'utilisateur n\'existe pas.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Le mot de passe est requis.',
                    'min_length' => 'Le mot de passe doit comporter au moins 8 caractères.'
                ]
            ]
        ];

        // Validation des données
        if (!$this->validate($validationRules)) {
            $data['validation'] = $this->validator; // Passer le validateur lui-même
            return view('Pages/Login', $data); // Afficher le formulaire de connexion avec les erreurs de validation
        }

         // Récupérer les données du formulaire
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Charger le modèle UserModel
        $userModel = new User_model();

        // Vérifier les informations de connexion
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Initialiser une session
            session()->start();

            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
                // Ajoutez d'autres données utilisateur si nécessaire
            ];

            // Rediriger l'utilisateur
            return redirect()->to(site_url('/'));
        } else {
            // Informations de connexion invalides, afficher un message d'erreur
            return redirect()->back()->withInput()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
        }
    
    }
}

