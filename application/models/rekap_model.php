<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Rekap_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert_rekap($rekap_masuk) {
			$this->db->insert('tb_rekapitulasi', $rekap_masuk);

		}

		public function insert_rekap_keluar($rekap_keluar) {
			$this->db->insert('tb_rekapitulasi', $rekap_keluar);

		}

		public function read_rekap()
		{
			//$this->db->sum('jumlah_kasmasuk');
			//$this->db->where('tanggal_pembayaran',$id);
			$this->db->from('tb_rekapitulasi');
			$query = $this->db->get();

			return $query->result();
		}

		public function read_rekapitulasi_by_tgl($tgl, $tglakhir)
		{
			//$this->db->sum('jumlah_kasmasuk');
			
			$this->db->from('tb_rekapitulasi');
			$this->db->where('keterangan >=', $tgl);
			$this->db->where('keterangan <=', $tglakhir);
			$query = $this->db->get();

			return $query->result();
		}

		public function read_rekapitulasi_by_tgl_awal($tgl, $tglakhir)
		{
			//$this->db->sum('jumlah_kasmasuk');
			
			$this->db->from('tb_rekapitulasi');
			$this->db->where('keterangan >=', $tgl);
			$query = $this->db->get();

			return $query->result();
		}

		public function read_rekapitulasi_by_tgl_akhir($tgl, $tglakhir)
		{
			//$this->db->sum('jumlah_kasmasuk');
			
			$this->db->from('tb_rekapitulasi');
			$this->db->where('keterangan <=', $tglakhir);
			$query = $this->db->get();

			return $query->result();
		}

}