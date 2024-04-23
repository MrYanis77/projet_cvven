<?php
namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'demandereservation'; // Nom de la table dans la base de données
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['date_de_demande', 'date_de_fin', 'chambre', 'user_id']; // Champs autorisés à être insérés ou mis à jour
    public function getAllReservations()
    {
        return $this->findAll();
    }
}
