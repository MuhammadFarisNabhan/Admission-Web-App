<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use DateTime;
use DateInterval;
use CodeIgniter\Database\BaseBuilder;
use DateTimeZone;

class MahasiswaModel extends UuidModel
{
    protected $table          = 'prospect';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'id',
        'no',
        'nama',
        'asal_sekolah',
        'no_telp',
        'status_pembayaran',
        'program',
        'program_studi',
        'email',
        'slug',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps      = false;
    protected $dateFormat         = 'datetime';

    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';

    // to relate table applicant
    public function user()
    {
        return $this->belongsTo('App\Models\ApplicantModel', 'user_id');
    }
    // to relate table admitted
    public function user1()
    {
        return $this->belongsTo('App\Models\AdmittedModel', 'id');
    }
    public function get_applicant($slug = false)
    {
        if ($slug == false) {
            return $this->db->table('applicant')->where('status', 1)->join('prospect', 'prospect.id = applicant.id_prospect')->get()->getResultArray();
        }
        $data_slug = $this->db->table('applicant')->join('prospect', 'prospect.id = applicant.id_prospect')->where(['slug' => $slug])->get()->getResultArray();
        // dd($data_slug);
        return  $data_slug;
    }
    public function getMahasiswa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('prospect')->like('nama', $keyword);
    }
    public function upload($data)
    {
        $this->db->table('prospect')->insertBatch($data);
        if ($this->db->affectedRows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function total_daftar()
    {
        $total_daftar = $this->where('status >', 0)->findAll();
        return count($total_daftar);
    }
    public function total_belum_daftar_ulang()
    {
        $total_belum_daftar_ulang = $this->where('status', 2)->findAll();
        return count($total_belum_daftar_ulang);
    }
    public function total_sudah_daftar_ulang()
    {
        $total_sudah_daftar_ulang = $this->where('status', 3)->findAll();
        return count($total_sudah_daftar_ulang);
    }
    public function increment_field_no()
    {
        $no = 1;
        $cek_last_no = $this->orderBy('no', 'DESC')->first();

        if (!$cek_last_no) {
            $no;
        } else if ($cek_last_no['no'] > 0 || $cek_last_no['no'] = '') {
            $no += $cek_last_no['no'];
        }
        return $no;
    }
    public function datenow()
    {
        $currentDateTime = new DateTime();
        $intervalDate = new DateInterval('PT12H');
        $currentDateTime->add($intervalDate);

        return $currentDateTime->format('Y-m-d H:i:s');
    }
    public function getTotalDataByDate()
    {
        $startDate = $this->datenow();

        $endDate = Time::now()->addDays(1)->format('Y-m-d');


        $result['prospect'] = $this->where('created_at >=', $startDate)->where('created_at <=', $endDate)->findAll();

        $rowCount = count($result['prospect']);
        $results['created_at'] = $rowCount;

        return count($result);
    }
    public function getFirstMonth()
    {
        $startDate = Time::now();
        $currentMonth = $startDate->getMonth();
        $currentYear = $startDate->getYear();

        $bulan = $currentMonth; // Ganti dengan bulan yang diinginkan (1 hingga 12)
        $tahun = $currentYear; // Ganti dengan tahun yang diinginkan

        // Menggunakan mktime() untuk mendapatkan timestamp hari pertama bulan tersebut
        $timestamp = mktime(0, 0, 0, $bulan, 1, $tahun);

        // Menggunakan date() untuk mengambil tanggal hari pertama bulan tersebut
        $tanggalPertama = date('Y-m-d', $timestamp);

        return $tanggalPertama;
    }
    public function getLastMonth()
    {
        $startDate = Time::now();
        $currentMonth = $startDate->getMonth();
        $currentYear = $startDate->getYear();

        $bulan = $currentMonth; // Ganti dengan bulan yang diinginkan (1 hingga 12)
        $tahun = $currentYear; // Ganti dengan tahun yang diinginkan

        $tanggalAwal = date('Y-m-d', strtotime("$tahun-$bulan-01"));

        // Menambahkan jumlah hari dalam bulan tersebut
        $tanggalAkhir = date('Y-m-d', strtotime("$tanggalAwal +1 month -1 day"));

        return $tanggalAkhir;
    }
    public function getWeekend()
    {
        $tanggalSaatIni = $this->datenow();

        $selisihHari = (7 - date('w', strtotime($tanggalSaatIni))) % 7;

        if ($selisihHari == 0) {
            $tanggalMinggu = date('Y-m-d 00:00:00', strtotime("$tanggalSaatIni +7 days"));
        } else {
            $tanggalMinggu = date('Y-m-d 00:00:00', strtotime("$tanggalSaatIni +$selisihHari days"));
        }
        // dd($tanggalSaatIni, $selisihHari, $tanggalMinggu);
        return $tanggalMinggu;
    }
    public function getMonday()
    {
        $tanggalSaatIni = $this->datenow();

        $selisihHari = (13 + date('w', strtotime($tanggalSaatIni))) % 7;

        $tanggalSenin = date('Y-m-d', strtotime("$tanggalSaatIni -$selisihHari days"));
        // dd($tanggalSaatIni, $selisihHari, $tanggalSenin);

        if ($selisihHari == 0) {
            $tanggalSenin = date('Y-m-d 00:00:00', strtotime("$tanggalSaatIni"));
        } else {
            $tanggalSenin = date('Y-m-d 00:00:00', strtotime("$tanggalSaatIni -$selisihHari days"));
        }

        return $tanggalSenin;
    }
}
