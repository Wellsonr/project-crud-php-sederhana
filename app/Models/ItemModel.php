<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'description', 'price'];
    protected $useTimestamps    = true;
    protected $validationRules  = [
        'name'  => 'required|max_length[255]',
        'price' => 'permit_empty|decimal',
    ];
}
