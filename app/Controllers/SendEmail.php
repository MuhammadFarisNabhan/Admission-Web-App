<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MahasiswaModel;
use App\Models\ActivityModel;

use function PHPUnit\Framework\returnSelf;

class SendEmail extends BaseController
{
    protected $activityModel, $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->activityModel = new ActivityModel();
    }
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            $email_tujuan = $this->request->getVar('email_tujuan');
            $subject = $this->request->getVar('subject');
            $pesan = $this->request->getVar('pesan');

            // getId
            $separate_email = explode(",", $email_tujuan);
            foreach ($separate_email as $email) {
                $getIdProspect = $this->mahasiswaModel->where('email', $email)->get()->getResultArray();
                $data_activity = [
                    'id_prospect'           => $getIdProspect[0]['id'],
                    'type_activity'         => 'Email',
                    'created_message'       => $this->activityModel->datenow(),
                    'subject'               => $subject,
                    'comments'              => $pesan,
                    'status_activity'       => $getIdProspect[0]['status'],
                ];
                $this->activityModel->save($data_activity);
            }

            $email = service('email');
            $email->setTo($email_tujuan);
            $email->setFrom('t76656320@gmail.com', 'Admin Unas');

            $email->setSubject($subject);
            $email->setMessage($pesan);

            if ($email->send()) {
                session()->setFlashdata('message', 'Email berhasil terkirim.');
                return redirect()->back();
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        } else {
            session()->setFlashdata('message', 'Email gagal terkirim.');
            return redirect()->back();
        }
    }
}
