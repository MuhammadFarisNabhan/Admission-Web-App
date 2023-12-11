<?php

namespace App\Controllers;

// require FCPATH . 'vendor/autoload.php';

use App\Database\Seeds\Dump;
use App\Models\MahasiswaModel;
use App\Models\ApplicantModel;
use App\Models\AdmittedModel;
use App\Models\EnrolledModel;
use CodeIgniter\Entity\Cast\DatetimeCast;
use CodeIgniter\I18n\Time;
use DateTime;
use DateInterval;


use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Home extends BaseController
{
	protected $mahasiswaModel, $applicantModel, $admittedModel, $enrolledModel, $homeModel;
	public function __construct()
	{
		$this->mahasiswaModel = new MahasiswaModel();
		$this->applicantModel = new ApplicantModel();
		$this->admittedModel = new AdmittedModel();
		$this->enrolledModel = new EnrolledModel();
	}
	// public function show_layouts_horizontal()
	public function index()
	{
		// $rangeWeeks = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];
		// $rangeMonths = ['Jan-Feb', 'Mar-Apr', 'Mei-Jun', 'Jul-Agt', 'Sep-Okt', 'Nov-Des'];
		// dd($this->getWeek(), $this->getMonth(), $this->monthly(), $this->monthWithInterval());

		$data = [
			'title_meta' 						=> view('partials/title-meta', ['title' => 'Dasbboard']),
			'page_title' 						=> view('partials/page-title', ['title' => 'Dashboard', 'pagetitle' => 'Main']),

			'pendaftar' 						=> $this->mahasiswaModel->total_daftar(),
			'belum_daftar' 						=> $this->mahasiswaModel->total_belum_daftar_ulang(),
			'daftar_ulang' 						=> $this->mahasiswaModel->total_sudah_daftar_ulang(),

			'range_week'						=> $this->getWeek(),
			'data_pendaftar_week' 				=> $this->getPendaftarWeekly(),
			'data_belum_daftar_ulang_week' 		=> $this->getBelumDaftarUlangWeekly(),
			'data_daftar_ulang_week' 			=> $this->getDaftarUlangWeekly(),

			'range_month'						=> $this->monthWithInterval(),
			'data_pendaftar_month' 				=> $this->getPendaftarMonthly(),
			'data_belum_daftar_ulang_month' 	=> $this->getBelumDaftarMonthly(),
			'data_daftar_ulang_month' 			=> $this->getDaftarUlangMonthly(),
		];
		return view('monitoring/layouts-horizontal', $data);
	}
	public function temp()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'temp']),
			'page_title' => view('partials/page-title', ['title' => 'temp', 'pagetitle' => 'Section'])
		];
		return view('layouts-horizontal', $data);
	}
	public function form_view()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Horizontal']),
			'page_title' => view('partials/page-title', ['title' => 'Horizontal', 'pagetitle' => 'Layouts']),
		];

		return view('partials/spreadsheet_upload-form', $data);
	}
	public function spreadsheet_import()
	{
		$upload_file = $_FILES['upload_file']['name'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
		if ($extension == "csv") {
			$reader = new Csv();
		} else if ($extension == "xls") {
			$reader = new Xls();
		} else {
			$reader = new Xlsx();
		}
		$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();
		$sheetcount = count($sheetdata);
		if ($sheetcount > 1) {
			$data = array();
			for ($i = 1; $i < $sheetcount; $i++) {
				$nama = $sheetdata[$i][1];
				$asal_sekolah = $sheetdata[$i][2];
				$no_telp = $sheetdata[$i][3];
				$status_pembayaran = $sheetdata[$i][4];
				$program = $sheetdata[$i][5];
				$program_studi = $sheetdata[$i][6];
				$email = $sheetdata[$i][7];
				$slug = $sheetdata[$i][8];
				// $status = $sheetdata[$i][9];
				$data[] = array(
					'nama' => $nama,
					'asal_sekolah' => $asal_sekolah,
					'no_telp' => $no_telp,
					'status_pembayaran' => $status_pembayaran,
					'program' => $program,
					'program_studi' => $program_studi,
					'email' => $email,
					'slug' => $slug,
					// 'status' => $status,
				);
			}
			$insertdata = $this->mahasiswaModel->upload($data);
			if ($insertdata) {
				session()->setFlashdata('message', 'Successfully Added');
				redirect()->to('/upload');
			} else {
				session()->setFlashdata('message', 'Data Not Added');
				redirect()->to('/upload');
			}
			redirect()->to('/upload');
		}
	}
	// Get data interval for Grafik
	public function weekly()
	{
		$startDate = $this->mahasiswaModel->datenow();
		$toMonday = (13 + date('w', strtotime($startDate))) % 7;

		$data = array();
		for ($i = 0; $i < 7; $i++) {
			$getDay = date('Y-m-d 00:00:00', strtotime("$startDate -$toMonday days +$i days"));
			$getDayInterval = date('Y-m-d 00:00:00', strtotime("$startDate -$toMonday days +$i days +1 days"));
			$data[] = array(
				'Hari'				=> $getDay,
				'Pendaftar' 		=> count($this->mahasiswaModel->where('status >', 0)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
				'Belum_Daftar_Ulang' 	=> count($this->mahasiswaModel->where('status', 2)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
				'Daftar_Ulang' 		=> count($this->mahasiswaModel->where('status', 3)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
			);
		};

		return $data;
	}
	public function monthly()
	{
		// get this year
		$year = date('Y');

		// get this month
		$month = date('m');

		// tanggal pertama dari setahun
		$firstDateOnYear = new DateTime("$year-01-01");
		$firstUnix = $firstDateOnYear->getTimestamp();

		// tanggal terakhir dari setahun
		$lastDateOnYear = new DateTime("$year-12-31");
		$lastUnix = $lastDateOnYear->getTimestamp();

		$interval = new DateInterval('P1M');

		// leap year
		// if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
		// 	// $timeleap =  "$years is a leap year, so it has 366 days.";
		// 	$timeleap = 29;
		// } else {
		// 	// $timeleap = "$years is not a leap year, so it has 365 days.";
		// 	$timeleap = 28;
		// }

		$data = array();
		for ($i = $firstUnix; $i <= $lastUnix; $i +=  (2629800 * 2)) {
			$getDay = $firstDateOnYear->format('Y-m-d 00:00:00');
			$getDayInterval = $firstDateOnYear->add($interval)->format('Y-m-31 00:00:00');

			$data[] = array(
				'Hari'					=> $getDay,
				'Interval'				=> $getDayInterval,
				'Pendaftar' 			=> count($this->mahasiswaModel->where('status >', 0)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
				'Belum_Daftar_Ulang' 	=> count($this->mahasiswaModel->where('status', 2)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
				'Daftar_Ulang' 			=> count($this->mahasiswaModel->where('status', 3)->where('created_at >=', $getDay)->where('created_at <', $getDayInterval)->findAll()),
			);
			$firstDateOnYear->add($interval);
		};

		return $data;
	}
	public function getWeek()
	{
		$startDate = $this->mahasiswaModel->datenow();
		$toMonday = (13 + date('w', strtotime($startDate))) % 7;

		for ($i = 0; $i < 7; $i++) {
			$getDay = date('w', strtotime("$startDate -$toMonday days +$i days -1 days"));
			switch ($getDay) {
				case 0:
					$getDay = 'Senin';
					break;
				case 1:
					$getDay = 'Selasa';
					break;
				case 2:
					$getDay = 'Rabu';
					break;
				case 3:
					$getDay = 'Kamis';
					break;
				case 4:
					$getDay = 'Jum\'at';
					break;
				case 5:
					$getDay = 'Sabtu';
					break;
				case 6:
					$getDay = 'Minggu';
					break;
			}
			$data[] = array(
				'day'	=> $getDay,
			);
		}

		$days = array_column($data, 'day');
		return $days;
	}
	// Get data (column) for weekly
	public function getPendaftarWeekly()
	{
		$datas = $this->weekly();
		$pendaftar = array_column($datas, 'Pendaftar');

		return $pendaftar;
	}
	public function getBelumDaftarUlangWeekly()
	{
		$datas = $this->weekly();
		$belumDaftarUlang = array_column($datas, 'Belum_Daftar_Ulang');

		return $belumDaftarUlang;
	}
	public function getDaftarUlangWeekly()
	{
		$datas = $this->weekly();
		$DaftarUlang = array_column($datas, 'Daftar_Ulang');

		return $DaftarUlang;
	}

	public function getMonth()
	{
		$year = date('Y');
		// tanggal pertama dari setahun
		$firstDateOnYear = new DateTime("$year-01-01");
		$firstUnix = $firstDateOnYear->getTimestamp();

		// tanggal terakhir dari setahun
		$lastDateOnYear = new DateTime("$year-12-31");
		$lastUnix = $lastDateOnYear->getTimestamp();

		$interval = new DateInterval('P1M');

		$data = array();
		for ($i = $firstUnix; $i <= $lastUnix; $i +=  (2629800 * 2)) {
			$getMonth = $firstDateOnYear->format('F');
			$getMonthInterval = $firstDateOnYear->add($interval)->format('F');

			$tempMonth = substr($getMonth, 0, 3);
			$tempInterval = substr($getMonthInterval, 0, 3);

			$data[] = array(
				'monthWithInterval'		=> $tempMonth . '-' . $tempInterval,
			);
			$firstDateOnYear->add($interval);
		}
		return $data;
	}
	public function monthWithInterval()
	{
		$datas = $this->getMonth();
		$month = array_column($datas, 'monthWithInterval');
		return $month;
	}
	// Get data (column) for monthly
	public function getPendaftarMonthly()
	{
		$datas = $this->monthly();
		$pendaftar = array_column($datas, 'Pendaftar');

		return $pendaftar;
	}
	public function getBelumDaftarMonthly()
	{
		$datas = $this->monthly();
		$belumDaftarUlang = array_column($datas, 'Belum_Daftar_Ulang');

		return $belumDaftarUlang;
	}
	public function getDaftarUlangMonthly()
	{
		$datas = $this->monthly();
		$DaftarUlang = array_column($datas, 'Daftar_Ulang');

		return $DaftarUlang;
	}

	public function user($id)
	{
		$getIdUser = $this->mahasiswaModel->find($id);
		$data = [
			'title_meta' 						=> view('partials/title-meta', ['title' => $getIdUser['name']]),
			'page_title' 						=> view('partials/page-title', ['title' => $getIdUser['name'], 'pagetitle' => 'User Details']),
		];
		return view('User/user', $data);
	}
}
