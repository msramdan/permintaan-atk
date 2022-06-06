<?php
date_default_timezone_set('Asia/Jayapura');

function check_already_login()
{

	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

//untuk semua ctrl cek seesion login dan session unit
function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		redirect('dashboard_user');
	}
}

//untuk bagian dashboard saja
function cek_login_aja()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function hari_ini()
{
	$hari = date("D");
	switch ($hari) {
		case 'Sun':
			$hari_ini = "Minggu";
			break;

		case 'Mon':
			$hari_ini = "Senin";
			break;

		case 'Tue':
			$hari_ini = "Selasa";
			break;

		case 'Wed':
			$hari_ini = "Rabu";
			break;

		case 'Thu':
			$hari_ini = "Kamis";
			break;

		case 'Fri':
			$hari_ini = "Jumat";
			break;

		case 'Sat':
			$hari_ini = "Sabtu";
			break;

		default:
			$hari_ini = "Tidak di ketahui";
			break;
	}

	return $hari_ini;
}

function nama_bulan($bulan)
{
	switch ($bulan) {
		case '1':
			$bulan = "Januari";
			break;

		case '2':
			$bulan = "Februari";
			break;

		case '3':
			$bulan = "Marert";
			break;

		case '4':
			$bulan = "April";
			break;

		case '5':
			$bulan = "Mei";
			break;

		case '6':
			$bulan = "Juni";
			break;

		case '7':
			$bulan = "Juli";
			break;
		case '8':
			$bulan = "Agustus";
			break;
		case '9':
			$bulan = "September";
			break;
		case '10':
			$bulan = "Oktober";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "Desember";
			break;

		default:
			$bulan = "Tidak di ketahui";
			break;
	}

	return $bulan;
}

// return nama photo
function photo_guru($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join guru on guru.nip = user.username where user.user_id='" . $user_id . "'")->row();
	if($data->photo==''){
		return 'default.png';
	}else{
		return $data->photo;
	}
}

function photo_pegawai($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join pegawai on pegawai.nip = user.username where user.user_id='" . $user_id . "'")->row();
	if($data->photo==''){
		return 'default.png';
	}else{
		return $data->photo;
	}
}

function photo_siswa($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join siswa on siswa.nisn = user.username where user.user_id='" . $user_id . "'")->row();
	if($data->photo==''){
		return 'default.png';
	}else{
		return $data->photo;
	}
	
}



// return nama guru
function nama_guru($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join guru on guru.nip = user.username where user.user_id='" . $user_id . "'")->row();

	if($data){
		return $data->nama_guru;
	} else {
		return 'Tidak di ketahui';
	}
}

function nama_pegawai($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join pegawai on pegawai.nip = user.username where user.user_id='" . $user_id . "'")->row();
	if($data){
		return $data->nama_pegawai;
	} else {
		return 'Tidak di ketahui';
	}
}

function nama_siswa($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join siswa on siswa.nisn = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->nama_siswa;
}


function no_hp_wali($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join siswa on siswa.nisn = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->no_hp_wali_siswa;
}

// return id guru
function guru_id($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join guru on guru.nip = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->guru_id;
}

// return id guru
function pegawai_id($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join pegawai on pegawai.nip = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->pegawai_id;
}

// return id guru
function siswa_id($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join siswa on siswa.nisn = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->siswa_id;
}

function cek_absen($user_id, $tgl, $result_holidaydate)
{
	$ci = &get_instance();
	$tglparsed = date('Y-m-d', strtotime($tgl));
	$is_minggu  = date('l', strtotime($tgl));
	if ($is_minggu == 'Sunday') {
		echo "<td style='background-color: red'></td>";
	} else {
		$cek_hari_libur = hari_libur($tglparsed);
		if ($cek_hari_libur == true) {
			echo "<td class='plsholder' data-detail='".$cek_hari_libur->keterangan."' style='background-color: yellow'></td>";
		} else {

			// check if holiday_date has $tglparsed inside result
			$holidayname = '';
			foreach ($result_holidaydate as $key => $value) {
				if($value->holiday_date == $tglparsed && $value->is_national_holiday == true){
					$cek_hari_libur = true;
					$holidayname = $value->holiday_name;
				}
			}

			if ($cek_hari_libur == true) {
				echo "<td class='plsholder' data-detail='".$holidayname."' style='background-color: yellow'></td>";
			} else {
				$cek_status = absensi_user($user_id, $tglparsed);
				if ($cek_status == 'Tepat') {
					echo "<td>✓</td>";
				}
				if ($cek_status == 'Alpha') {
					echo "<td>A</td>";
				}
				if ($cek_status == 'Kosong') {
					echo "<td>-</td>";
				}
				if ($cek_status == 'Sakit') {
					echo "<td>S</td>";
				}
				if ($cek_status == 'Izin') {
					echo "<td>I</td>";
				}
				if ($cek_status == 'Terlambat') {
					echo "<td style='background-color: grey'>✓</td>";
				}
			}

		}
	}
}

