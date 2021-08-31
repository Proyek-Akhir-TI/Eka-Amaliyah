<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Karyawan_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function read_karyawan(){

			$this->db->from('tb_karyawan');
			$query = $this->db->get();
			return $query->result();
		}
		
		public function read_kelas(){

			$this->db->from('tb_kelas');
			$query = $this->db->get();
			return $query->result();
		}
		
		public function read_jurusan(){

			$this->db->from('tb_jurusan');
			$query = $this->db->get();
			return $query->result();
		}

		function tampil_data(){
        return $this->db->get('tb_karyawan');
    	}

		public function get_by_id($id)
		{
			$this->db->from('tb_karyawan');
			$this->db->where('id_karyawan',$id);
			$query = $this->db->get();

			return $query->row();
		}
		
		public function get_kelas_by_id($id)
		{
			$this->db->from('tb_kelas');
			$this->db->where('id_kelas',$id);
			$query = $this->db->get();

			return $query->row();
		}
		
		public function get_jurusan_by_id($id)
		{
			$this->db->from('tb_jurusan');
			$this->db->where('id_jurusan',$id);
			$query = $this->db->get();

			return $query->row();
		}
		
		public function count_cek_jurusan()
		{

			//$this->db->select('*');
			//$this->db->from('tb_jurusan');
			//$this->db->where('level', '3');

			$query = $this->db->count_all_results('tb_jurusan');

			return $query;
		}

		public function jumlah_karyawan(){

			$this->db->from('tb_karyawan');
			return $this->db->count_all_results();
		}


		public function tambah_karyawan($data)
		{
			$this->db->insert('tb_karyawan', $data);
			return $this->db->insert_id();
		}
		
		public function insert_kelas($data)
		{
			$this->db->insert('tb_kelas', $data);
			return $this->db->insert_id();
		}
		
		public function insert_jurusan($data)
		{
			$this->db->insert('tb_jurusan', $data);
			return $this->db->insert_id();
		}

		public function update_karyawan($where, $data)
		{
			$this->db->update('tb_karyawan', $data, $where);
			return $this->db->affected_rows();
		}
		
		public function update_kelas($where, $data)
		{
			$this->db->update('tb_kelas', $data, $where);
			return $this->db->affected_rows();
		}
		
		public function update_jurusan($where, $data)
		{
			$this->db->update('tb_jurusan', $data, $where);
			return $this->db->affected_rows();
		}

		public function hapus($id)
		{
			$this->db->where('id_karyawan', $id);
			$this->db->delete('tb_karyawan');
		}
		
		public function hapus_kelas($id)
		{
			$this->db->where('id_kelas', $id);
			$this->db->delete('tb_kelas');
		}
		
		public function hapus_jurusan($id)
		{
			$this->db->where('id_jurusan', $id);
			$this->db->delete('tb_jurusan');
		}

		public function hapus_user_via_karyawan($id_user)
		{
			$this->db->where('id_user', $id_user);
			$this->db->delete('tb_user');
		}
}

?>
