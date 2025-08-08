<?php

namespace App\Models;

use CodeIgniter\Model;

class CompetenceModel extends Model
{
    protected $table            = 'competences';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['cv_submission_id', 'nom_competence', 'niveau'];
}