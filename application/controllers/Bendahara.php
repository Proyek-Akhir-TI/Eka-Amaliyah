<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('karyawan_model');
		$this->load->model('siswa_model');
		$this->load->model('user_model');
		$this->load->model('gaji_model');
		$this->load->model('pembayaran_model');
		$this->load->model('kasmasuk_model');
		$this->load->model('kaskeluar_model');
		$this->load->model('rekap_model');

	}

	public function index()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Halaman Admin.</strong>
                            </div>');
		redirect('Auth/');
		}

		$data['jml_siswa'] = $this->siswa_model->jumlah_siswa();
		$data['jml_karyawan'] = $this->karyawan_model->jumlah_karyawan();
		$data['jml_kasmasuk'] = $this->kasmasuk_model->jumlah_kasmasuk();
		$data['jml_kaskeluar'] = $this->kaskeluar_model->jumlah_kaskeluar();
		$this->load->view('dashboardadmin', $data);
	}

	public function datakaryawan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['karyawan'] = $this->karyawan_model->read_karyawan();
		$this->load->view('bendahara/list_data_karyawan', $data);
	}

	public function jenispembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['j_pembayaran'] = $this->pembayaran_model->read_j_pembayaran();
		$this->load->view('bendahara/list_data_jenis_pembayaran', $data);
	}
  
  	public function datawa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
      
      	$this->db->from('wa');
      	$e = $this->db->get()->result();
      
      	$this->db->from('wa');
      	$ev = $this->db->get()->row();
      	
      
		$data['wa'] = $e;
      	$data['wa2'] = $ev;
		$this->load->view('bendahara/list_data_wa', $data);
	}
	
	public function datakelas()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['kelas'] = $this->karyawan_model->read_kelas();
		$data['count_jurusan'] = $this->karyawan_model->count_cek_jurusan();
		$this->load->view('bendahara/list_data_kelas', $data);
	}
	
	public function datajurusan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['kelas'] = $this->karyawan_model->read_jurusan();
		$this->load->view('bendahara/list_data_jurusan', $data);
	}
  
  	public function history_pilih_kelas_cetak()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$data['idsiswa'] = $_GET['idsiswa'];
		$data['semester'] = $_GET['semester'];
		$this->load->view('bendahara/history_pilih_kelas_cetak', $data);
	}
  
  	public function cetak_hasil_history()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$idsiswa = $_GET['idsiswa'];
		$smstr = $_GET['semester'];
		//$kls = $_GET['kelas'];

		$data['detil'] = $this->pembayaran_model->get_by_idsiswa($idsiswa, $smstr);
		$data['detil_nogroup'] = $this->pembayaran_model->get_by_idsiswa_nogroup($idsiswa, $smstr);
		$data['status'] = $this->pembayaran_model->get_by_idsiswa_status($idsiswa, $smstr);
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Kegiatan');
		$aa = $this->db->get()->row();
		$nominalkeg = $aa->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'PSG');
		$ab = $this->db->get()->row();
		$nominalpsg = $ab->nominal;

		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'UKK');
		$ac = $this->db->get()->row();
		$nominalukk = $ac->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Ujian UAS');
		$af = $this->db->get()->row();
		$nominaluas = $af->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Ujian UTS');
		$ad = $this->db->get()->row();
		$nominaluts = $ad->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Akhir Kelas 12 Non Akuntansi');
		$ah = $this->db->get()->row();
		$nominalakhir = $ah->nominal;
      
      	$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Akhir Kelas 12 Akuntansi');
		$ahkun = $this->db->get()->row();
		$nominalakhirak = $ahkun->nominal;

		
		$this->db->select_sum('dana_kegiatan');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$keg = $this->db->get()->row();
		$jumkeg = $keg->dana_kegiatan;
		
		if($jumkeg >= $nominalkeg){
			$data['dankeg'] = 'Lunas';
		}
		if($jumkeg < $nominalkeg && $smstr == 'Ganjil'){
			$data['dankeg'] = 'Belum Lunas';
		}
		if($jumkeg < $nominalkeg && $smstr == 'Genap'){
			$data['dankeg'] = 'Tanggungan';
		}
		
		$this->db->select_sum('psg');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$psg = $this->db->get()->row();
		$jumpsg = $psg->psg;
		
		if($jumpsg >= $nominalpsg){
			$data['psg'] = 'Lunas';
		}
		if($jumpsg < $nominalpsg && $smstr == 'Ganjil'){
			$data['psg'] = 'Belum Lunas';
		}
		if($jumpsg < $nominalpsg && $smstr == 'Genap'){
			$data['psg'] = 'Tanggungan';
		}


		$this->db->select_sum('ukk');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$ukk = $this->db->get()->row();
		$jumukk = $ukk->ukk;
		
		if($jumukk >= $nominalukk){
			$data['ukk'] = 'Lunas';
		}
		if($jumukk < $nominalukk && $smstr == 'Ganjil'){
			$data['ukk'] = 'Belum Lunas';
		}
		if($jumukk < $nominalukk && $smstr == 'Genap'){
			$data['ukk'] = 'Tanggungan';
		}
		
		$this->db->select_sum('ujian_uts');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$uts = $this->db->get()->row();
		$jumuts = $uts->ujian_uts;
		
		if($jumuts >= $nominaluts){
			$data['uts'] = 'Lunas';
		}
		if($jumuts < $nominaluts && $smstr == 'Ganjil'){
			$data['uts'] = 'Belum Lunas';
		}
		if($jumuts < $nominaluts && $smstr == 'Genap'){
			$data['uts'] = 'Tanggungan';
		}
		
		$this->db->select_sum('ujian_uas');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$uas = $this->db->get()->row();
		$jumuas = $uas->ujian_uas;
		
		if($jumuas >= $nominaluas){
			$data['uas'] = 'Lunas';
		}
		if($jumuas < $nominaluas && $smstr == 'Ganjil'){
			$data['uas'] = 'Belum Lunas';
		}
		if($jumuas < $nominaluas && $smstr == 'Genap'){
			$data['uas'] = 'Tanggungan';
		}

		
		$this->db->select_sum('dana_akhir12');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$akhir = $this->db->get()->row();
		$jumakhir = $akhir->dana_akhir12;
      
      
      	$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$avv = $this->db->get()->row();
		$kel = $avv->jurusan;
      	
      
      	$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$avv1 = $this->db->get()->row();
		$sta = $avv1->status;
      	
      
      	if($kel == 'Akuntansi' && $sta != 'Yatim'){
		$dakhr = $nominalakhirak;
		}
      
      	if($kel == 'Akuntansi' && $sta == 'Yatim'){
		$da = $nominalakhirak;
        $dakhr = $da * 0.5;  
        }
      
      	if($kel != 'Akuntansi' && $sta != 'Yatim'){
		$dakhr = $nominalakhir;
        }
      
      	if($kel != 'Akuntansi' && $sta == 'Yatim'){
		$dbc = $nominalakhir;
        $dakhr = $dbc * 0.5;  
        }
		
		if($jumakhir >= $dakhr){
			$data['akhir'] = 'Lunas';
		}
		if($jumakhir < $dakhr && $smstr == 'Ganjil'){
			$data['akhir'] = 'Belum Lunas';
		}
		if($jumakhir < $dakhr && $smstr == 'Genap'){
			$data['akhir'] = 'Tanggungan';
		}
		
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$a = $this->db->count_all_results();
		$data['hasil_nisn'] = $a;


		$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		$ab = $this->db->get()->row();
		$data['siswa_select'] = $ab->nama_siswa;
		$data['nisn_select'] = $ab->nisn;
		$data['kls'] = $ab->kelas;
		


		$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		$tngkt = $this->db->get()->row();


		//$data['tgl'] = $tgl;
		$this->db->from('tb_datasiswa');
		$this->db->group_by('nama_siswa');
		$data['nama_siswa'] = $this->db->get()->result();
		$data['tingkat'] = $tngkt->tingkat;
		
		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-history-pembayaran.pdf";
		$this->pdf->load_view('bendahara/cetak_list_hasil_history', $data);
		
	}

	public function datakasmasuk()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$this->db->select_sum('jumlah_kasmasuk');
		$this->db->from('tb_kasmasuk');
		$a = $this->db->get()->row();
		$b = $a->jumlah_kasmasuk;

		$this->db->from('tb_kasmasuk');
		$this->db->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran = tb_kasmasuk.id_pembayaran');
		$this->db->group_by('tb_pembayaran.nama_siswa');
		$aa = $this->db->get()->result();
		//$ba = $aa->nama_siswa;


		$data['kasmasuk'] = $this->kasmasuk_model->read_kasmasuk_all();
		$data['nama_siswa'] = $aa;
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kasmasuk', $data);
	}

	public function datakaskeluar()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$this->db->select_sum('total');
		$this->db->from('tb_kaskeluar');
		$a = $this->db->get()->row();
		$b = $a->total;

		$data['kaskeluar'] = $this->kaskeluar_model->read_kaskeluar();
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kaskeluar', $data);
	}

	public function detil_kasmasuk($id, $kd)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['pembayaran'] = $this->kasmasuk_model->read_kasmasuk_by_id($id);
		$data['tgl'] = $id;
		$this->load->view('bendahara/detil_kasmasuk', $data);
	}

	public function detil_kaskeluar($id, $kd)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['pengeluaran'] = $this->kaskeluar_model->read_kaskeluar_by_id($id);
		$data['tgl'] = $id;
		$this->load->view('bendahara/detil_kaskeluar', $data);
	}

	public function datasiswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['siswa'] = $this->siswa_model->read_siswa();

		$this->db->from('tb_kelas');
		$this->db->group_by('kelas');
		$a = $this->db->get()->result();

		$this->db->from('tb_jurusan');
		$this->db->group_by('jurusan');
		$b = $this->db->get()->result();


		$data['kelas'] = $a;
		$data['jurusan'] = $b;
		$this->load->view('bendahara/list_data_siswa', $data);
	}

	public function sort_datasiswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		

		$this->db->from('tb_kelas');
		//$this->db->where('id_kelas', $_GET['kelas']);
		$this->db->group_by('kelas');
		$ab = $this->db->get()->result();

		$this->db->from('tb_jurusan');
		//$this->db->where('jurusan', $_GET['jurusan']);
		$this->db->group_by('jurusan');
		$bb = $this->db->get()->result();

		

		if($_GET['jurusan'] == null && $_GET['kelas'] != null){
		$this->db->from('tb_datasiswa');
		//$this->db->where('jurusan', str_replace('+', ' ', $_GET['jurusan']));
		$this->db->where('kelas', str_replace('+', ' ', $_GET['kelas']));
		$bbc = $this->db->get()->result();	
		}                           

		if($_GET['jurusan'] != null && $_GET['kelas'] == null){
		$this->db->from('tb_datasiswa');
		$this->db->where('jurusan', str_replace('+', ' ', $_GET['jurusan']));
		//$this->db->where('kelas', str_replace('+', ' ', $_GET['kelas']));
		$bbc = $this->db->get()->result();	
		}

		if($_GET['jurusan'] != null && $_GET['kelas'] != null){
		$this->db->from('tb_datasiswa');
		$this->db->where('jurusan', str_replace('+', ' ', $_GET['jurusan']));
		$this->db->where('kelas', str_replace('+', ' ', $_GET['kelas']));
		$bbc = $this->db->get()->result();	
		}

		if($_GET['jurusan'] == null && $_GET['kelas'] == null){
		$this->db->from('tb_datasiswa');
		//$this->db->where('jurusan', str_replace('+', ' ', $_GET['jurusan']));
		//$this->db->where('kelas', str_replace('+', ' ', $_GET['kelas']));
		$bbc = $this->db->get()->result();	
		}



		$data['siswa'] = $bbc;
		$data['kelas'] = $ab;
		$data['jurusan'] = $bb;
		$this->load->view('bendahara/list_data_siswa', $data);
	}

	public function datapembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran', $data);
	}
	
	public function cetak_nota_pembayaran($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		
		$this->db->from('tb_pembayaran');
		$this->db->where('id_pembayaran', $id);

		$data['pembayaran_all'] = $this->db->get()->row();
		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-pembayaran.pdf";
		$this->pdf->load_view('bendahara/cetak_nota_pembayaran', $data);
	}
	
	public function filterpembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
			
		$nama = $_GET['nama'];
		$tgl = $_GET['tanggal'];
		$tglakhir = $_GET['tanggal_akhir'];
		$th_ajar = $_GET['th_ajaran'];
		
		//thn ajaran
		if($nama == null && $tgl == null && $tglakhir == null && $th_ajar != null){
		
			$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
			$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_th_ajar($th_ajar);
			$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
			$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
			$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}

	
		if($nama == null && $tgl != null && $tglakhir == null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_tgl_awal($nama, $tgl, $tglakhir, $th_ajar);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}

		if($nama == null && $tgl == null && $tglakhir != null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_tgl_akhir($nama, $tgl, $tglakhir);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}
		
		
		
		if($nama != null && $tgl == null && $tglakhir == null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_nama($nama, $tgl, $th_ajar);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}
		
		
		if($nama != null && $tgl != null && $tglakhir != null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_all($nama, $tgl, $tglakhir, $th_ajar);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}

		if($nama != null && $tgl != null && $tglakhir == null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_nama_awal($nama, $tgl, $tglakhir, $th_ajar);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}

		if($nama != null && $tgl == null && $tglakhir != null && $th_ajar != null){
		
		$data['pembayaran'] = $this->pembayaran_model->read_pembayaran();
		$data['pembayaran_by_nama'] = $this->pembayaran_model->read_pembayaran_by_nama_akhir($nama, $tgl, $tglakhir, $th_ajar);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->load->view('bendahara/list_data_pembayaran_filter', $data);
		}
		
	}
	
	public function filterkasmasuk()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
			
		$id = $_GET['id'];
		$tgl = $_GET['tanggal'];

		if($id != null){
		$this->db->where('id_pembayaran', $id);
		$this->db->from('tb_pembayaran');
		$aq = $this->db->get()->row();
		$nama = $aq->nama_siswa;
		}
		
		if($id == null && $tgl != null){

		$this->db->select_sum('jumlah_kasmasuk');
		$this->db->where('tanggal_kasmasuk', $tgl);
		$this->db->from('tb_kasmasuk');
		$a = $this->db->get()->row();
		$b = $a->jumlah_kasmasuk;
		
		$data['kasmasuk'] = $this->kasmasuk_model->read_kasmasuk_by_tgl($id, $tgl);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa();
		$data['nama_siswa_filter'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa_filter($id);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kasmasuk_filter', $data);
		}
		
		if($id == null && $tgl == null){
		
		redirect('bendahara/datakasmasuk');
		}
		
		if($id != null && $tgl == null){

		$this->db->select_sum('jumlah_kasmasuk');
		$this->db->where('id_pembayaran', $id);
		$this->db->from('tb_kasmasuk');
		$a = $this->db->get()->row();
		$b = $a->jumlah_kasmasuk;
		
		$data['kasmasuk'] = $this->kasmasuk_model->read_kasmasuk_by_nama($nama, $tgl);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa();
		$data['nama_siswa_filter'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa_filter($id);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kasmasuk_filter', $data);
		}
		
		
		if($id != null && $tgl != null){

		$this->db->select_sum('jumlah_kasmasuk');
		$this->db->from('tb_kasmasuk');
		$this->db->where('tanggal_kasmasuk', $tgl);
		$this->db->where('id_pembayaran', $id);
		
		$a = $this->db->get()->row();
		$b = $a->jumlah_kasmasuk;
		
		$data['kasmasuk'] = $this->kasmasuk_model->read_kasmasuk_by_all($nama, $tgl);
		$data['pembayaran_all'] = $this->pembayaran_model->read_data_pembayaran();
		$data['nama_siswa'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa();
		$data['nama_siswa_filter'] = $this->kasmasuk_model->read_kasmasuk_nama_siswa_filter($id);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kasmasuk_filter', $data);
		}
		
	}

	public function filterkaskeluar()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
			
		$tglakhir = $_GET['tanggal_akhir'];
		$tgl = $_GET['tanggal'];
		
		if($tgl != null && $tglakhir == null){

		$this->db->select_sum('total');
		$this->db->where('tanggal_kaskeluar', $tgl);
		$this->db->from('tb_kaskeluar');
		$a = $this->db->get()->row();
		$b = $a->total;
		
		$data['kaskeluar'] = $this->kaskeluar_model->read_kaskeluar_by_tgl_awal($tgl, $tglakhir);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kaskeluar_filter', $data);
		}
		
		if($tgl == null && $tglakhir == null){
		
		redirect('bendahara/datakaskeluar');
		}
		
		if($tgl == null && $tglakhir != null){

		$this->db->select_sum('total');
		$this->db->where('tanggal_kaskeluar', $tglakhir);
		$this->db->from('tb_kaskeluar');
		$a = $this->db->get()->row();
		$b = $a->total;
		
		$data['kaskeluar'] = $this->kaskeluar_model->read_kaskeluar_by_tgl_akhir($tgl, $tglakhir);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kaskeluar_filter', $data);
		}
		
		
		if($tgl != null && $tglakhir != null){

		$this->db->select_sum('total');
		$this->db->where('tanggal_kaskeluar >=', $tgl);
		$this->db->where('tanggal_kaskeluar <=', $tglakhir);
		$this->db->from('tb_kaskeluar');
		$a = $this->db->get()->row();
		$b = $a->total;
		
		$data['kaskeluar'] = $this->kaskeluar_model->read_kaskeluar_by_tgl($tgl, $tglakhir);
		$data['total'] = $b;
		$this->load->view('bendahara/list_data_kaskeluar_filter', $data);
		}
		
	}

	public function datapembayaran_history()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$data['nama_siswa'] = $this->siswa_model->read_siswa();
		$data['kelas'] = $this->siswa_model->read_siswa();
		$this->load->view('bendahara/list_data_pembayaran_history', $data);
	}

	public function datauser()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$data['user'] = $this->user_model->read_user();
		$this->load->view('bendahara/list_data_user', $data);
	}

	public function datagaji()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$data['gaji'] = $this->gaji_model->read_gaji();
		$this->load->view('bendahara/list_data_gaji', $data);
	}

	public function data_gaji_filter()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$thn = $_GET['tahun'];
		$bln = $_GET['bulan'];

		if($thn != null && $bln != null){
		$data['gaji'] = $this->gaji_model->read_gaji_filter_all($thn, $bln);
		}
		if($thn != null && $bln == null){
		$data['gaji'] = $this->gaji_model->read_gaji_tahun($thn);	
		}
		if($thn == null && $bln != null){
		$data['gaji'] = $this->gaji_model->read_gaji_bulan($bln);	
		}
		if($thn == null && $bln == null){
		$data['gaji'] = $this->gaji_model->read_gaji();	
		}
		$this->load->view('bendahara/list_data_gaji_filter', $data);
	}


	public function form_add_karyawan()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
	
		$data['user'] = $this->user_model->read_user_by();
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['count_cek_kepsek'] = $this->user_model->count_cek_jabatan_kepsek();
		$data['count_cek_bendahara'] = $this->user_model->count_cek_jabatan_bendahara(); 
		$this->load->view('bendahara/form_add_karyawan', $data);
		
	}

	public function form_add_jenis_pembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		

		$this->load->view('bendahara/form_add_jenis_pembayaran');
		
	}
	
	public function form_add_kelas()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
	
		$data['user'] = $this->user_model->read_user_by();
		$data['jurusan'] = $this->karyawan_model->read_jurusan();
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['count_cek_kepsek'] = $this->user_model->count_cek_jabatan_kepsek();
		$data['count_cek_bendahara'] = $this->user_model->count_cek_jabatan_bendahara(); 
		$this->load->view('bendahara/form_add_kelas', $data);
		
	}
	
	public function form_add_jurusan()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
	
		$data['user'] = $this->user_model->read_user_by();
		$data['jurusan'] = $this->karyawan_model->read_jurusan();
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['count_cek_kepsek'] = $this->user_model->count_cek_jabatan_kepsek();
		$data['count_cek_bendahara'] = $this->user_model->count_cek_jabatan_bendahara(); 
		$this->load->view('bendahara/form_add_jurusan', $data);
		
	}

	public function form_add_siswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		
		$data['kelas'] = $this->siswa_model->read_kelas();
		$data['jurusan'] = $this->siswa_model->read_jurusan();
		$this->load->view('bendahara/form_add_siswa', $data);
		
	}

	public function form_add_kaskeluar()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		
		$this->db->select_max('id_kaskeluar');
		$this->db->from('tb_kaskeluar');
		$q = $this->db->get();
		$a = $q->row();

		
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->siswa_model->tampil_data();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['jurusan'] =  $this->pembayaran_model->tampil_data_jurusan(); 
        $data['id_kaskeluar'] = $a->id_kaskeluar + 1;
        $this->load->view('bendahara/form_add_kaskeluar', $data);
		
	}

	public function form_edit_karyawan($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['sql'] = $this->karyawan_model->get_by_id($id);
		$this->load->view('bendahara/form_edit_karyawan', $data);
		
	}
	
	public function form_ubah_kelas($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['jurusan'] = $this->karyawan_model->get_kelas_by_id($id);
		$data['jurusan_all'] = $this->karyawan_model->read_jurusan();
		$this->load->view('bendahara/form_ubah_kelas', $data);
		
	}
	
	public function form_ubah_jurusan($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['jurusan'] = $this->karyawan_model->get_jurusan_by_id($id);
		$data['jurusan_all'] = $this->karyawan_model->read_jurusan();
		$this->load->view('bendahara/form_ubah_jurusan', $data);
		
	}
  
  	public function form_ubah_wa($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
      	$this->db->from('wa');
      	$this->db->where('id_wa', $id);
      	$s = $this->db->get()->row();
      
		$data['wa'] = $s;
		$this->load->view('bendahara/form_ubah_wa', $data);
		
	}

	public function datarekapitulasi()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['rekap'] = $this->rekap_model->read_rekap();
		$data['total'] = $tot;
		$this->load->view('bendahara/list_data_rekapitulasi', $data);
	}

	public function cetak_datarekapitulasi()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['rekap'] = $this->rekap_model->read_rekap();
		$data['total'] = $tot;

		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-rekapitulasi.pdf";
		$this->pdf->load_view('bendahara/cetak_data_rekapitulasi', $data);
	}

	public function filter_rekapitulasi()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
			
		//$nama = $_GET['nama'];
		$tgl = $_GET['tanggal'];
		$tglakhir = $_GET['tanggal_akhir'];
		
		if($tgl != null && $tglakhir != null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan >=',  $tgl);
		$this->db->where('keterangan <=',  $tglakhir);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		
		$this->load->view('bendahara/list_data_rekapitulasi_filter', $data);
		}

		if($tgl != null && $tglakhir == null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl_awal($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan >=' , $tgl);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		$this->load->view('bendahara/list_data_rekapitulasi_filter', $data);
		}

		if($tgl == null && $tglakhir != null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl_akhir($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan <=' , $tglakhir);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		$this->load->view('bendahara/list_data_rekapitulasi_filter', $data);
		}

		if($tgl == null && $tglakhir == null){
		
		redirect('bendahara/datarekapitulasi');
		}
		
		
		
	}

	public function cetak_datarekapitulasi_filter()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
			
		//$nama = $_GET['nama'];
		$tgl = $_GET['tanggal'];
		$tglakhir = $_GET['tanggal_akhir'];
		
		if($tgl != null && $tglakhir != null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();
		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan >=',  $tgl);
		$this->db->where('keterangan <=',  $tglakhir);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-rekapitulasi.pdf";
		$this->pdf->load_view('bendahara/cetak_data_rekapitulasi', $data);
		}

		if($tgl != null && $tglakhir == null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl_awal($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan >=' , $tgl);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-rekapitulasi.pdf";
		$this->pdf->load_view('bendahara/cetak_data_rekapitulasi', $data);
		}

		if($tgl == null && $tglakhir != null){
		
		//$data['rekap'] = $this->rekap_model->read_pembayaran();
		$data['rekap'] = $this->rekap_model->read_rekapitulasi_by_tgl_akhir($tgl, $tglakhir);
		//$data['rekap'] = $this->rekap_model->read_rekapitulasi();
		//$data['nama_siswa'] = $this->pembayaran_model->read_pembayaran_all();

		$this->db->select_sum('masuk');
		$this->db->select_sum('keluar');
		$this->db->where('keterangan <=' , $tglakhir);
		$this->db->from('tb_rekapitulasi');
		$a = $this->db->get()->row();
		$b = $a->masuk;
		$c = $a->keluar;

		$tot = $b - $c;

		$data['total'] = $tot;

		$this->load->library('pdf');
		$this->pdf->setPaper('LEGAL', 'potrait');
		$this->pdf->filename = "data-rekapitulasi.pdf";
		$this->pdf->load_view('bendahara/cetak_data_rekapitulasi', $data);
		}

		if($tgl == null && $tglakhir == null){
		
		redirect('bendahara/datarekapitulasi');
		}
		
		
		
	}

	public function form_ubah_jenis_pembayaran($id)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['jp_all'] = $this->pembayaran_model->get_jenis_pembayaran($id);
		$this->load->view('bendahara/form_ubah_jenis_pembayaran', $data);
		
	}

	public function detil_pembayaran($tgl)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['detil'] = $this->pembayaran_model->get_by_tgl($tgl);
		$data['tgl'] = $tgl;
		$this->load->view('bendahara/list_detil_pembayaran', $data);
		
	}

	public function detil_pembayaran_history($idsiswa, $smstr)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['detil'] = $this->pembayaran_model->get_by_idsiswa_all($idsiswa);
		$data['idsiswa'] = $idsiswa;
		$data['semester'] = $smstr;
		$this->load->view('bendahara/list_detil_pembayaran_history', $data);
		
	}


	public function hasil_history()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$idsiswa = $_GET['idsiswa'];
		$smstr = $_GET['semester'];

		$data['detil'] = $this->pembayaran_model->get_by_idsiswa($idsiswa, $smstr);
		$data['detil_nogroup'] = $this->pembayaran_model->get_by_idsiswa_nogroup($idsiswa, $smstr);
		$data['status'] = $this->pembayaran_model->get_by_idsiswa_status($idsiswa, $smstr);
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Kegiatan');
		$aa = $this->db->get()->row();
		$nominalkeg = $aa->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'PSG');
		$ab = $this->db->get()->row();
		$nominalpsg = $ab->nominal;

		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'UKK');
		$ac = $this->db->get()->row();
		$nominalukk = $ac->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Ujian UAS');
		$af = $this->db->get()->row();
		$nominaluas = $af->nominal;
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Ujian UTS');
		$ad = $this->db->get()->row();
		$nominaluts = $ad->nominal;
      	
      	
		
		$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Akhir Kelas 12 Non Akuntansi');
		$ah = $this->db->get()->row();
		$nominalakhir = $ah->nominal;
      
      	$this->db->from('jenis_pembayaran');
		$this->db->where('jenis_pembayaran', 'Dana Akhir Kelas 12 Akuntansi');
		$ahku = $this->db->get()->row();
		$nominalakhirak = $ahku->nominal;

		
		$this->db->select_sum('dana_kegiatan');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$keg = $this->db->get()->row();
		$jumkeg = $keg->dana_kegiatan;
		
		if($jumkeg >= $nominalkeg){
			$data['dankeg'] = 'Lunas';
		}
		if($jumkeg < $nominalkeg && $smstr == 'Ganjil'){
			$data['dankeg'] = 'Belum Lunas';
		}
		if($jumkeg < $nominalkeg && $smstr == 'Genap'){
			$data['dankeg'] = 'Tanggungan';
		}
		
		$this->db->select_sum('psg');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$psg = $this->db->get()->row();
		$jumpsg = $psg->psg;
		
		if($jumpsg >= $nominalpsg){
			$data['psg'] = 'Lunas';
		}
		if($jumpsg < $nominalpsg && $smstr == 'Ganjil'){
			$data['psg'] = 'Belum Lunas';
		}
		if($jumpsg < $nominalpsg && $smstr == 'Genap'){
			$data['psg'] = 'Tanggungan';
		}


		$this->db->select_sum('ukk');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$ukk = $this->db->get()->row();
		$jumukk = $ukk->ukk;
		
		if($jumukk >= $nominalukk){
			$data['ukk'] = 'Lunas';
		}
		if($jumukk < $nominalukk && $smstr == 'Ganjil'){
			$data['ukk'] = 'Belum Lunas';
		}
		if($jumukk < $nominalukk && $smstr == 'Genap'){
			$data['ukk'] = 'Tanggungan';
		}
		
		$this->db->select_sum('ujian_uts');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$uts = $this->db->get()->row();
		$jumuts = $uts->ujian_uts;
		
		if($jumuts >= $nominaluts){
			$data['uts'] = 'Lunas';
		}
		if($jumuts < $nominaluts && $smstr == 'Ganjil'){
			$data['uts'] = 'Belum Lunas';
		}
		if($jumuts < $nominaluts && $smstr == 'Genap'){
			$data['uts'] = 'Tanggungan';
		}
		
		$this->db->select_sum('ujian_uas');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$uas = $this->db->get()->row();
		$jumuas = $uas->ujian_uas;
		
		if($jumuas >= $nominaluas){
			$data['uas'] = 'Lunas';
		}
		if($jumuas < $nominaluas && $smstr == 'Ganjil'){
			$data['uas'] = 'Belum Lunas';
		}
		if($jumuas < $nominaluas && $smstr == 'Genap'){
			$data['uas'] = 'Tanggungan';
		}
      
      
      	$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$avv = $this->db->get()->row();
		$kel = $avv->jurusan;
      	
      
      	$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$avv1 = $this->db->get()->row();
		$sta = $avv1->status;
      	
      
      	if($kel == 'Akuntansi' && $sta != 'Yatim'){
		$dakhr = $nominalakhirak;
		}
      
      	if($kel == 'Akuntansi' && $sta == 'Yatim'){
		$da = $nominalakhirak;
        $dakhr = $da * 0.5;  
        }
      
      	if($kel != 'Akuntansi' && $sta != 'Yatim'){
		$dakhr = $nominalakhir;
        }
      
      	if($kel != 'Akuntansi' && $sta == 'Yatim'){
		$dbc = $nominalakhir;
        $dakhr = $dbc * 0.5;  
        }

		
		$this->db->select_sum('dana_akhir12');
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		//$this->db->where('semester', $smstr);
		$akhir = $this->db->get()->row();
		$jumakhir = $akhir->dana_akhir12;
		
		if($jumakhir >= $dakhr){
			$data['akhir'] = 'Lunas';
		}
		if($jumakhir < $dakhr && $smstr == 'Ganjil'){
			$data['akhir'] = 'Belum Lunas';
		}
		if($jumakhir < $dakhr && $smstr == 'Genap'){
			$data['akhir'] = 'Tanggungan';
		}
		
		$this->db->from('tb_pembayaran');
		$this->db->where('id_siswa', $idsiswa);
		$this->db->where('semester', $smstr);
		$a = $this->db->count_all_results();
		$data['hasil_nisn'] = $a;


		$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		$ab = $this->db->get()->row();
		$data['siswa_select'] = $ab->nama_siswa;
		$data['nisn_select'] = $ab->nisn;
		$data['kls'] = $ab->kelas;
		


		$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $idsiswa);
		$tngkt = $this->db->get()->row();


		//$data['tgl'] = $tgl;
		$this->db->from('tb_datasiswa');
		$this->db->group_by('nama_siswa');
		$data['nama_siswa'] = $this->db->get()->result();
		$data['tingkat'] = $tngkt->tingkat;
		$this->load->view('bendahara/list_hasil_history', $data);
		
	}


	public function detil_gaji($nip, $bulan)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$data['detil'] = $this->gaji_model->get_by_nip($bulan);
		$data['bulan'] = $bulan;
		$this->load->view('bendahara/list_detil_gaji', $data);
		
	}

	public function nama_siswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		$this->db->from('tb_datasiswa');
		$a = $this->db->get()->result();

		$data['nama'] = $a;
		$this->load->view('bendahara/nama_siswa', $data);
		
	}

	public function form_add_pembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
	
		$this->db->select_max('id_pembayaran');
		$this->db->from('tb_pembayaran');
		$q = $this->db->get();
		$a = $q->row();

		$nm = $_GET['nama'];
		$this->db->from('tb_datasiswa');
		$this->db->where('nama_siswa', $nm);
		$nmsiswa = $this->db->get()->row();

		$this->db->from('tb_datasiswa');
		$aa = $this->db->get()->result();

		$data['nama'] = $aa;
		
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['siswa'] = $nmsiswa;
		$data['record'] =  $this->siswa_model->tampil_data();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['jurusan'] =  $this->pembayaran_model->tampil_data_jurusan(); 
        $data['id_pem'] = $a->id_pembayaran + 1;
        $data['j_pembayaran'] =  $this->pembayaran_model->read_j_pembayaran();
        $data['jp_dana_keg'] =  $this->pembayaran_model->read_j_pembayaran_dana_keg();
        $data['jp_psg'] =  $this->pembayaran_model->read_j_pembayaran_psg();
        $data['jp_ukk'] =  $this->pembayaran_model->read_j_pembayaran_ukk();
        $data['jp_dana_uts'] =  $this->pembayaran_model->read_j_pembayaran_dana_uts();
        $data['jp_dana_uas'] =  $this->pembayaran_model->read_j_pembayaran_dana_uas();
        $data['jp_dana_akhir'] =  $this->pembayaran_model->read_j_pembayaran_dana_akhir();
		$this->load->view('bendahara/form_add_pembayaran', $data);
		
	}

	public function form_add_gaji()
	{
		if ($this->session->userdata('level')!=1) {
			 
		$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
	
		$this->db->select_max('id_gaji');
		$this->db->from('tb_gaji');
		$q = $this->db->get();
		$a = $q->row();
      
      	$this->db->from('tb_gaji');
		$qaa = $this->db->get();
		$aaa = $qaa->row();

		$this->db->from('tb_datasiswa');
		$aa = $this->db->get()->result();
		$data['nama'] = $aa;

		
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->karyawan_model->read_karyawan_gaji($aaa);
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['id_gaji'] = $a->id_gaji + 1;
		$this->load->view('bendahara/form_add_gaji', $data);
		
	}

	public function listkelas(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$jurusan = $this->input->post('jurusan');
		
		$kelas = $this->pembayaran_model->kelas_by_id($jurusan);
		$siswa = $this->pembayaran_model->siswa_by_id($jurusan);		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih Kelas</option>";
		
		foreach($kelas as $data){
			$lists .= "<option value='".$data->kelas."'>".$data->kelas."</option>"; // Tambahkan tag option ke variabel $lists
		}

		$lists_siswa = "<option value=''>Pilih Siswa</option>";
		
		foreach($siswa as $data2){
			$lists_siswa .= "<option value='".$data2->id_siswa."'>".$data2->nama_siswa."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kelas'=>$lists, 'list_siswa'=>$lists_siswa);
		//$callback_siswa = array('list_siswa'=>$lists_siswa); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback);
		//echo json_encode($callback_siswa); // konversi varibael $callback menjadi JSON
	}

	public function form_edit_siswa($id, $kelas)
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		$data['kelas'] = $this->siswa_model->read_kelas();
		$data['jurusan'] = $this->siswa_model->read_jurusan();
		$data['siswa'] = $this->siswa_model->siswa_get_by_id($id);
		$this->load->view('bendahara/form_edit_siswa', $data);
		
	}


	public function insert_karyawan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');	

		$this->form_validation->set_rules('nip', 'Nip', 'required|numeric|is_unique[tb_karyawan.nip]', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka', 'is_unique' => '%s Sudah Ada'));
		
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('no_rekening', 'No. Rekening', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => '%s isi dengan angka.'));

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['jml_user'] = $this->user_model->jumlah_user();
			$data['user'] = $this->user_model->read_user_by();
			$data['count_cek_kepsek'] = $this->user_model->count_cek_jabatan_kepsek();
		$data['count_cek_bendahara'] = $this->user_model->count_cek_jabatan_bendahara(); 
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		
		$this->load->view('bendahara/form_add_karyawan', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{


		if($this->input->post('jabatan')=='Kepala Sekolah'){

		$data = array(
		'id_karyawan' => $this->input->post('id_karyawan'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nip' => $this->input->post('nip'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat'),
		'no_rekening' => $this->input->post('no_rekening'),
		'no_telepon' => $this->input->post('no_telepon'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'id_user' => $this->input->post('id_user'),
		);

		$data_user = array(
		'id_user' => $this->input->post('id_user'),
		'username' => 'kepsek',
		'password' => md5('kepsek'),
		'level' => '2',
		);

		$insert = $this->karyawan_model->tambah_karyawan($data);
		$insert_user = $this->user_model->tambah_user_via_karyawan($data_user);
		
		}

		if($this->input->post('jabatan')=='Bendahara'){

		$data = array(
		'id_karyawan' => $this->input->post('id_karyawan'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nip' => $this->input->post('nip'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat'),
		'no_rekening' => $this->input->post('no_rekening'),
		'no_telepon' => $this->input->post('no_telepon'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'id_user' => $this->input->post('id_user'),
		);

		$data_user = array(
		'id_user' => $this->input->post('id_user'),
		'username' => 'bendahara',
		'password' => md5('bendahara'),
		'level' => '3',
		);

		$insert = $this->karyawan_model->tambah_karyawan($data);
		$insert_user = $this->user_model->tambah_user_via_karyawan($data_user);
		
		}


		if($this->input->post('jabatan')=='Karyawan'){

		$data = array(
		'id_karyawan' => $this->input->post('id_karyawan'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nip' => $this->input->post('nip'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat'),
		'no_rekening' => $this->input->post('no_rekening'),
		'no_telepon' => $this->input->post('no_telepon'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'id_user' => 0,
		);

		//insert ke database
		$insert = $this->karyawan_model->tambah_karyawan($data);
		
		}


			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datakaryawan');
	

		}

	}

	public function insert_siswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('id_user', 'id_user', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka'));		

		$this->form_validation->set_rules('nisn', 'NIS', 'required|is_unique[tb_datasiswa.nisn]', array('required' => '%s Tidak Boleh Kosong', 'is_unique' => 'NIS Sudah Ada'));
		
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Pilih %s'));		
		$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('nama_walimurid', 'Wali Murid', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('no_telepon_walimurid', 'No. Telepon Wali Murid', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => '%s isi dengan angka.'));

		$this->form_validation->set_rules('agama', 'Agama', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('tingkat', 'Tingkat Kelas', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['kelas'] = $this->siswa_model->read_kelas();
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_siswa', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$data = array(
		'id_siswa' => $this->input->post('id_siswa'),
		'nama_siswa' => $this->input->post('nama_siswa'),
		'nisn' => $this->input->post('nisn'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'jurusan' => $this->input->post('jurusan'),
		'kelas' => $this->input->post('kelas'),
		'tingkat' => $this->input->post('tingkat'),
		'tempat' => $this->input->post('tempat'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'tahun_ajaran' => $this->input->post('tahun_ajaran'),
		'nama_walimurid' => $this->input->post('nama_walimurid'),
		'no_telepon_walimurid' => $this->input->post('no_telepon_walimurid'),
		'agama' => $this->input->post('agama'),
		'status' => $this->input->post('status'),
		'alamat' => $this->input->post('alamat'),
		);

		//insert ke database
		$insert = $this->siswa_model->insert($data);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datasiswa');
		

		}

	}
	
	
	public function insert_kelas()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('id_user', 'id_user', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka'));		

		$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['kelas'] = $this->siswa_model->read_kelas();
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_kelas', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$data = array(
		'id_kelas' => $this->input->post('id_kelas'),
		'kelas' => $this->input->post('kelas'),
		'jurusan' => $this->input->post('jurusan'),
		);

		//insert ke database
		$insert = $this->karyawan_model->insert_kelas($data);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datakelas');
		

		}

	}

	public function insert_jenis_pembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('id_user', 'id_user', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka'));		

		$this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		$this->form_validation->set_rules('nominal', 'Nominal', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			//$data['kelas'] = $this->siswa_model->read_kelas();
		$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_jenis_pembayaran', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$data = array(
		'id_jenis_pembayaran' => $this->input->post('id_jenis_pembayaran'),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
		'nominal' => $this->input->post('nominal'),
		'cicilan' => $this->input->post('cicilan'),
		'cicilan2' => $this->input->post('cicilan2'),
		);

		//insert ke database
		$insert = $this->pembayaran_model->insert_jenis_pembayaran($data);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/jenispembayaran');
		

		}

	}
	
	public function insert_jurusan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('id_user', 'id_user', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka'));		

		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['kelas'] = $this->siswa_model->read_kelas();
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_jurusan', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$data = array(
		'id_jurusan' => $this->input->post('id_jurusan'),
		'jurusan' => $this->input->post('jurusan'),
		);

		//insert ke database
		$insert = $this->karyawan_model->insert_jurusan($data);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datajurusan');
		

		}

	}

	public function insert_pembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nisn', 'NISN', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array('required' => 'Pilih %s'));		
		$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Pilih %s'));

		$this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pembayaran', 'required', array('required' => '%s Tidak Boleh Kosong'));
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
		$this->db->select_max('id_pembayaran');
		$this->db->from('tb_pembayaran');
		$q = $this->db->get();
		$a = $q->row();

		$jurusan = $this->input->post('jurusan');
		
		$data['jurusan'] = $this->pembayaran_model->tampil_data_jurusan();

		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->siswa_model->tampil_data();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['id_pem'] = $a->id_pembayaran + 1;
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->db->select_max('id_pembayaran');
		$this->db->from('tb_pembayaran');
		$q = $this->db->get();
		$a = $q->row();

		
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->siswa_model->tampil_data();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['jurusan'] =  $this->pembayaran_model->tampil_data_jurusan(); 
        $data['id_pem'] = $a->id_pembayaran + 1;
        $data['j_pembayaran'] =  $this->pembayaran_model->read_j_pembayaran();
        $data['jp_dana_keg'] =  $this->pembayaran_model->read_j_pembayaran_dana_keg();
        $data['jp_psg'] =  $this->pembayaran_model->read_j_pembayaran_psg();
        $data['jp_ukk'] =  $this->pembayaran_model->read_j_pembayaran_ukk();
        $data['jp_dana_uts'] =  $this->pembayaran_model->read_j_pembayaran_dana_uts();
        $data['jp_dana_uas'] =  $this->pembayaran_model->read_j_pembayaran_dana_uas();
        $data['jp_dana_akhir'] =  $this->pembayaran_model->read_j_pembayaran_dana_akhir();
		
		$this->load->view('bendahara/form_add_pembayaran', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{
		
		$jp_dana_keg =  $this->pembayaran_model->read_j_pembayaran_dana_keg();
        $jp_psg =  $this->pembayaran_model->read_j_pembayaran_psg();
        $jp_ukk =  $this->pembayaran_model->read_j_pembayaran_ukk();
        $jp_dana_uts =  $this->pembayaran_model->read_j_pembayaran_dana_uts();
        $jp_dana_uas =  $this->pembayaran_model->read_j_pembayaran_dana_uas();
		$jp_dana_akhir =  $this->pembayaran_model->read_j_pembayaran_dana_akhir();
        $jp_dana_akhir_ak =  $this->pembayaran_model->read_j_pembayaran_dana_akhir_ak();  
		
		$this->db->from('tb_datasiswa');
		$this->db->where('id_siswa', $this->input->post('id_siswa'));
		$a = $this->db->get()->row();
		$status = $a->status;

		if($this->input->post('jurusan') == 'Akuntansi'){
		$dakhr = $jp_dana_akhir->nominal;
		}else{
		$dakhr = $jp_dana_akhir_ak->nominal;
		}

		$dkeg = $this->input->post('dana_kegiatan');
		$dkeg_cicilan = $this->input->post('dana_kegiatan_cicilan');

		$psg = $this->input->post('psg');
		$psg_cicilan = $this->input->post('psg_cicilan');

		$ukk = $this->input->post('ukk');
		$ukk_cicilan = $this->input->post('ukk_cicilan');

		$ujuas = $this->input->post('ujian_uas');
		$ujuas_cicilan = $this->input->post('ujian_uas_cicilan');

		$ujuts = $this->input->post('ujian_uts');
		$ujuts_cicilan = $this->input->post('ujian_uts_cicilan');

		$dakhir = $this->input->post('dana_akhir12');
		$dakhir_cicilan = $this->input->post('dana_akhir12_cicilan');	
		
		if($dkeg != null && $dkeg_cicilan == null){
			$dkegg = $jp_dana_keg->nominal;
			$ketdkeg = 'Dana Kegiatan Lunas, ';
		}
		if($dkeg == null && $dkeg_cicilan != null){
			$dkegg = $this->input->post('dana_kegiatan_cicilan');
			$ketdkeg = 'Dana Kegiatan Cicilan, ';
		}
		if($dkeg == null && $dkeg_cicilan == null){
			$dkegg = '0';
			$ketdkeg = '';
		}
		
		if($psg != null && $psg_cicilan == null && $status != 'Yatim'){
			$psg = $jp_psg->nominal;
			$ketpsg = 'PSG Lunas, ';
		}
		if($psg != null && $psg_cicilan == null && $status == 'Yatim'){
			$psg = $jp_psg->nominal * 0.5;
			$ketpsg = 'PSG Lunas, ';
		}
		if($psg == null && $psg_cicilan != null){
			$psg = $this->input->post('psg_cicilan');
			$ketpsg = 'PSG Cicilan, ';
		}
		if($psg == null && $psg_cicilan == null){
			$psg = '0';
			$ketpsg = '';
		}

		if($ukk != null && $ukk_cicilan == null){
			$ukk = $jp_ukk->nominal;
			$ketukk = 'UKK Lunas, ';
		}
		if($ukk == null && $ukk_cicilan != null){
			$ukk = $this->input->post('ukk_cicilan');
			$ketukk = 'UKK Cicilan, ';
		}
		if($ukk == null && $ukk_cicilan == null){
			$ukk = '0';
			$ketukk = '';
		}
		
		if($ujuas != null && $ujuas_cicilan == null){
			$ujuass = $jp_dana_uas->nominal;
			$ketujuas = 'Dana Ujian UAS Semester '.$this->input->post('semester').' Lunas, ';
		}
		if($ujuas == null && $ujuas_cicilan != null){
			$ujuass = $this->input->post('ujian_uas_cicilan');
			$ketujuas = 'Dana Ujian UAS Semester '.$this->input->post('semester').' Cicilan, ';
		}
		if($ujuas == null && $ujuas_cicilan == null){
			$ujuass = '0';
			$ketujuas = '';
		}
		
		if($ujuts != null && $ujuts_cicilan == null){
			$ujutss = $jp_dana_uts->nominal;
			$ketujuts = 'Dana Ujian UTS Semester '.$this->input->post('semester').' Lunas, ';
		}
		if($ujuts == null && $ujuts_cicilan != null){
			$ujutss = $ujuts = $this->input->post('ujian_uts_cicilan');;
			$ketujuts = 'Dana Ujian UTS Semester '.$this->input->post('semester').' Cicilan, ';
		}
		if($ujuts == null && $ujuts_cicilan == null){
			$ujutss = '0';
			$ketujuts = '';
		}
		
		
		if($dakhir != null && $dakhir_cicilan == null && $status == 'Yatim'){
			$dakhirs = $dakhr * 0.5;
			$ketdakhir = 'Dana Akhir Kelas 12 Lunas, ';
		}
		if($dakhir != null && $dakhir_cicilan == null && $status != 'Yatim'){
			$dakhirs = $dakhr;
			$ketdakhir = 'Dana Akhir Kelas 12 Lunas, ';
		}
		if($dakhir == null && $dakhir_cicilan != null){
			$dakhirs = $this->input->post('dana_akhir12_cicilan');
			$ketdakhir = 'Dana Akhir Kelas 12 Cicilan, ';
		}
		if($dakhir == null && $dakhir_cicilan == null){
			$dakhirs = '0';
			$ketdakhir = '';
		}

		$totbayar = $dkegg + $psg + $ukk + $ujuass + $ujutss + $dakhirs;

		$ket = 'Pembayaran '.$ketdkeg.''.$ketpsg.''.$ketukk.''.$ketujuas.''.$ketujuts.''.$ketdakhir.'';

		$data = array(
		'id_pembayaran' => $this->input->post('id_pembayaran'),
		'id_siswa' => $this->input->post('id_siswa'),
		'nama_siswa' => $this->input->post('nama_siswa'),
		'nisn' => $this->input->post('nisn'),
		'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
		'jurusan' => $this->input->post('jurusan'),
		'kelas' => $this->input->post('kelas'),
		'semester' => $this->input->post('semester'),
        'th_ajaran' => $this->input->post('th_ajaran'),
		'dana_kegiatan' => $dkegg,
		'psg' => $psg,
		'ukk' => $ukk,
		'ujian_uas' => $ujuass,
		'ujian_uts' => $ujutss,
		'dana_akhir12' => $dakhirs,
		'jumlah' => $totbayar,
		'keterangan' => $ket,
		);



		$namasiswa = $this->input->post('nama_siswa');
		$ket = $this->input->post('keterangan');
		$telp = $this->input->post('no_telepon_walimurid');
		$tot = $totbayar;
		$tgl = $this->input->post('tanggal_pembayaran');

		$detik = date('s');
		$year = date('y');
		$month = date('m');
		$day = date('d');
		$kd = 'SMK-'.$year.'-'.$month.'-'.$day.'-'.$detik;
		$kdrekap = 'SMK-REKAP-'.$year.'-'.$month.'-'.$day.'-'.$detik;

		$ket = 'Pembayaran '.$ketdkeg.''.$ketpsg.''.$ketukk.''.$ketujuas.''.$ketujuts.''.$ketdakhir.'';

		$data_kasmasuk = array(
		'id_kasmasuk' => $this->input->post('id_kasmasuk'),
		'id_pembayaran' => $this->input->post('id_pembayaran'),
		'kode_penerimaan' => $kd,
		'tanggal_kasmasuk' => $this->input->post('tanggal_pembayaran'),
		'semester' => $this->input->post('semester'),
        'th_ajaran' => $this->input->post('th_ajaran'),
		'dana_kegiatan' => $dkegg,
		'psg' => $psg,
		'ukk' => $ukk,
		'ujian_uas' => $ujuass,
		'ujian_uts' => $ujutss,
		'dana_akhirkls12' => $dakhirs,
		'jumlah_kasmasuk' => $totbayar,
		'keterangan' => $ket,
		);

		$rekap_masuk = array(
		'kode' => $kdrekap,
		'keterangan' => $this->input->post('tanggal_pembayaran'),
		'masuk' => $totbayar,
		'keluar' => '0',
		//'total' => $this->input->post('tanggal_pembayaran'),
		);
          
        $this->db->from('wa');
        $gg = $this->db->get()->row();  
		$tok = $gg->token;
        $pkey = $gg->passkey;
          
		 $token = $tok; // masukkan token anda  
 		 $passkey = $pkey; // masukkan passkey anda 
 		 $message ="Yth Wali Murid ".$namasiswa.", " .$ket. " senilai Rp".$tot." sudah dibayarkan pada ".$tgl.". Terima kasih."; // masukkan isi pesan

 		 //$message =$ket. " senilai Rp".$tot." sudah dibayarkan pada ".$tgl.""; // masukkan isi pesan

 		 $number = $telp; // masukkan no hp 
     
      $ch = curl_init(); 
      $fields = array( 
      'token'=>$token, 
      'aksi'=>'1',    
      'jalur'=>'2',     
      'pesan'=> $message, 
  'hp'=>$number, 
  'passkey'=> $passkey,     
  
   ); 
   $postvars = json_encode($fields); 
   $url = "http://purindo.net/api/sms.php"; 

   $ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars); 
	$result = curl_exec($ch);

		//insert ke database
		$insert = $this->pembayaran_model->insert($data);
		$insert_kasmasuk = $this->kasmasuk_model->insert_kasmasuk($data_kasmasuk);
		$insert_rekap = $this->rekap_model->insert_rekap($rekap_masuk);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datapembayaran');
		

		}

	}


	public function insert_kaskeluar()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('tanggal_kaskeluar', 'Tanggal Pengeluaran', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('pembelian_peralatanpraktik', 'Pembelian Perl. Praktik', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('pembayaran_wifi', 'Pembayaran Wifi', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('pembayaran_telepon', 'Pembayaran Telepon', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('pembayaran_listrik', 'Pembayaran Listrik', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('belanja_atk', 'Belanja ATK', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('ket_keluar', 'Keterangan', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('total', 'Total', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka')); 

		
		if ($this->form_validation->run() == FALSE)
		{
			
		$this->db->select_max('id_kaskeluar');
		$this->db->from('tb_kaskeluar');
		$q = $this->db->get();
		$a = $q->row();

		$jurusan = $this->input->post('jurusan');
		
		$data['jurusan'] = $this->pembayaran_model->tampil_data_jurusan();

		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->siswa_model->tampil_data();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['id_kaskeluar'] = $a->id_kaskeluar + 1;
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_kaskeluar', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$detik = date('s');
		$year = date('y');
		$month = date('m');
		$day = date('d');
		$kd = 'SMK-KAS-KELUAR-'.$year.'-'.$month.'-'.$day.'-'.$detik;
		$kdrekap = 'SMK-REKAP-'.$year.'-'.$month.'-'.$day.'-'.$detik;

		$data_kaskeluar = array(
		'id_kaskeluar' => $this->input->post('id_kaskeluar'),
		'kode_pengeluaran' => $kd,
		'id_gaji_karyawan' => '0',
		'gaji_karyawan' => '0',
		'nama_karyawan' => '-',
		'pembelian_peralatanpraktik' => $this->input->post('pembelian_peralatanpraktik'),
		'pembayaran_listrik' => $this->input->post('pembayaran_listrik'),
		'tanggal_kaskeluar' => $this->input->post('tanggal_kaskeluar'),
		'pembayaran_telepon' => $this->input->post('pembayaran_telepon'),
		'pembayaran_wifi' => $this->input->post('pembayaran_wifi'),
		'belanja_atk' => $this->input->post('belanja_atk'),
		'ket_keluar' => $this->input->post('ket_keluar'),
		'total' => $this->input->post('total'),
		);

		$rekap_keluar = array(
		'kode' => $kdrekap,
		'keterangan' => $this->input->post('tanggal_kaskeluar'),
		'masuk' => '0',
		'keluar' => $this->input->post('total'),
		//'total' => $this->input->post('tanggal_pembayaran'),
		);

		//insert ke database
		//$insert = $this->pembayaran_model->insert($data);
		$insert_kaskeluar = $this->kaskeluar_model->insert_kaskeluar($data_kaskeluar);
		$insert_rekap = $this->rekap_model->insert_rekap_keluar($rekap_keluar);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datakaskeluar');
		

		}

	}


	public function insert_gaji()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nip', 'NIP', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Isi Dengan Angka'));
		
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('tanggal_pembayaran_gaji', 'Tanggal Pembayaran Gaji', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('tunjangan_yayasan', 'Tunjangan Yayasan', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('potongan_bpjs', 'Potongan BPJS', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('potongan_simpanansejahtera', 'Potongan Simp. Sejahtera', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('potongan_rumahinfaq', 'Poongan Rumah Infaq', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('potongan_lainlain', 'Potongan Lain', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka'));

		$this->form_validation->set_rules('total_gaji', 'Total Gaji', 'required|numeric', array('required' => '%s Tidak Boleh Kosong', 'numeric' => 'Hanya isi dengan angka')); 

		
		if ($this->form_validation->run() == FALSE)
		{
			
		$this->db->select_max('id_gaji');
		$this->db->from('tb_gaji');
		$q = $this->db->get();
		$a = $q->row();

		
		$data['jml_user'] = $this->user_model->jumlah_user();
		$data['record'] =  $this->karyawan_model->read_karyawan();
        $data['record2'] =  $this->siswa_model->tampil_data2();
        $data['id_gaji'] = $a->id_gaji + 1;
			$this->session->set_flashdata('datagagal', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa data kembali.</strong>
                            </div>');
		//$isi['user'] = $this->user_model->read_user_by();
		$this->load->view('bendahara/form_add_gaji', $data);
		
		}


		if ($this->form_validation->run() == TRUE)
		{

		$a = $this->input->post('tanggal_pembayaran_gaji');
		$b = substr($a, 0,-3);
        $c = substr($b, 5, 3);

		$data = array(
		'id_gaji' => $this->input->post('id_gaji'),
		'bulan' => $c,
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nip' => $this->input->post('nip'),
		'tanggal_pembayaran_gaji' => $this->input->post('tanggal_pembayaran_gaji'),
		'gaji_pokok' => $this->input->post('gaji_pokok'),
		'tunjangan_yayasan' => $this->input->post('tunjangan_yayasan'),
		'potongan_bpjs' => $this->input->post('potongan_bpjs'),
		'potongan_simpanansejahtera' => $this->input->post('potongan_simpanansejahtera'),
		'potongan_rumahinfaq' => $this->input->post('potongan_rumahinfaq'),
		'potongan_lainlain' => $this->input->post('potongan_lainlain'),
		'total_gaji' => $this->input->post('total_gaji'),
		);

		$namkar = $this->input->post('nama_karyawan');
		$totalgaji = $this->input->post('total_gaji');
		$telp = $this->input->post('no_telepon');
        $tgl = $this->input->post('tanggal_pembayaran_gaji');
          
		$detik = date('s');
		$year = date('y');
		$month = date('m');
		$day = date('d');
		$kd = 'SMK-KAS-KELUAR-'.$year.'-'.$month.'-'.$day.'-'.$detik;
		$kdrekap = 'SMK-REKAP-'.$year.'-'.$month.'-'.$day.'-'.$detik.'-'.$detik;

		$data_kaskeluar = array(
		'id_kaskeluar' => $this->input->post('id_kaskeluar'),
		'kode_pengeluaran' => $kd,
		'gaji_karyawan' => $this->input->post('total_gaji'),
		'id_gaji_karyawan' => $this->input->post('id_gaji'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'tanggal_kaskeluar' => $this->input->post('tanggal_pembayaran_gaji'),
		'pembelian_peralatanpraktik' => '0',
		'pembayaran_wifi' => '0',
		'pembayaran_telepon' => '0',
		'pembayaran_listrik' => '0',
		'belanja_atk' => '0',
		'ket_keluar' => 'Pembayaran Gaji '.$this->input->post('nama_karyawan'),
		'total' => $this->input->post('total_gaji'),
		);

		$rekap_keluar = array(
			'kode' => $kdrekap,
			'keterangan' => $this->input->post('tanggal_pembayaran_gaji'),
			'masuk' => '0',
			'keluar' => $this->input->post('total_gaji'),
			//'total' => $this->input->post('tanggal_pembayaran'),
			);
          
          
        $this->db->from('wa');
        $gg = $this->db->get()->row();  
		$tok = $gg->token;
        $pkey = $gg->passkey; 
		
		 $token = $tok; // masukkan token anda  
 		 $passkey = $pkey;
 		 $message ="Kepada YTH, ".$namkar.". Pada Tanggal ".$tgl." Anda Telah Menerima Gaji Rp".$totalgaji." sudah ditransfer."; // masukkan isi pesan 
 		 $number = $telp; // masukkan no hp 
     
      $ch = curl_init(); 
      $fields = array( 
      'token'=>$token, 
      'aksi'=>'1',    
      'jalur'=>'2',     
      'pesan'=> $message, 
  'hp'=>$number, 
  'passkey'=> $passkey,     
  
   ); 
   $postvars = json_encode($fields); 
   $url = "http://purindo.net/api/sms.php"; 

   $ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars); 
	$result = curl_exec($ch);

		//insert ke database
		$insert = $this->gaji_model->insert($data);
		$insert_kaskeluar = $this->kaskeluar_model->insert_kaskeluar($data_kaskeluar);
		$insert_rekap = $this->rekap_model->insert_rekap_keluar($rekap_keluar);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Ditambahkan</strong>.
                            </div>');
		redirect('bendahara/datagaji');
		

		}

	}



	public function update_karyawan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		

		$data = array(
		'id_karyawan' => $this->input->post('id_karyawan'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'nip' => $this->input->post('nip'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat'),
		'no_rekening' => $this->input->post('no_rekening'),
		'no_telepon' => $this->input->post('no_telepon'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		);

		//insert ke database
		$update = $this->karyawan_model->update_karyawan(array('id_karyawan' => $this->input->post('id_karyawan')), $data);



		if($update==TRUE){
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/datakaryawan');
		
		}else{
			redirect(base_url('bendahara/datakaryawan'));
		}

	}
	
	public function update_kelas()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		

		$data = array(
		'id_kelas' => $this->input->post('id_kelas'),
		'kelas' => $this->input->post('kelas'),
		'jurusan' => $this->input->post('jurusan'),
		);

		//insert ke database
		$update = $this->karyawan_model->update_kelas(array('id_kelas' => $this->input->post('id_kelas')), $data);

		if($update==TRUE){
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/datakelas');
		
		}else{
			redirect(base_url('bendahara/datakelas'));
		}

	}
	
	public function update_jurusan()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		

		$data = array(
		'id_jurusan' => $this->input->post('id_jurusan'),
		'jurusan' => $this->input->post('jurusan'),
		);

		//insert ke database
		$update = $this->karyawan_model->update_jurusan(array('id_jurusan' => $this->input->post('id_jurusan')), $data);

		if($update==TRUE){
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/datajurusan');
		
		}else{
			redirect(base_url('bendahara/datajurusan'));
		}

	}

	public function update_jenis_pembayaran()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		

		$data = array(
		'id_jenis_pembayaran' => $this->input->post('id_jenis_pembayaran'),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
		'nominal' => $this->input->post('nominal'),
		);

		//insert ke database
		$update = $this->pembayaran_model->update_jenis_pembayaran(array('id_jenis_pembayaran' => $this->input->post('id_jenis_pembayaran')), $data);

		if($update==TRUE){
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/jenispembayaran');
		
		}else{
			redirect(base_url('bendahara/jenispembayaran'));
		}

	}
  
  	public function update_wa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		

		$data = array(
		'id_wa' => $this->input->post('id_wa'),
		'token' => $this->input->post('token'),
		'passkey' => $this->input->post('passkey'),
		);

		//insert ke database
		$update = $this->pembayaran_model->update_wa(array('id_wa' => $this->input->post('id_wa')), $data);

		
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/datawa');
		

	}

	public function update_siswa()
	{
		if ($this->session->userdata('level')!=1) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
			redirect('Auth');
		}

		$data = array(
		'id_siswa' => $this->input->post('id_siswa'),
		'nama_siswa' => $this->input->post('nama_siswa'),
		'nisn' => $this->input->post('nisn'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'jurusan' => $this->input->post('jurusan'),
		'kelas' => $this->input->post('kelas'),
		'tingkat' => $this->input->post('tingkat'),
		'tempat' => $this->input->post('tempat'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		'tahun_ajaran' => $this->input->post('tahun_ajaran'),
		'nama_walimurid' => $this->input->post('nama_walimurid'),
		'no_telepon_walimurid' => $this->input->post('no_telepon_walimurid'),
		'agama' => $this->input->post('agama'),
		'status' => $this->input->post('status'),
		'alamat' => $this->input->post('alamat'),
		);

		//insert ke database
		$update = $this->siswa_model->update_siswa(array('id_siswa' => $this->input->post('id_siswa')), $data);

		
			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Diubah</strong>.
                            </div>');
		redirect('bendahara/datasiswa');

	}

	public function hapus_karyawan($id, $id_user)
	{
		if ($this->session->userdata('level')==0) {
			redirect('home');
		}

		$this->karyawan_model->hapus($id);
		$this->karyawan_model->hapus_user_via_karyawan($id_user);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Dihapus</strong>.
                            </div>');
		redirect('bendahara/datakaryawan');	

	}

	public function hapus_siswa($id)
	{
		if ($this->session->userdata('level')==0) {
			redirect('home');
		}

		$this->siswa_model->hapus($id);
		$this->siswa_model->hapus_pembayaran($id);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Dihapus</strong>.
                            </div>');
		redirect('bendahara/datasiswa');	

	}
	
	public function hapus_kelas($id)
	{
		if ($this->session->userdata('level')==0) {
			redirect('home');
		}

		$this->karyawan_model->hapus_kelas($id);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Dihapus</strong>.
                            </div>');
		redirect('bendahara/datakelas');	

	}
	
	public function hapus_jurusan($id)
	{
		if ($this->session->userdata('level')==0) {
			redirect('home');
		}

		$this->karyawan_model->hapus_jurusan($id);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Dihapus</strong>.
                            </div>');
		redirect('bendahara/datajurusan');	

	}

	public function hapus_jenis_pembayaran($id)
	{
		if ($this->session->userdata('level')==0) {
			redirect('home');
		}

		$this->pembayaran_model->hapus_jenis_pembayaran($id);

			$this->session->set_flashdata('data', '<div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Data Telah Dihapus</strong>.
                            </div>');
		redirect('bendahara/jenispembayaran');	

	}


	public function autocomplete(){
        $id=$_GET['id_siswa'];
        $cari = $this->pembayaran_model->cari($id)->result();
        echo json_encode($cari);
    }

    public function autocomplete_gaji(){
        $id=$_GET['nip'];
        $cari = $this->gaji_model->cari($id)->result();
        echo json_encode($cari);
    }
  
  function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->siswa_model->search_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array(
					'desc'			=> $row->nama_siswa,
					'label'	=> $row->kelas.' - '.$row->nama_siswa,
				);
                echo json_encode($arr_result);
            }
        }
    }
  
  function get_autocomplete_pembayaran(){
        if (isset($_GET['term'])) {
            $result = $this->siswa_model->search_siswa($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array(
					'desc'			=> $row->nama_siswa,
					'label'	=> $row->nisn.' - '.$row->nama_siswa,
					'label2' => $row->nisn,
					'label3' => $row->kelas,
					'label4' => $row->jurusan,
              		'label5' => $row->id_siswa,
				);
                echo json_encode($arr_result);
            }
        }
	}
  
  
  function get_autocomplete_kasmasuk(){
        if (isset($_GET['term'])) {
            $result = $this->siswa_model->search_siswa_kasmasuk($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
				$arr_result[] = array(
					'desc'			=> $row->nama_siswa,
					'label'	=> $row->nisn.' - '.$row->nama_siswa,
					'label2'	=> $row->id_pembayaran,
					
				);
                echo json_encode($arr_result);
            }
        }
	}
  
  public function tesss(){
     $token = "d31cb1e2b7902e8e9b4d1793e94c38a0"; // masukkan token anda  
 		 $passkey = "soniaaaa"; // masukkan passkey anda 
 		 $message ="coba";

 		 //$message =$ket. " senilai Rp".$tot." sudah dibayarkan pada ".$tgl.""; // masukkan isi pesan

 		 $number = '085230203910'; // masukkan no hp 
     
      $ch = curl_init(); 
      $fields = array( 
      'token'=>$token, 
      'aksi'=>'1',    
      'jalur'=>'1',     
      'pesan'=> $message, 
  'hp'=>$number, 
  'passkey'=> $passkey,     
  
   ); 
   $postvars = json_encode($fields); 
   $url = "http://purindo.net/api/sms.php"; 

   $ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars); 
	$result = curl_exec($ch);

  }
  
   
}
