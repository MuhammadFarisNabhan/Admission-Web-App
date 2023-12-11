<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmittedModel extends Model
{
    protected $table          = 'admitted';
    protected $primaryKey     = 'id_admitted';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'hasil_ujian',
        'id_prospect',
        'id_applicant'
    ];
    protected $useTimestamps      = false;

    public function getAdmitted($id = false)
    {
        if ($id == false) {
            return $this->db->table('admitted')->where('status', 2)->join('prospect', 'prospect.id = admitted.id_prospect')->join('applicant', 'applicant.id_applicant=admitted.id_applicant')->get()->getResultArray();
        }
        $data_slug = $this->select('applicant.*, prospect.*,admitted.*')->join('prospect', 'prospect.id=admitted.id_prospect')->join('applicant', 'applicant.id_applicant=admitted.id_applicant')->where(['id' => $id])->first();
        return $data_slug;
    }
    public function search($keyword)
    {
        return $this->table('admitted')->like('nama', $keyword);
    }
}
