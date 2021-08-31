<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepsek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('karyawan_model');
		$this->load->model('siswa_model');
		$this->load->model('user_model');
		$this->load->model('pembayaran_model');
		$this->load->model('kasmasuk_model');
		$this->load->model('kaskeluar_model');
		$this->load->model('rekap_model');
	}

	public function cetak_datarekapitulasi_filter()
	{
		if ($this->session->userdata('level')!=2) {
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
		$this->pdf->load_view('kepsek/cetak_data_rekapitulasi', $data);
		}

		if($tgl == null && $tglakhir == null){
		
		redirect('bendahara/datarekapitulasi');
		}
		
		
		
	}


	public function cetak_datarekapitulasi()
	{
		if ($this->session->userdata('level')!=2) {
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
		$this->pdf->load_view('kepsek/cetak_data_rekapitulasi', $data);
	}


	public function index()
	{
		if ($this->session->userdata('level')!=2) {
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

	public function datakasmasuk()
	{
		if ($this->session->userdata('level')!=2) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['kasmasuk'] = $this->kasmasuk_model->read_kasmasuk();
		$this->load->view('kepsek/list_data_kasmasuk', $data);
	}

	public function datarekapitulasi()
	{
		if ($this->session->userdata('level')!=2) {
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
		$this->load->view('kepsek/list_data_rekapitulasi', $data);
	}

	public function filter_rekapitulasi()
	{
		if ($this->session->userdata('level')!=2) {
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

		$this->load->view('kepsek/list_data_rekapitulasi_filter', $data);
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

		$this->load->view('kepsek/list_data_rekapitulasi_filter', $data);
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

		$this->load->view('kepsek/list_data_rekapitulasi_filter', $data);
		}

		if($tgl == null && $tglakhir == null){
		
		redirect('kepsek/datarekapitulasi');
		}
		
		
		
	}

	public function detil_kasmasuk($id, $kd)
	{
		if ($this->session->userdata('level')!=2) {
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
		$this->load->view('kepsek/detil_kasmasuk', $data);
	}

	public function datakaskeluar()
	{
		if ($this->session->userdata('level')!=2) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth');
		}
		$data['kaskeluar'] = $this->kaskeluar_model->read_kaskeluar();
		$this->load->view('kepsek/list_data_kaskeluar', $data);
	}

	public function detil_kaskeluar($id, $kd)
	{
		if ($this->session->userdata('level')!=2) {
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
		$this->load->view('kepsek/detil_kaskeluar', $data);
	}


	public function datakaryawan()
	{
		if ($this->session->userdata('level')!=2) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth/');
		}
		$data['karyawan'] = $this->karyawan_model->read_karyawan();
		$this->load->view('kepsek/list_data_karyawan', $data);
	}

	public function datasiswa()
	{
		if ($this->session->userdata('level')!=2) {
			$this->session->set_flashdata('auth', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                <strong>Anda Tidak Memiliki Hak Mengakses Menu Ini.</strong>
                            </div>');
		redirect('Auth/');
		}
		$data['siswa'] = $this->siswa_model->read_siswa();
		$this->load->view('kepsek/list_data_siswa', $data);
	}

}