function hari_libur($tgl)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM hari_libur where date(tanggal)='" . $tgl . "'")->row();

	if ($data) {
		return $data;
	} else {	
		return false;
	}
}

function absensi_user($user_id, $tgl)
{
	$date_now = date('Y-m-d');
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and date(tanggal)='" . $tgl . "'")->row();
	if ($data) {
		$keterangan = $data->keterangan;
		if ($keterangan == 'Masuk') {
			if ($data->status_masuk == 'Tepat Waktu') {
				return "Tepat";
			} else {
				return "Terlambat";
			}
		} else {
			return $data->keterangan;
		}
	} else {
		if ($date_now < $tgl) {
			return "Kosong";
		} else {
			return "Alpha";
		}
	}
}

function cek_alpha($user_id, $hari, $bulan, $tahun, $result_holidaydate)
{
	$ci = &get_instance();
	$date_now = date('Y/m/d');
	$tgl_awal = $tahun . '/' . $bulan . '/1';
	$tgl_akhir = $tahun . '/' . $bulan . '/' . $hari;

	//cek jumlah sakit
	$data_sakit = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Sakit' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "'");
	if ($data_sakit) {
		$data_sakit =  $data_sakit->num_rows();
	} else {
		$data_sakit =  0;
	}

	//cek jumlah izin
	$data_ijin = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Izin' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "'");
	if ($data_ijin) {
		$data_ijin =  $data_ijin->num_rows();
	} else {
		$data_ijin = 0;
	}

	// cek sisa hari sampe akhir bulan
	
	$dt1 = new DateTime($tgl_awal);
	$d = DateTime::createFromFormat('Y/m/d', date($tgl_awal));
	$today = new DateTime();
	$sisahari = 0;
	if($d->format('n') === $today->format('n') && $d->format('Y') === $today->format('Y')) {
		// echo "Months match and year match";
		$dt1 =  new Datetime($date_now);
		$dt2 =  new DateTime($tgl_akhir);
		$sisahari = $dt1->diff($dt2)->days < 0 ? 0 : $dt1->diff($dt2)->days;
	}


	// count how many sunday between two date
	$minggu_antara = 0;
	$start = strtotime($date_now);
	$end = strtotime($tgl_akhir);
	for ($i = $start; $i <= $end; $i += (60 * 60 * 24)) {
		$day = date('l', $i);
		if ($day == 'Sunday') {
			$minggu_antara++;
		}
	}

	//cek jumalah hari minggu
	$minggu = 0;
	$start = strtotime($tgl_awal);
	$end = strtotime($tgl_akhir);

	if($d->format('n') === $today->format('n') && $d->format('Y') === $today->format('Y')) {
		// echo "Months match and year match";
		for ($i = $start; $i <= $end; $i += (60 * 60 * 24)) {
			$day = date('l', $i);
			$d = date('Y/m/d', $i);
			if ($day == 'Sunday' & $d <= $date_now) {
				$minggu++;
			}
		}
	} else {
		for ($i = $start; $i <= $end; $i += (60 * 60 * 24)) {
			$day = date('l', $i);
			$d = date('Y/m/d', $i);
			if ($day == 'Sunday') {
				$minggu++;
			}
		}
	}
	

	//cek jml hari libur
	$libur = $ci->db->query("SELECT * FROM hari_libur where tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "' ");
	if ($libur) {
		$libur =  $libur->num_rows();
	} else {
		$libur = 0;
	}

	//cek jml hari cuti
	// loop from $date_awal to $date_akhir
	$start = strtotime($tgl_awal);
	$end = strtotime($tgl_akhir);
	for ($i = $start; $i <= $end; $i += (60 * 60 * 24)) {
		
		$tglnow = date('Y-m-d', $i);

		foreach ($result_holidaydate as $key => $value) {
			if($value->holiday_date == $tglnow && $value->is_national_holiday == true){
				$libur++;
			}
		}
	}


	//cek dlu jumlah masuk
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Masuk' and tanggal like '".date('Y',$start)."-".date('m',$start)."-%'");
	if ($data) {
		$masuk =  $data->num_rows();
	} else {
		$masuk = 0;
	}
	
	$abcdfu = $hari - $sisahari - $minggu - $libur - $data_sakit - $data_ijin - $masuk;

	return $abcdfu < 0 ? 0 : $abcdfu;
}
function cek_sakit($user_id, $hari, $bulan, $tahun)
{
	$ci = &get_instance();
	$tgl_awal = $tahun . '/' . $bulan . '/1';
	$tgl_akhir = $tahun . '/' . $bulan . '/' . $hari;
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Sakit' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "'");
	if ($data) {
		return $data->num_rows();
	} else {
		return 0;
	}
}
function cek_izin($user_id, $hari, $bulan, $tahun)
{
	$ci = &get_instance();
	$tgl_awal = $tahun . '/' . $bulan . '/1';
	$tgl_akhir = $tahun . '/' . $bulan . '/' . $hari;
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Izin' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "'");
	if ($data) {
		return $data->num_rows();
	} else {
		return 0;
	}
}
function cek_hadir_tepat($user_id, $hari, $bulan, $tahun)
{
	$ci = &get_instance();
	$tgl_awal = $tahun . '/' . $bulan . '/1';
	$tgl_akhir = $tahun . '/' . $bulan . '/' . $hari;
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Masuk' and status_masuk='Tepat Waktu' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "'");
	if ($data) {
		return $data->num_rows();
	} else {
		return 0;
	}
}
function cek_terlambat($user_id, $hari, $bulan, $tahun)
{
	$ci = &get_instance();
	$tgl_awal = $tahun . '/' . $bulan . '/1';
	$tgl_akhir = $tahun . '/' . $bulan . '/' . $hari;
	$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Masuk' and status_masuk='Terlambat' and date(tanggal) >= '" . $tgl_awal . "' and date(tanggal) <= '" . $tgl_akhir . "' ");
	if ($data) {
		return $data->num_rows();
	} else {
		return 0;
	}
}


function cek_terlambat_panggilan($user_id, $tgl_awal, $tgl_akhir)
{
	$ci = &get_instance();
	if ($tgl_awal == null || $tgl_awal == '') {
		$data = $ci->db->query("SELECT * FROM absen where user_id='44' and keterangan='Masuk' and status_masuk='Terlambat' and tanggal <= '" . $tgl_akhir . "' ");
		if ($data) {
			return $data->num_rows();
		} else {
			return 0;
		}
	} else {
		$data = $ci->db->query("SELECT * FROM absen where user_id='" . $user_id . "' and keterangan='Masuk' and status_masuk='Terlambat' and tanggal >= '" . $tgl_awal . "' and tanggal <= '" . $tgl_akhir . "' ");
		if ($data) {
			return $data->num_rows();
		} else {
			return 0;
		}
	}
}

function hitung_alpha($tanggal_awal, $tanggal_sekarang, $user_id)
{
	$ci = &get_instance();
	$tgl_awal = $tanggal_awal;
	$tgl_akhir = $tanggal_sekarang;

	//cek jumalah hari minggu
	$date1 = date('d-m-Y', strtotime($tgl_awal));
	$date2 = date('d-m-Y', strtotime($tgl_akhir));
	// memecah bagian-bagian dari tanggal $date1
	$pecahTgl1 = explode("-", $date1);
	// membaca bagian-bagian dari $date1
	$tgl1 = $pecahTgl1[0];
	$bln1 = $pecahTgl1[1];
	$thn1 = $pecahTgl1[2];

	// counter looping
	$i = 0;

	// counter untuk jumlah hari minggu
	$minggu = 0;

	do {
		// mengenerate tanggal berikutnya
		$tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1 + $i, $thn1));

		// cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
		if (date("w", mktime(0, 0, 0, $bln1, $tgl1 + $i, $thn1)) == 0) {
			$minggu++;
		}

		// increment untuk counter looping
		$i++;
	} while ($tanggal != $date2);

	//cek jml hari libur
	$libur = $ci->db->query("SELECT * FROM hari_libur where tanggal >= '".$tgl_awal."' and tanggal <= '".$tgl_akhir."' ");
	if ($libur) {
		$libur =  $libur->num_rows();
	} else {
		$libur = 0;
	}
	//cek dlu jumlah masuk
	$data = $ci->db->query("SELECT * FROM absen where user_id='".$user_id."' and keterangan='Masuk'");
	if ($data) {
		$masuk =  $data->num_rows();
	} else {
		$masuk = 0;
	}
	return $i - $minggu - $libur - $masuk;
}

function hitung_terlambat($tanggal_awal, $tanggal_sekarang, $user_id)
{
	$ci = &get_instance();
	$tgl_awal = $tanggal_awal;
	$tgl_akhir = $tanggal_sekarang;
	$data = $ci->db->query("SELECT * FROM absen where user_id='".$user_id."' and keterangan='Masuk' and status_masuk='Terlambat' and date(tanggal) >= '".$tgl_awal."' and date(tanggal) <= '".$tgl_akhir."' ");
	if ($data) {
		return $data->num_rows();
	} else {
		return 0;
	}
}

function cek_tahun_pelajaran_berjalan()
{
	$datenow = date('Y-m-d');
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM tahun_ajaran where tgl_awal <= '".$datenow."' and tgl_akhir >= '".$datenow."' ");
	if ($data) {
		return $data->row();
	} else {
		return 0;
	}
}
