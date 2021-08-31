<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Gaji_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert($data) {
			$this->db->insert('tb_gaji', $data);

		}

		public function read_gaji(){

			$this->db->select('*');
			$this->db->group_by('bulan');
			$this->db->from('tb_gaji');
			$query=$this->db->get();
			return $query->result();

		}

		public function get_by_nip($bulan)
		{
			$this->db->from('tb_gaji');
			$this->db->where('bulan', $bulan);
			$query = $this->db->get();

			return $query->result();
		}

		function cari($id){
        $query= $this->db->get_where('tb_karyawan',array('nip'=>$id));
        return $query;
    	}
		
}

?>
