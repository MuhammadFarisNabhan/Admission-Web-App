<?php

namespace App\Models;

use CodeIgniter\Model;
use \DateTime;
use \DateInterval;

class ActivityModel extends Model
{
    protected $table          = 'activity';
    protected $primaryKey     = 'id_activity';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'id_prospect',
        'type_activity',
        'created_message',
        'subject',
        'comments',
        'status_activity',
    ];
    protected $useTimestamps      = false;
    protected $dateFormat         = 'datetime';

    public function datenow()
    {
        $currentDateTime = new DateTime();
        $intervalDate = new DateInterval('PT12H');
        $currentDateTime->add($intervalDate);

        return $currentDateTime->format('Y-m-d H:i:s');
    }
}
