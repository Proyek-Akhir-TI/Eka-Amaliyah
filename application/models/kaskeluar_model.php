<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Kaskeluar_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert_kaskeluar($data_kaskeluar) {
			$this->db->insert('tb_kaskeluar', $data_kaskeluar);

		}

		public function read_kaskeluar(){

			$this->db->select("SUM(total) as jumtot, tanggal_kaskeluar as tgl, kode_pengeluaran as kode");
			$this->db->from('tb_kaskeluar');
			$this->db->group_by('tanggal_kaskeluar');
			$query=$this->db->get();
			return $query->result();
		}

		public function jumlah_kaskeluar(){

			$this->db->select_sum('total');
			$a = $this->db->get('tb_kaskeluar');
			return $a->row();
		}

		public function read_kaskeluar_by_id($id)
		{
			$this->db->from('tb_kaskeluar');
			$this->db->where('tanggal_kaskeluar', $id);
			//$this->db->join('tb_gaji', 'tb_kaskeluar.id_gaji_karyawan = tb_gaji.id_gaji');
			$query = $this->db->get();

			return $query->result();
		}

		public function read_kaskeluar_by_tgl($tgl, $tglakhir)
		{
			$this->db->select("SUM(total) as jumtot, tanggal_kaskeluar as tgl, kode_pengeluaran as kode");
			$this->db->from('tb_kaskeluar');
			$this->db->where('tanggal_kaskeluar >=', $tgl);
			$this->db->where('tanggal_kaskeluar <=', $tglakhir);
			$query = $this->db->get();

			return $query->result();
		}

		public function read_kaskeluar_by_tgl_awal($tgl, $tglakhir)
		{
			$this->db->select("SUM(total) as jumtot, tanggal_kaskeluar as tgl, kode_pengeluaran as kode");
			$this->db->from('tb_kaskeluar');
			$this->db->where('tanggal_kaskeluar >=', $tgl);
			$query = $this->db->get();

			return $query->result();
		}

		public function read_kaskeluar_by_tgl_akhir($tgl, $tglakhir)
		{
			$this->db->select("SUM(total) as jumtot, tanggal_kaskeluar as tgl, kode_pengeluaran as kode");
			$this->db->from('tb_kaskeluar');
			$this->db->where('tanggal_kaskeluar <=', $tglakhir);
			$query = $this->db->get();

			return $query->result();
		}

		
		
}

?>
