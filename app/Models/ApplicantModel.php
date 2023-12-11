<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicantModel extends Model
{
    protected $table          = 'applicant';
    protected $primaryKey     = 'id_applicant';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'no_formulir',
        'tanggal_ujian',
        'id_prospect',
    ];
    protected $useTimestamps  = false;

    public function getRelateDataWithProspects($perPage = 10)
    {
        return $this->join('prospect', 'prospect.id=applicant.id_prospect')->paginate($perPage);
    }
    public function get_applicant()
    {
        return $this->db->table('applicant')->join('prospect', 'prospect.id = applicant.id_prospect')->get()->getResultArray();
    }
    public function getApplicant($id = false)
    {
        if ($id == false) {
            return $this->db->table('applicant')->where('status', 1)->join('prospect', 'prospect.id = applicant.id_prospect')->get()->getResultArray();
        }
        // $data_slug = $this->select('applicant.*, prospect.*,admitted.*')->join('prospect', 'prospect.id=applicant.id_prospect')->join('admitted', 'admitted.id_applicant=applicant.id_applicant')->where(['id' => $id])->first();
        $data_slug = $this->select('applicant.*, prospect.*')->join('prospect', 'prospect.id=applicant.id_prospect')->where(['id' => $id])->first();

        return  $data_slug;
    }
    public function upload($data)
    {
        $this->db->table('applicant')->insertBatch($data);
        if ($this->db->affectedRows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function search($keyword)
    {
        return $this->table('applicant')->like('no_formulir', $keyword);
    }
}
