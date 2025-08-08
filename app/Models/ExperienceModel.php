<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table            = 'experiences';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['cv_submission_id', 'titre_poste', 'entreprise', 'description'];
}