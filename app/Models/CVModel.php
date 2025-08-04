<?php

namespace App\Models;

use CodeIgniter\Model;

class CVModel extends Model
{
    protected $table      = 'cvs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'filename', 'filepath', 'created_at'];
    public $timestamps = true;
}
