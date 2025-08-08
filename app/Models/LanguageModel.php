<?php namespace App\Models;
use CodeIgniter\Model;
class LanguageModel extends Model {
    protected $table = 'langues';
    protected $allowedFields = ['cv_submission_id', 'nom_langue', 'niveau'];
}