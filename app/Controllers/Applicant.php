<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\ApplicantModel;
use App\Models\AdmittedModel;
use App\Models\ActivityModel;

use CodeIgniter\I18n\Time;
use Faker\Provider\Uuid;

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Applicant extends BaseController
{
    protected $mahasiswaModel, $applicantModel, $admittedmodel, $activityModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->applicantModel = new ApplicantModel();
        $this->admittedmodel = new AdmittedModel();
        $this->activityModel = new ActivityModel();
    }

    // CRUD Section
    public function applicant()
    {
        $currentPage = $this->request->getVar('page_applicant') ? $this->request->getVar('page_applicant') : 1;
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orang = $this->applicantModel->search($keyword);
        } else {
            $orang = $this->applicantModel->select('applicant.*, prospect.*')->join('prospect', 'prospect.id=applicant.id_prospect')->where('status', 1);
        }
        $data = [
            'title_meta'        => view('partials/title-meta', ['title' => 'Applicant']),
            'page_title'        => view('partials/page-title', ['title' => 'Applicant', 'pagetitle' => 'Section']),

            'applicant'         => $orang->orderBy('created_at', 'ASC')->paginate(6, 'applicant'),
            'pager'             => $orang->pager,
            'currentPage'       => $currentPage,
        ];
        return view('monitoring/applicant', $data);
    }
    public function create()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data']),
            'page_title' => view('partials/page-title', ['title' => 'Tambah', 'pagetitle' => 'Applicant']),
            'validation' => \Config\Services::validation()
        ];
        return view('form/applicant-form-create', $data);
    }
    public function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        $applicant = $this->applicantModel->whereIn('id_prospect', $mahasiswa);

        $getNama = $this->mahasiswaModel->select('nama')->where('id', $id)->get()->getResultArray();

        if ($applicant) {
            $this->applicantModel->delete();
            $this->activityModel->where('id_prospect', $id)->delete();
            $this->mahasiswaModel->delete($id);
        } else {

            return session()->setFlashdata('message', 'Gagal menghapus ' . $getNama[0]['nama'] . '.');
        }

        session()->setFlashdata('message', $getNama[0]['nama'] . ' berhasil dihapus.');
        return redirect()->to('/applicant');
    }
    public function deleteAll()
    {
        $dataFromAjax = $this->request->getPost('query');
        if ($dataFromAjax) {
            foreach ($dataFromAjax as $d) {
                $mahasiswa = $this->mahasiswaModel->find($d);
                $applicant = $this->applicantModel->where('id_prospect', $d);
                if ($applicant) {
                    $this->applicantModel->delete();
                    $this->activityModel->where('id_prospect', $d)->delete();
                    $this->mahasiswaModel->delete($d);
                }
            }
            session()->setFlashdata('message', 'Hapus data berhasil.');
            return redirect()->to('/applicant');
        }
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required'      => '"Nama" tidak boleh kosong.',
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
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/applicant/create')->withInput()->with('validation', $validation);
        }

        $default = 1;
        $slug = url_title($this->request->getVar('nama'), '-', true);

        $data_mahasiswa = [
            'nama'                  => strtoupper($this->request->getVar('nama')),
            'asal_sekolah'          => strtoupper($this->request->getVar('asal_sekolah')),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => 'Lunas',
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
        ];
        $this->mahasiswaModel->insert($data_mahasiswa);

        $getUserId = $this->mahasiswaModel->getInsertID();

        $data_applicant = [
            'id_prospect'           => $getUserId,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tgl_ujian'),
        ];
        $this->applicantModel->save($data_applicant);

        session()->setFlashdata('message', $this->request->getVar('nama')  . ' berhasil ditambahkan.');
        return redirect()->to('/applicant');
    }
    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Data']),
            'page_title' => view('partials/page-title', ['title' => 'Edit', 'pagetitle' => 'Applicant']),
            'mahasiswa'  => $this->applicantModel->getApplicant($id),
        ];

        return view('form/applicant_form_edit', $data);
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
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/applicant/edit/' . $id)->withInput()->with('validation', $validation);
        }
        $default = 1;
        if ($this->request->getVar('hasil_ujian') == '') {
            $default = 1;
        } else if ($this->request->getVar('hasil_ujian') != '') {
            $default = 2;
            $hasilUjian = $this->request->getVar('hasil_ujian');
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data_prospect = [
            'id'                    => $id,
            'nama'                  => $this->request->getVar('nama'),
            'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => 'Lunas',
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
        ];

        $getIdProspect = $this->applicantModel->where('id_prospect', $id)->first();
        $data_applicant = [
            'id_prospect'           => $id,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
        ];

        if ($default == 1) {
            $this->mahasiswaModel->update($id, $data_prospect);
            $this->applicantModel->update($getIdProspect['id_applicant'], $data_applicant);
        }


        if ($this->request->getVar('hasil_ujian') != '') {
            $data_prospect = [
                'id'                    => $id,
                'nama'                  => $this->request->getVar('nama'),
                'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                'no_telp'               => $this->request->getVar('no_tlp'),
                'status_pembayaran'     => 'Lunas',
                'program'               => $this->request->getVar('program'),
                'program_studi'         => $this->request->getVar('program_studi'),
                'email'                 => $this->request->getVar('email'),
                'slug'                  => $slug,
                'status'                => $default,
                'created_at'            => $this->mahasiswaModel->datenow(),
                'updated_at'            => $this->mahasiswaModel->datenow(),
            ];
            $this->mahasiswaModel->update($id, $data_prospect);

            $data_applicant = [
                'id_prospect'           => $id,
                'no_formulir'           => $this->request->getVar('no_formulir'),
                'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
            ];
            $getIdApplicant = $this->applicantModel->where('id_prospect', $id)->first();
            $this->applicantModel->update($getIdApplicant['id_applicant'], $data_applicant);

            $data_admitted = [
                'id_prospect'           => $id,
                'id_applicant'          => $getIdApplicant['id_applicant'],
                'hasil_ujian'           => $hasilUjian,
            ];
            $this->admittedmodel->save($data_admitted);
        }

        session()->setFlashdata('message', $this->request->getVar('nama') . ' berhasil diubah.');
        return redirect()->to('/applicant');
    }

    // Accumulate Prospect Data
    public function applicant_today()
    {
        $startDate = Time::now()->addHours(12)->format('Y-m-d 00:00:00');
        $endDate = Time::now()->addDays(2)->format('Y-m-d 00:00:00');

        $data['prospect'] = $this->mahasiswaModel->where('created_at >=', $startDate)->where('created_at <=', $endDate)->where('status', 1)->findAll();

        $rowCount = count($data['prospect']);
        $data['created_at'] = $rowCount;
        $data_hari_ini = $data['created_at'];

        // dd($startDate, $endDate, $data_hari_ini);

        return $data_hari_ini;
    }
    public function applicant_this_week()
    {
        $get = $this->mahasiswaModel;
        $weekend = $get->getWeekend();
        $monday = $get->getMonday();

        $data_weeks['prospect'] = $this->mahasiswaModel->where('created_at >=', $monday)->where('created_at <=', $weekend)->where('status', 1)->findAll();

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
        $status = 1;
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount  = count($sheetdata);
        $faker       = \Faker\Factory::create();
        if ($sheetcount > 1) {
            // $data_prospect = array();
            // $data_applicant = array();
            for ($i = 1; $i < $sheetcount; $i++) {
                $id = $faker->uuid;
                $nama = $sheetdata[$i][1];
                $asal_sekolah = $sheetdata[$i][2];
                $no_telp = $sheetdata[$i][3];
                $status_pembayaran = $sheetdata[$i][4];
                $no_formulir = $sheetdata[$i][5];
                $tgl_ujian = $sheetdata[$i][6];
                $program = $sheetdata[$i][7];
                $program_studi = $sheetdata[$i][8];
                $email = $sheetdata[$i][9];
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

                $getID = $mahasiswamodel->getInsertID();

                $data_applicant = array(
                    'id_prospect'       => $getID,
                    'no_formulir'       => $no_formulir,
                    'tanggal_ujian'     => date("Y-m-d ", strtotime($tgl_ujian)),
                );
                $applicantmodel = new ApplicantModel();
                $applicantmodel->save($data_applicant);

                // dd($data_prospect, $data_applicant);
            }
            if ($applicantmodel) {
                session()->setFlashdata('message', 'Upload data berhasil');
                return redirect()->to('/applicant');
            } else {
                session()->setFlashdata('message', 'Upload data gagal');
                return redirect()->to('/applicant');
            }
            redirect()->to('/applicant');
        }
    }
    public function template_file()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="template_file_applicant.xlsx"');
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Asal_Sekolah');
        $sheet->setCellValue('D1', 'No. Telephon');
        $sheet->setCellValue('E1', 'Status Pembayaran');
        $sheet->setCellValue('F1', 'No. Formulir');
        $sheet->setCellValue('G1', 'Tanggal Ujian');
        $sheet->setCellValue('H1', 'Program');
        $sheet->setCellValue('I1', 'Program Studi');
        $sheet->setCellValue('J1', 'Email');
        $sheet->setCellValue('K1', 'Status');

        $sheet->getStyle('A1:K1')->getFont()->setBold(true);
        $sheet->getStyle('A1:K1')->getFill()
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


        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    // User Section
    public function user($id)
    {
        $orang_ = $this->mahasiswaModel->where('id', $id)->get()->getResultArray();
        $orang = $this->applicantModel->select('applicant.*, prospect.*')->join('prospect', 'prospect.id=applicant.id_prospect')->where('id_prospect', $orang_[0]['id'])->get()->getResultArray();

        // $activity   = $this->activityModel->where('id_prospect', $id)->where('status_activity', 1)->get()->getResultArray();
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
            'title_meta'          => view('partials/title-meta', ['title' => $orang[0]['nama']]),
            'page_title'          => view('partials/page-title', ['title' => $orang[0]['nama'], 'pagetitle' => 'User Details']),
            'mahasiswa'           => $orang,
            'datas'               => $month_year,
        ];
        return view('User/user_applicant', $data);
    }
    public function update_user($id)
    {
        $default = 1;

        if ($this->request->getVar('hasil_ujian') == '') {
            $default = 1;
        } else if ($this->request->getVar('hasil_ujian') != '') {
            $default = 2;
            $hasilUjian = $this->request->getVar('hasil_ujian');
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data_prospect = [
            'id'                    => $id,
            'nama'                  => $this->request->getVar('nama'),
            'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => 'Lunas',
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'slug'                  => $slug,
            'status'                => $default,
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
        ];

        $getIdProspect = $this->applicantModel->where('id_prospect', $id)->first();
        $data_applicant = [
            'id_prospect'           => $id,
            'no_formulir'           => $this->request->getVar('no_formulir'),
            'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
        ];

        if ($default == 1) {
            $this->mahasiswaModel->update($id, $data_prospect);
            $this->applicantModel->update($getIdProspect['id_applicant'], $data_applicant);
        }


        if ($this->request->getVar('hasil_ujian') != '') {
            $data_prospect = [
                'id'                    => $id,
                'nama'                  => $this->request->getVar('nama'),
                'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                'no_telp'               => $this->request->getVar('no_tlp'),
                'status_pembayaran'     => 'Lunas',
                'program'               => $this->request->getVar('program'),
                'program_studi'         => $this->request->getVar('program_studi'),
                'email'                 => $this->request->getVar('email'),
                'slug'                  => $slug,
                'status'                => $default,
                'created_at'            => $this->mahasiswaModel->datenow(),
                'updated_at'            => $this->mahasiswaModel->datenow(),
            ];
            $this->mahasiswaModel->update($id, $data_prospect);

            $data_applicant = [
                'id_prospect'           => $id,
                'no_formulir'           => $this->request->getVar('no_formulir'),
                'tanggal_ujian'         => $this->request->getVar('tanggal_ujian'),
            ];

            $getIdApplicant = $this->applicantModel->where('id_prospect', $id)->first();
            $this->applicantModel->update($getIdApplicant['id_applicant'], $data_applicant);

            $data_admitted = [
                'id_prospect'           => $id,
                'id_applicant'          => $getIdApplicant['id_applicant'],
                'hasil_ujian'           => $hasilUjian,
            ];
            $this->admittedmodel->save($data_admitted);

            // $mahasiswa = $this->mahasiswaModel->find($id);
            // $applicant = $this->applicantModel->whereIn('id_prospect', $mahasiswa);

            // $getNama = $this->mahasiswaModel->select('nama')->where('id', $id)->get()->getResultArray();

            // if ($applicant) {
            //     $this->applicantModel->delete();
            //     $this->mahasiswaModel->delete($id);
            // } else {

            //     return session()->setFlashdata('message', 'Gagal menghapus ' . $getNama[0]['nama'] . '.');
            // }
        }

        session()->setFlashdata('message', $this->request->getVar('nama') . ' berhasil diubah.');
        return redirect()->to('/applicant/user/' . $id);
    }
    public function update_change_stages($id)
    {
        $default = 2;
        $datas = $this->mahasiswaModel->where('id', $id)->get()->getResultArray();
        $data_applicant = $this->applicantModel->select('applicant.*, prospect.*')->join('prospect', 'prospect.id=applicant.id_prospect')->where('id_prospect', $datas[0]['id'])->get()->getResultArray();
        $slug = url_title($datas[0]['nama'], '-', 'true');

        // request hasil_ujian
        $hasil_ujian = $this->request->getVar('hasil_ujian');

        if ($hasil_ujian != '') {
            $data_mahasiswa = [
                'id'                    => $id,
                'nama'                  => $data_applicant[0]['nama'],
                'asal_sekolah'          => $data_applicant[0]['asal_sekolah'],
                'no_telp'               => $data_applicant[0]['no_telp'],
                'status_pembayaran'     => $data_applicant[0]['status_pembayaran'],
                'program'               => $data_applicant[0]['program'],
                'program_studi'         => $data_applicant[0]['program_studi'],
                'email'                 => $data_applicant[0]['email'],
                'created_at'            => $data_applicant[0]['created_at'],
                'updated_at'            => $data_applicant[0]['updated_at'],
                'slug'                  => $slug,
                'status'                => $default,
            ];
            $this->mahasiswaModel->update($id, $data_mahasiswa);

            $data_applicant = [
                'id_prospect'   => $id,
                'no_formulir'   => $data_applicant[0]['no_formulir'],
                'tanggal_ujian' => $data_applicant[0]['tanggal_ujian'],
            ];
            $getIdApplicant = $this->applicantModel->where('id_prospect', $id)->first();
            $this->applicantModel->update($getIdApplicant['id_applicant'], $data_applicant);

            $data_admitted = [
                'id_prospect'           => $id,
                'id_applicant'          => $getIdApplicant['id_applicant'],
                'hasil_ujian'           => $hasil_ujian,
            ];
            $this->admittedmodel->save($data_admitted);

            return redirect()->to('/admitted/user/' . $id);
        }
        return redirect()->to('/applicant/user/' . $id);
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
