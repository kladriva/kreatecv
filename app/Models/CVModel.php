<?php

namespace App\Models;

use CodeIgniter\Model;

class CVModel extends Model
{
    protected $table      = 'cvs';
    protected $primaryKey = 'id';

    // Ajoute ici les champs du formulaire !
    protected $allowedFields = [
        'user_id',
        'username', // <-- Ajouté
        'email',    // <-- Ajouté
        'phone',    // <-- Ajouté
        'filename',
        'filepath',
        'created_at'
    ];
    public $timestamps = true;
}
