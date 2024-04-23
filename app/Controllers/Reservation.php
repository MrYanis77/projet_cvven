<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\ReservationModel;
use CodeIgniter\Controller;

class Reservation extends Controller
{
    public function index()
    {
        $userId = session('user')['id'];

        if ($userId == NULL) {
            return redirect()->to(site_url('login'));
        } else {
            // Charger les réservations de l'utilisateur connecté
            $reservationModel = new ReservationModel();
            $data['reservations'] = $reservationModel->where('user_id', $userId)->findAll();

            return view('Pages/reservation', $data);
        }
    }

    public function traiterReservation()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session()->get('user')['id'];
        
        // Récupérer les données du formulaire
        $dateReservation = $this->request->getPost('dateReservation');
        $datefinReservation = $this->request->getPost('datefinReservation');
        $chambre = $this->request->getPost('chambre');

        // Créer une instance du modèle ReservationModel
        $reservationModel = new ReservationModel();

        // Insérer la réservation liée à l'utilisateur connecté
        $reservationModel->insert([
            'date_de_demande' => $dateReservation,
            'date_de_fin' => $datefinReservation,
            'chambre' => $chambre,
            'user_id' => $userId
        ]);

        // Rediriger vers la page de réservation après l'insertion réussie
        return redirect()->to(site_url('reservation'));
    }
}
