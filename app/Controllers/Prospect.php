<?php

namespace App\Controllers;

use App\Models\ApplicantModel;
use App\Models\MahasiswaModel;
use App\Models\ActivityModel;

use CodeIgniter\I18n\Time;
use DateInterval;
use DateTime;

use Faker\Provider\Uuid;

use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Prospect extends BaseController
{
    protected $mahasiswaModel, $applicantModel, $activityModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->applicantModel = new ApplicantModel();
        $this->activityModel  = new ActivityModel();
    }

    // CRUD Section
    public function prospect()
    {
        $currentPage = $this->request->getVar('page_prospect') ? $this->request->getVar('page_prospect') : 1;
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $orang = $this->mahasiswaModel->search($keyword);
        } else {
            $orang = $this->mahasiswaModel;
        }

        $data = [
            'title_meta'        => view('partials/title-meta', ['title' => 'Prospect']),
            'page_title'        => view('partials/page-title', ['title' => 'Prospect', 'pagetitle' => 'Section']),

            'prospect'          => $orang->where('status', 0)->orderBy('created_at', 'ASC')->paginate(6, 'prospect'),
            // 'prospect'          => dd(json_encode($orang->where('status', 0)->orderBy('created_at', 'ASC')->paginate(6, 'prospect'))),
            'pager'             => $this->mahasiswaModel->pager,
            'currentPage'       => $currentPage,
        ];
        return view('monitoring/prospect', $data);
    }
    public function create()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Tambah Data']),
            'page_title' => view('partials/page-title', ['title' => 'Tambah', 'pagetitle' => 'Prospect']),
            'validation' => \Config\Services::validation()
        ];
        return view('form/prospect-form-create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => [
                // 'rules'  => 'required|is_unique[prospect.nama]',
                'rules'  => 'required',
                'errors' => [
                    'required'      => '"Nama" tidak boleh kosong.',
                    // 'is_unique'     => '"Nama" sudah terdaftar.'
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
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/prospect/create')->withInput()->with('validation', $validation);
        }
        $status_pembayaran = 'pending';

        if ($status_pembayaran == $status_pembayaran) {
            $default = 0;
        } else {
            $default = 1;
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->mahasiswaModel->save([
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
        ]);

        session()->setFlashdata('message', $this->request->getVar('nama') . ' berhasil ditambahkan.');
        return redirect()->to('/prospect');
    }
    public function delete($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        $this->activityModel->where('id_prospect', $id)->delete();
        $this->mahasiswaModel->delete($id);

        session()->setFlashdata('message', $mahasiswa['nama'] . ' berhasil dihapus.');
        return redirect()->to('/prospect');
    }
    public function deleteAll()
    {
        $dataFromAjax = $this->request->getPost('query');
        if ($dataFromAjax) {
            foreach ($dataFromAjax as $d) {
                $this->activityModel->where('id_prospect', $d)->delete();
                $this->mahasiswaModel->delete($d);
            }
            session()->setFlashdata('message', 'Hapus data berhasil.');
            return redirect()->to('/prospect');
        }
    }
    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Data']),
            'page_title' => view('partials/page-title', ['title' => 'Edit', 'pagetitle' => 'Prospect']),
            'mahasiswa'  => $this->mahasiswaModel->getMahasiswa($id),
        ];

        return view('form/prospect_form_edit', $data);
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
            'status_pembayaran' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '"Status Pembayaran" tidak boleh kosong.',
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
            return redirect()->to('/prospect/edit/' . $id)->withInput()->with('validation', $validation);
        }
        $default = 0;
        if ($this->request->getVar('status_pembayaran') == 'pending' || $this->request->getVar('status_pembayaran') == 'Pending') {
            $default = 0;
        } else if ($this->request->getVar('status_pembayaran') == 'Lunas' || $this->request->getVar('status_pembayaran') == 'lunas') {
            $default = 1;
            $no_formulir = $this->request->getVar('no_formulir');
            $tanggal_ujian = $this->request->getVar('tgl_ujian');
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data_prospect = [
            'id'                    => $id,
            'nama'                  => strtoupper($this->request->getVar('nama')),
            'asal_sekolah'          => strtoupper($this->request->getVar('asal_sekolah')),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => $this->request->getVar('status_pembayaran'),
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
            'slug'                  => $slug,
            'status'                => $default,
        ];
        if ($default == 0) {
            $this->mahasiswaModel->update($id, $data_prospect);
        }

        if ($this->request->getVar('status_pembayaran') == 'Lunas' || $this->request->getVar('status_pembayaran') == 'lunas') {
            $data_prospect = [
                'id'                    => $id,
                'nama'                  => $this->request->getVar('nama'),
                'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                'no_telp'               => $this->request->getVar('no_tlp'),
                'status_pembayaran'     => ucwords($this->request->getVar('status_pembayaran')),
                'program'               => $this->request->getVar('program'),
                'program_studi'         => $this->request->getVar('program_studi'),
                'email'                 => $this->request->getVar('email'),
                'created_at'            => $this->mahasiswaModel->datenow(),
                'updated_at'            => $this->mahasiswaModel->datenow(),
                'slug'                  => $slug,
                'status'                => $default,
            ];
            $this->mahasiswaModel->update($id, $data_prospect);

            $data_applicant = [
                'id_prospect'           => $id,
                'no_formulir'           => $no_formulir,
                'tanggal_ujian'         => $tanggal_ujian,
            ];
            $this->applicantModel->save($data_applicant);

            $mahasiswa = $this->mahasiswaModel->find($id);

            session()->setFlashdata('message', $mahasiswa['nama'] . ' berhasil diupdate.');
            return redirect()->to('/prospect');
        }

        $mahasiswa = $this->mahasiswaModel->find($id);

        session()->setFlashdata('message', $mahasiswa['nama'] . ' berhasil diupdate.');
        return redirect()->to('/prospect');
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
        $status = 0;
        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata   = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount  = count($sheetdata);
        $faker = \Faker\Factory::create();
        if ($sheetcount > 1) {
            $data = array();
            for ($i = 1; $i < $sheetcount; $i++) {
                $id = $faker->uuid;
                $nama = $sheetdata[$i][1];
                $asal_sekolah = $sheetdata[$i][2];
                $no_telp = $sheetdata[$i][3];
                $status_pembayaran = $sheetdata[$i][4];
                $program = $sheetdata[$i][5];
                $program_studi = $sheetdata[$i][6];
                $email = $sheetdata[$i][7];
                $slug = url_title($sheetdata[$i][1], '-', true);
                $data[] = array(
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
            }
            $insertdata = $this->mahasiswaModel->upload($data);
            if ($insertdata) {
                session()->setFlashdata('message', 'Upload data berhasil');
                return redirect()->to('/prospect');
            } else {
                session()->setFlashdata('message', 'Upload data gagal');
                return redirect()->to('/prospect');
            }
            redirect()->to('/prospect');
        }
    }
    public function template_file()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="template_file_prospect.xlsx"');
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Asal_Sekolah');
        $sheet->setCellValue('D1', 'No. Telephon');
        $sheet->setCellValue('E1', 'Status Pembayaran');
        $sheet->setCellValue('F1', 'Program');
        $sheet->setCellValue('G1', 'Program Studi');
        $sheet->setCellValue('H1', 'Email');
        $sheet->setCellValue('I1', 'Status');

        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->getStyle('A1:I1')->getFill()
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


        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    // Accumulate Prospect Data
    public function prospect_today()
    {
        $startDate = Time::now()->addHours(12)->format('Y-m-d 00:00:00');
        $endDate = Time::now()->addDays(2)->format('Y-m-d 00:00:00');

        $data['prospect'] = $this->mahasiswaModel->where('created_at >=', $startDate)->where('created_at <=', $endDate)->where('status', 0)->findAll();

        $rowCount = count($data['prospect']);
        $data['created_at'] = $rowCount;
        $data_hari_ini = $data['created_at'];

        return $data_hari_ini;
    }
    public function prospect_this_week()
    {
        $get = $this->mahasiswaModel;
        $weekend = $get->getWeekend();
        $monday = $get->getMonday();

        $data_weeks['prospect'] = $this->mahasiswaModel->where('created_at >=', $monday)->where('created_at <=', $weekend)->where('status', 0)->findAll();

        $rowCount_weeks = count($data_weeks['prospect']);
        $data_week['created_at'] = $rowCount_weeks;
        $data_minggu_ini = $data_week['created_at'];

        // dd($monday, $weekend);

        return $data_minggu_ini;
    }
    public function sorted()
    {
        $getStatus = $this->mahasiswaModel->orderBy('status', 'DESC')->get();

        return $getStatus;
    }

    // User Section
    public function user($id)
    {
        $orang      = $this->mahasiswaModel->where('id', $id)->get()->getResultArray();
        // $activity   = $this->activityModel->where('id_prospect', $id)->where('status_activity', 0)->get()->getResultArray();
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
            'title_meta'         => view('partials/title-meta', ['title' => $orang[0]['nama']]),
            'page_title'         => view('partials/page-title', ['title' => $orang[0]['nama'], 'pagetitle' => 'User Details']),
            'mahasiswa'          => $orang,
            'datas'              => $month_year,
        ];

        return view('User/user_prospect', $data);
    }
    public function update_user($id)
    {
        $default = 0;
        if ($this->request->getVar('status_pembayaran') == 'pending' || $this->request->getVar('status_pembayaran') == 'Pending') {
            $default = 0;
        } else if ($this->request->getVar('status_pembayaran') == 'Lunas' || $this->request->getVar('status_pembayaran') == 'lunas') {
            $default = 1;
            $no_formulir = $this->request->getVar('no_formulir');
            $tanggal_ujian = $this->request->getVar('tgl_ujian');
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);

        $data_mahasiswa = [
            'id'                    => $id,
            'nama'                  => strtoupper($this->request->getVar('nama')),
            'asal_sekolah'          => strtoupper($this->request->getVar('asal_sekolah')),
            'no_telp'               => $this->request->getVar('no_tlp'),
            'status_pembayaran'     => 'Pending',
            'program'               => $this->request->getVar('program'),
            'program_studi'         => $this->request->getVar('program_studi'),
            'email'                 => $this->request->getVar('email'),
            'created_at'            => $this->mahasiswaModel->datenow(),
            'updated_at'            => $this->mahasiswaModel->datenow(),
            'slug'                  => $slug,
            'status'                => $default,
        ];
        if ($default == 0) {
            $this->mahasiswaModel->update($id, $data_mahasiswa);
        }

        if ($this->request->getVar('status_pembayaran') == 'Lunas' || $this->request->getVar('status_pembayaran') == 'lunas') {
            $data_mahasiswa = [
                'id'                    => $id,
                'nama'                  => $this->request->getVar('nama'),
                'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                'no_telp'               => $this->request->getVar('no_tlp'),
                'status_pembayaran'     => ucwords($this->request->getVar('status_pembayaran')),
                'program'               => $this->request->getVar('program'),
                'program_studi'         => $this->request->getVar('program_studi'),
                'email'                 => $this->request->getVar('email'),
                'created_at'            => $this->mahasiswaModel->datenow(),
                'updated_at'            => $this->mahasiswaModel->datenow(),
                'slug'                  => $slug,
                'status'                => $default,
            ];
            $this->mahasiswaModel->update($id, $data_mahasiswa);

            $data_applicant = [
                'id_prospect'           => $id,
                'no_formulir'           => $no_formulir,
                'tanggal_ujian'         => $tanggal_ujian,
            ];
            $this->applicantModel->save($data_applicant);
        }
        return redirect()->to('/prospect/user/' . $id);
    }
    public function update_change_stages($id)
    {
        $default = 1;
        $data_prospect = $this->mahasiswaModel->find($id);
        $slug = url_title($data_prospect['nama'], '-', 'true');

        // request no_formulir and date
        $no_formulir = $this->request->getVar('no_formulir');
        $tanggal_ujian = $this->request->getVar('tgl_ujian');

        if ($no_formulir != '' && $tanggal_ujian != '') {
            $data_prospect = [
                'id'                    => $id,
                'nama'                  => $data_prospect['nama'],
                'asal_sekolah'          => $data_prospect['asal_sekolah'],
                'no_telp'               => $data_prospect['no_telp'],
                'status_pembayaran'     => 'Lunas',
                'program'               => $data_prospect['program'],
                'program_studi'         => $data_prospect['program_studi'],
                'email'                 => $data_prospect['email'],
                'created_at'            => $data_prospect['created_at'],
                'updated_at'            => $data_prospect['updated_at'],
                'slug'                  => $slug,
                'status'                => $default,
            ];
            $this->mahasiswaModel->update($id, $data_prospect);

            $data_applicant = [
                'id_prospect'   => $id,
                'no_formulir'   => $no_formulir,
                'tanggal_ujian' => $tanggal_ujian,
            ];
            $this->applicantModel->save($data_applicant);
            return redirect()->to('/applicant/user/' . $id);
        }

        return redirect()->to('/prospect/user/' . $id);
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
    public function logCall($id)
    {
        $nama = $this->request->getVar('name');
        $subject = $this->request->getVar('subject');
        $comment = $this->request->getVar('comments');

        $getId = $this->mahasiswaModel->where('id', $id)->first();
        $save_activity =  [
            'id_prospect'           => $getId['id'],
            'type_activity'         => 'Call',
            'created_message'       => $this->activityModel->datenow(),
            'subject'               => $subject,
            'comments'              => $comment,
            'status_activity'       => $getId['status'],
        ];
        $this->activityModel->save($save_activity);

        return redirect()->to(base_url('/prospect/user/' . $id));
    }
}
