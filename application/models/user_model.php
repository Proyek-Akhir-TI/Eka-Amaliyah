<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function daftar($data) {
			$this->db->insert('user', $data);

		}

		public function cek_user($data) {
			$query = $this->db->get_where('tb_user', $data);
			return $query;
		}

		public function read_user(){

			$this->db->from('user');
			$query=$this->db->get();
			return $query->result();
		}


		public function count_cek_jabatan_kepsek()
		{

			$this->db->select('*');
			//$this->db->from('tb_karyawan');
			//$this->db->where('level', '3');
			$this->db->where('jabatan', 'Kepala Sekolah');
			$this->db->group_by('jabatan');

			$query = $this->db->count_all_results('tb_karyawan');

			return $query;
		}

		public function count_cek_jabatan_bendahara()
		{

			$this->db->select('*');
			//$this->db->from('tb_karyawan');
			//$this->db->where('level', '3');
			$this->db->where('jabatan', 'Bendahara');
			$this->db->group_by('jabatan');

			$query = $this->db->count_all_results('tb_karyawan');

			return $query;
		}

		public function get_by_id($id)
		{
			$this->db->from($this->table);
			$this->db->where('id_user',$id);
			$query = $this->db->get();

			return $query->row();
		}

		public function read_user_by()
		{
			$this->db->from('tb_user');
			$this->db->where('level', '2');
			$query = $this->db->get();
			return $query->result();
		}

		public function jumlah_user(){
			$this->db->select_max('id_user');
			$this->db->from('tb_user');
			$query = $this->db->get();

			return $query->row();
		}

		public function tambah_user($data)
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}

		public function tambah_user_via_karyawan($data_user)
		{
			$this->db->insert('tb_user', $data_user);
			return $this->db->insert_id();
		}

		public function delete_by_id($id)
		{
			$this->db->where('id_user', $id);
			$this->db->delete($this->table);
		}
}

?>
