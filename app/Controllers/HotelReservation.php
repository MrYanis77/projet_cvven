<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HotelReservation extends Controller
{
    public function index()
    {
        // Charger la vue
        return view('Pages/HotelReservation');
    }
}
