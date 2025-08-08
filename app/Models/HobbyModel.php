<?php namespace App\Models;
use CodeIgniter\Model;
class HobbyModel extends Model {
    protected $table = 'hobbies';
    protected $allowedFields = ['cv_submission_id', 'nom_hobby'];
}