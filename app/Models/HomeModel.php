<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }
    protected $table          = 'product';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'product_name',
        'product_quantity',
        'product_price',
        'product_status',
    ];
    protected $useTimestamps      = true;

    public function upload($data)
    {
        $this->db->table('product')->insertBatch($data);
        if ($this->db->affectedRows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
