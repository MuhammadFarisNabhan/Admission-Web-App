<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\ApplicantModel;
use App\Models\AdmittedModel;
use App\Models\EnrolledModel;
use App\Models\ActivityModel;

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

use CodeIgniter\I18n\Time;
use PDO;

class Enrollee extends BaseController
{
    protected $mahasiswaModel, $applicantModel, $admittedModel, $enrolledModel, $activityModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->applicantModel = new ApplicantModel();
        $this->admittedModel = new AdmittedModel();
        $this->enrolledModel = new EnrolledModel();
        $this->activityModel = new ActivityModel();
    }
    // CRUD Section
    public function enrollee()
    {
        $currentPage = $this->request->getVar('page_enrollee') ? $this->request->getVar('page_enrollee') : 1;
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orang = $this->enrolledModel->search($keyword);
        } else {
            $orang = $this->enrolledModel->select('admitted.*,applicant.*,prospect.*,enrollee.*')->join('prospect', 'prospect.id=enrollee.id_prospect')->join('applicant', 'applicant.id_applicant=enrollee.id_applicant')->join('admitted', 'admitted.id_admitted=enrollee.id_admitted');
        }

        $data = [
            'title_meta'            => view('partials/title-meta', ['title' => 'Enrollee']),
            'page_title'            => view('partials/page-title', ['title' => 'Enrollee', 'pagetitle' => 'Section']),

            'enrollee'              => $orang->orderBy('created_at', 'ASC')->paginate(6, 'enrollee'),
            'pager'                 => $orang->pager,
            'currentPage'           => $currentPage,
        ];
        return view('monitoring/enrollee', $data);
    }
    public function create()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data']),
            'page_title' => view('partials/page-title', ['title' => 'Tambah', 'pagetitle' => 'Enrollee']),
            'validation' => \Config\Services::validation()
        ];
        return view('form/enrollee-form-create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Nama" tidak boleh kosong.',
                ],
            ],
            'asal_sekolah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Asal Sekolah" tidak boleh kosong.',
                ],
            ],
            'no_tlp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"No Telephon" tidak boleh kosong.',
                ],
            ],
            'no_formulir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"No Formulir" tidak boleh kosong.',
                ],
            ],
            'tgl_ujian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Tanggal Ujian" tidak boleh kosong.',
                ],
            ],
            'hasil_ujian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Hasil Ujian" tidak boleh kosong.',
                ],
            ],
            'npm' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"NPM" tidak boleh kosong.',
                ],
            ],
            'program' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Program Studi" tidak boleh kosong.',
                ],
            ],
            'program_studi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Program Studi" tidak boleh kosong.',
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Email" tidak boleh kosong.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/enrollee/create')->withInput()->with('validation', $validation);
        }

        $default = 3;
        $status_pembayaran = 'Lunas';
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $data_mahasiswa = [
            'nama'                  => strtoupper($this->request->getVar('nama')),
            'asal_sekolah'          => strtoupper($this->request->getVar('asal_sekolah')),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => ucwords($status_pembayaran),
            'program'               => $this->request->getVar('program'),
            'program_studi'         => ucwords($this->request->getVar('program_studi')),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
        ];
        $mahasiswamodel = new MahasiswaModel();
        $mahasiswamodel->insert($data_mahasiswa);

        $getUserId = $mahasiswamodel->getInsertID();

        $data_applicant = [
            'id_prospect'           => $getUserId,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tgl_ujian'),
        ];

        $applicantmodel = new ApplicantModel();
        $applicantmodel->save($data_applicant);

        $getApplicantId = $applicantmodel->getInsertID();

        $data_admitted = [
            'id_prospect'           => $getUserId,
            'id_applicant'           => $getApplicantId,
            'hasil_ujian'           => $this->request->getVar('hasil_ujian'),
        ];


        $admittedmodel = new AdmittedModel();
        $admittedmodel->save($data_admitted);

        $getAdmittedId = $admittedmodel->getInsertID();

        $data_enrollee = [
            'npm'           => $this->request->getVar('npm'),
            'id_prospect'   => $getUserId,
            'id_applicant'  => $getApplicantId,
            'id_admitted'   => $getAdmittedId,
        ];

        $enrolleemodel = new EnrolledModel();
        $enrolleemodel->save($data_enrollee);

        session()->setFlashdata('message', $this->request->getVar('nama')  . ' berhasil ditambahkan.');
        return redirect()->to('/enrollee');
    }
    public function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        $applicant = $this->applicantModel->whereIn('id_prospect', $mahasiswa);
        $admitted = $this->admittedModel->whereIn('id_prospect', $mahasiswa);
        $enrollee = $this->enrolledModel->whereIn('id_prospect', $mahasiswa);
        $getNama = $this->mahasiswaModel->select('nama')->where('id', $id)->get()->getResultArray();

        if ($admitted and $applicant and $enrollee) {
            $this->enrolledModel->delete();
            $this->admittedModel->delete();
            $this->applicantModel->delete();
            $this->activityModel->where('id_prospect', $id)->delete();
            $this->mahasiswaModel->delete($id);
        } else {
            return session()->setFlashdata('message', 'Gagal menghapus ' . $getNama[0]['nama'] . '.');
        }

        session()->setFlashdata('message', $getNama[0]['nama'] . ' berhasil dihapus.');
        return redirect()->to('/enrollee');
    }
    public function deleteAll()
    {
        $dataFromAjax = $this->request->getPost('query');

        if ($dataFromAjax) {
            foreach ($dataFromAjax as $d) {
                $mahasiswa = $this->mahasiswaModel->find($d);
                $applicant = $this->applicantModel->where('id_prospect', $d);
                $admitted  = $this->admittedModel->where('id_prospect', $d);
                $enrollee  = $this->enrolledModel->where('id_prospect', $d);
                if ($enrollee) {
                    $this->enrolledModel->delete();
                    $this->admittedModel->delete();
                    $this->applicantModel->delete();
                    $this->activityModel->where('id_prospect', $d)->delete();
                    $this->mahasiswaModel->delete($d);
                }
            }
            session()->setFlashdata('message', 'Hapus data berhasil.');
            return redirect()->to('/admitted');
        }
    }
    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Data']),
            'page_title' => view('partials/page-title', ['title' => 'Edit', 'pagetitle' => 'Enrollee']),
            'mahasiswa'  => $this->enrolledModel->getEnrolled($id),
        ];

        return view('form/enrollee_form_edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Nama" tidak boleh kosong.',
                ],
            ],
            'asal_sekolah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Asal Sekolah" tidak boleh kosong.',
                ],
            ],
            'no_tlp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"No Telephon" tidak boleh kosong.',
                ],
            ],
            'program' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Program" tidak boleh kosong.',
                ],
            ],
            'program_studi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Program Studi" tidak boleh kosong.',
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Email" tidak boleh kosong.',
                ],
            ],
            'no_formulir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"No Formulir" tidak boleh kosong.',
                ],
            ],
            'tanggal_ujian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Tanggal Ujian" tidak boleh kosong.',
                ],
            ],
            'hasil_ujian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Hasil Ujian" tidak boleh kosong.',
                ],
            ],
            'npm' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"NPM" tidak boleh kosong.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/enrollee/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $default = 3;
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data_prospect = [
            'id'                    => $id,
            'nama'                  => $this->request->getVar('nama'),
            'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
        ];

        $getIdProspect = $this->applicantModel->where('id_prospect', $id)->first();
        $getIdApplicant = $this->admittedModel->where('id_applicant', $getIdProspect['id_applicant'])->first();
        $getIdAdmitted = $this->enrolledModel->where('id_prospect', $id)->first();

        $data_applicant = [
            'id_prospect'           => $id,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
        ];
        $data_admitted = [
            'id_prospect'           => $id,
            'id_applicant'          => $getIdProspect['id_applicant'],
            'hasil_ujian'           => $this->request->getVar('hasil_ujian'),
        ];
        $data_enrollee = [
            'id_prospect'           => $id,
            'id_applicant'          => $getIdProspect['id_applicant'],
            'id_admitted'           => $getIdApplicant['id_admitted'],
            'npm'                   => $this->request->getVar('npm'),
        ];

        if ($getIdProspect) {
            $this->applicantModel->update($getIdProspect, $data_applicant);
        }
        if ($getIdApplicant) {
            $this->admittedModel->update($getIdApplicant, $data_admitted);
        }
        if ($getIdAdmitted) {
            $this->enrolledModel->update($getIdAdmitted, $data_enrollee);
        }
        $this->mahasiswaModel->save($data_prospect);

        session()->setFlashdata('message', $this->request->getVar('nama') . ' berhasil diubah.');
        return redirect()->to('/enrollee');
    }

    // Accumulate Enrollee Data
    public function enrollee_today()
    {
        $startDate = Time::now()->addHours(12)->format('Y-m-d 00:00:00');
        $endDate = Time::now()->addDays(2)->format('Y-m-d 00:00:00');

        $data['prospect'] = $this->mahasiswaModel->where('created_at >=', $startDate)->where('created_at <=', $endDate)->where('status', 3)->findAll();

        $rowCount = count($data['prospect']);
        $data['created_at'] = $rowCount;
        $data_hari_ini = $data['created_at'];

        // dd($startDate, $endDate, $data_hari_ini);

        return $data_hari_ini;
    }
    public function enrollee_this_week()
    {
        $get = $this->mahasiswaModel;
        $weekend = $get->getWeekend();
        $monday = $get->getMonday();

        $data_weeks['prospect'] = $this->mahasiswaModel->where('created_at >=', $monday)->where('created_at <=', $weekend)->where('status', 3)->findAll();

        $rowCount_weeks = count($data_weeks['prospect']);
        $data_week['created_at'] = $rowCount_weeks;
        $data_minggu_ini = $data_week['created_at'];

        return $data_minggu_ini;
    }

    // Files Section
    public function upload_file()
    {
        $uploadFile =  $_FILES['upload_file']['name'];
        $extension = pathinfo($uploadFile, PATHINFO_EXTENSION);
        if ($extension == "csv") {
            $reader = new Csv();
        } else if ($extension == "xls") {
            $reader = new Xls();
        } else {
            $reader = new Xlsx();
        };
        $status = 3;
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount  = count($sheetdata);
        $faker       = \Faker\Factory::create();
        $status_pembayaran = 'Lunas';
        if ($sheetcount > 1) {
            $data_prospect = array();
            $data_applicant = array();
            $data_admitted = array();
            $data_enrollee = array();
            for ($i = 1; $i < $sheetcount; $i++) {
                $id   = $faker->uuid;
                $nama = $sheetdata[$i][1];
                $asal_sekolah = $sheetdata[$i][2];
                $no_telp = $sheetdata[$i][3];
                $no_formulir = $sheetdata[$i][4];
                $tgl_ujian = $sheetdata[$i][5];
                $hasil_ujian = $sheetdata[$i][6];
                $npm = $sheetdata[$i][7];
                $program = $sheetdata[$i][8];
                $program_studi = $sheetdata[$i][9];
                $email = $sheetdata[$i][10];
                $slug = url_title($sheetdata[$i][1], '-', true);
                $data_prospect = array(
                    'id'                => $id,
                    'nama'              => strtoupper($nama),
                    'asal_sekolah'      => strtoupper($asal_sekolah),
                    'no_telp'           => $no_telp,
                    'status_pembayaran' => ucwords($status_pembayaran),
                    'program'           => ucwords($program),
                    'program_studi'     => ucwords($program_studi),
                    'email'             => $email,
                    'slug'              => $slug,
                    'status'            => $status,
                    'created_at'        => $this->mahasiswaModel->datenow(),
                    'updated_at'        => $this->mahasiswaModel->datenow(),
                );
                $mahasiswamodel = new MahasiswaModel();
                $mahasiswamodel->insert($data_prospect);

                $getId = $mahasiswamodel->getInsertID();

                $data_applicant = array(
                    'id_prospect'       => $getId,
                    'no_formulir'       => $no_formulir,
                    'tanggal_ujian'     => date('Y-m-d', strtotime($tgl_ujian)),
                );
                $applicantmodel = new ApplicantModel();
                $applicantmodel->insert($data_applicant);

                $getApplicantId = $applicantmodel->getInsertID();

                $data_admitted = array(
                    'id_prospect'   => $getId,
                    'id_applicant'   => $getApplicantId,
                    'hasil_ujian'   =>  ucwords($hasil_ujian),
                );
                $admittedmodel = new AdmittedModel();
                $admittedmodel->insert($data_admitted);

                $getAdmittedId = $admittedmodel->getInsertID();

                $data_enrollee = array(
                    'id_prospect'   => $getId,
                    'id_applicant'  => $getApplicantId,
                    'id_admitted'   => $getAdmittedId,
                    'npm'           => $npm,
                );

                $enrolleemodel = new EnrolledModel();
                $enrolleemodel->save($data_enrollee);
            }
            if ($applicantmodel) {
                session()->setFlashdata('message', 'Upload data berhasil');
                return redirect()->to('/enrollee');
            } else {
                session()->setFlashdata('message', 'Upload data gagal');
                return redirect()->to('/enrollee');
            }
            redirect()->to('/enrollee');
        }
    }
    public function template_file()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="template_file_enrollee.xlsx"');
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Asal_Sekolah');
        $sheet->setCellValue('D1', 'No. Telephon');
        $sheet->setCellValue('E1', 'No. Formulir');
        $sheet->setCellValue('F1', 'Tanggal Ujian');
        $sheet->setCellValue('G1', 'Hasil Ujian');
        $sheet->setCellValue('H1', 'NPM');
        $sheet->setCellValue('I1', 'Program');
        $sheet->setCellValue('J1', 'Program Studi');
        $sheet->setCellValue('K1', 'Email');
        $sheet->setCellValue('L1', 'Status');

        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        $sheet->getStyle('A1:L1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    // User Section
    public function user($id)
    {
        $orang     = $this->mahasiswaModel->where('id', $id)->get()->getResultArray();
        $orang = $this->enrolledModel->select('admitted.*,applicant.*,prospect.*,enrollee.*')->join('prospect', 'prospect.id=enrollee.id_prospect')->join('applicant', 'applicant.id_applicant=enrollee.id_applicant')->join('admitted', 'admitted.id_admitted=enrollee.id_admitted')->where('id', $orang[0]['id'])->get()->getResultArray();

        // $activity   = $this->activityModel->where('id_prospect', $id)->where('status_activity', 3)->get()->getResultArray();
        $activity   = $this->activityModel->where('id_prospect', $id)->get()->getResultArray();

        $month_year = [];
        foreach ($activity as $row) {
            $created_message = $row['created_message'];
            $date = date_create($created_message);
            $yearMonth = date_format($date, 'Y-m');

            $exists = false;
            foreach ($month_year as &$item) {
                if ($item['yearMonth'] == $yearMonth) {
                    $exists = true;
                    $item['datas'][] = $row;
                    break;
                }
            }

            if (!$exists) {
                $month_year[] = [
                    'yearMonth' => $yearMonth,
                    'month' => date_format($date, 'F'),
                    'year' => date_format($date, 'Y'),
                    'datas' => [$row],
                ];
            }
        }

        $data = [
            'title_meta'        => view('partials/title-meta', ['title' => $orang[0]['nama']]),
            'page_title'        => view('partials/page-title', ['title' => $orang[0]['nama'], 'pagetitle' => 'User Details']),
            'mahasiswa'         => $orang,
            'datas'             => $month_year,
        ];
        return view('User/user_enrollee', $data);
    }
    public function update_user($id)
    {
        $default = 3;
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data_prospect = [
            'id'                    => $id,
            'nama'                  => $this->request->getVar('nama'),
            'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
        ];

        $getIdProspect = $this->applicantModel->where('id_prospect', $id)->first();
        $getIdApplicant = $this->admittedModel->where('id_applicant', $getIdProspect['id_applicant'])->first();
        $getIdAdmitted = $this->enrolledModel->where('id_prospect', $id)->first();

        $data_applicant = [
            'id_prospect'           => $id,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
        ];
        $data_admitted = [
            'id_prospect'           => $id,
            'id_applicant'          => $getIdProspect['id_applicant'],
            'hasil_ujian'           => 'Lulus',
        ];
        $data_enrollee = [
            'id_prospect'           => $id,
            'id_applicant'          => $getIdProspect['id_applicant'],
            'id_admitted'           => $getIdApplicant['id_admitted'],
            'npm'                   => $this->request->getVar('npm'),
        ];

        if ($getIdProspect) {
            $this->applicantModel->update($getIdProspect, $data_applicant);
        }
        if ($getIdApplicant) {
            $this->admittedModel->update($getIdApplicant, $data_admitted);
        }
        if ($getIdAdmitted) {
            $this->enrolledModel->update($getIdAdmitted, $data_enrollee);
        }

        $mahasiswamodel = $this->mahasiswaModel;
        $mahasiswamodel->save($data_prospect);

        session()->setFlashdata('message', $this->request->getVar('nama') . ' berhasil diubah.');
        return redirect()->to('/enrollee/user/' . $id);
    }
    public function getEmail()
    {
        $dataFromAjax = $this->request->getPost('query');
        if ($dataFromAjax) {
            foreach ($dataFromAjax as $d) {
                $mahasiswa = $this->mahasiswaModel->find($d);
                $data[] = $mahasiswa['email'];
            }
            return $this->response->setJSON(['emails' => $data]);
        }
    }
}
