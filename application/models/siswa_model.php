<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Siswa_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert($data) {
			$this->db->insert('tb_datasiswa', $data);

		}

		function tampil_data(){
        return $this->db->get('tb_datasiswa');
    	}

    	function tampil_data2(){
        $query = $this->db->get('tb_datasiswa');

        return $query->result();
    	}

		public function read_siswa(){

			$this->db->from('tb_datasiswa');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_kelas(){

			$this->db->from('tb_kelas');
			$this->db->group_by('kelas');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_jurusan(){

			$this->db->from('tb_jurusan');
			$this->db->group_by('jurusan');
			$query=$this->db->get();
			return $query->result();
		}

		public function jumlah_siswa(){

			$this->db->from('tb_datasiswa');
			return $this->db->count_all_results();
		}

		public function siswa_get_by_id($id)
		{
			$this->db->from('tb_datasiswa');
			$this->db->where('id_siswa',$id);
			$query = $this->db->get();

			return $query->row();
		}

		public function kelas_get_by_id($kelas)
		{
			$this->db->from('tb_kelas');
			$this->db->where('kelas',$kelas);
			$query = $this->db->get();

			return $query->row();
		}

		public function update_siswa($where, $data)
		{
			$this->db->update('tb_datasiswa', $data, $where);
			return $this->db->affected_rows();
		}

		public function hapus($id)
		{
			$this->db->where('id_siswa', $id);
			$this->db->delete('tb_datasiswa');
		}

		public function hapus_pembayaran($id)
		{
			$this->db->where('id_siswa', $id);
			$this->db->delete('tb_pembayaran');
		}
}

?>
