<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kasmasuk_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert_kasmasuk($data_kasmasuk) {
			$this->db->insert('tb_kasmasuk', $data_kasmasuk);

		}

		public function jumlah_kasmasuk(){

			$this->db->select_sum('jumlah_kasmasuk');
			$a = $this->db->get('tb_kasmasuk');
			return $a->row();
		}

		public function read_kasmasuk_by_id($id)
		{
			$this->db->from('tb_pembayaran');
			$this->db->where('tanggal_pembayaran',$id);
			$query = $this->db->get();

			return $query->result();
		}

		public function read_kasmasuk(){

			$this->db->select("SUM(jumlah_kasmasuk) as jumtot, tanggal_kasmasuk as tgl, kode_penerimaan as kode, keterangan as ket");
			$this->db->from('tb_kasmasuk');
			$this->db->group_by('tanggal_kasmasuk');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_kasmasuk_by_tgl($id, $tgl){

			//$this->db->select("SUM(jumlah_kasmasuk) as jumtot, tanggal_kasmasuk as tgl, kode_penerimaan as kode, keterangan as ket");
			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$this->db->where('tb_kasmasuk.tanggal_kasmasuk', $tgl);
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_kasmasuk_by_nama($nama, $tgl){

			//$this->db->select("SUM(jumlah_kasmasuk) as jumtot, tanggal_kasmasuk as tgl, kode_penerimaan as kode, keterangan as ket");
			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$this->db->where('tb_pembayaran.nama_siswa', $nama);
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_kasmasuk_by_all($nama, $tgl){

			//$this->db->select("SUM(jumlah_kasmasuk) as jumtot, tanggal_kasmasuk as tgl, kode_penerimaan as kode, keterangan as ket");
			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$this->db->where('tb_pembayaran.nama_siswa', $nama);
			$this->db->where('tb_kasmasuk.tanggal_kasmasuk', $tgl);
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_kasmasuk_all(){

			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_kasmasuk_nama_siswa(){

			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$this->db->group_by('tb_pembayaran.nama_siswa');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_kasmasuk_nama_siswa_filter($nama){

			$this->db->from('tb_kasmasuk');
			$this->db->join('tb_pembayaran', 'tb_kasmasuk.id_pembayaran = tb_pembayaran.id_pembayaran');
			$this->db->where('tb_pembayaran.id_pembayaran', $nama);
			$query=$this->db->get();
			return $query->row();
		}
		
}

?>
