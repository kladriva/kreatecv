<?php

namespace App\Models;

use CodeIgniter\Model;

class CvModel extends Model
{
    protected $table            = 'cv_submissions'; // Le nom de notre table
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Champs autorisés à être insérés ou mis à jour
    // C'est une mesure de sécurité importante !
    protected $allowedFields = [
        'nom_utilisateur', 
        'email', 
        'contact_whatsapp', 
        'derniere_experience', 
        'details_experience',
        'diplome_recent',    // Ajout
        'etablissement',      // Ajout
        'profile_description' // Ajout
    ];

    // Active les timestamps automatiques (created_at, updated_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // On n'a pas besoin de updated_at ici
}