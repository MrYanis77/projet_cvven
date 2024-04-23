<?php

namespace App\Controllers;

use App\Models\User_model; // Importez la classe User_model

class SignupController extends BaseController
{
    public function signup()
    {
        // Charge la vue d'inscription
        return view('Pages/Signup');
    }

    public function processSignup()
{
    // Définition des règles de validation
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
        return view('Pages/Signup', $data);
    }
    
    // Récupération des données du formulaire
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Insertion de l'utilisateur dans la base de données
    $userModel = new User_model(); // Supposons que votre modèle s'appelle User_model
    $userData = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT) // Hashage du mot de passe
    ];
    $userModel->insert($userData);

    // Redirection vers une page de confirmation
    return redirect()->to(site_url('login'))->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
}

}
