<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrolledModel extends Model
{
    protected $table          = 'enrollee';
    protected $primaryKey     = 'id_enrollee';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'npm',
        'id_prospect',
        'id_applicant',
        'id_admitted',
    ];
    protected $useTimestamps      = false;
    public function getEnrolled($id = false)
    {
        if ($id == false) {
            return $this->db->table('enrollee')->where('status', 3)->join('prospect', 'prospect.id = enrollee.id_prospect')->join('applicant', 'applicant.id_applicant=enrollee.id_applicant')->join('admitted', 'admitted.id_admitted=enrollee.id_admitted')->get()->getResultArray();;
        }
        $data_slug = $this->select('applicant.*, prospect.*,admitted.*,enrollee.*')->join('prospect', 'prospect.id=enrollee.id_prospect')->join('applicant', 'applicant.id_applicant=enrollee.id_applicant')->join('admitted', 'admitted.id_admitted=enrollee.id_admitted')->where(['id' => $id])->first();
        return $data_slug;
    }
    public function search($keyword)
    {
        return $this->table('enrollee')->like('nama', $keyword);
    }
}
