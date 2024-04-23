<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        // Déconnectez l'utilisateur en détruisant la session
        session()->destroy();

        // Rediriger vers la page d'accueil
        return redirect()->to(site_url('/'));
    }
}