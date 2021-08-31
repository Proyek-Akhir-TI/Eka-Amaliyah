<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Pembayaran_model extends CI_Model {


		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function insert($data) {
			$this->db->insert('tb_pembayaran', $data);

		}

		public function insert_jenis_pembayaran($data) {
			$this->db->insert('jenis_pembayaran', $data);

		}

		public function insert_kasmasuk($data_kasmasuk) {
			$this->db->insert('tb_kasmasuk', $data_kasmasuk);

		}

		public function read_pembayaran(){

			$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			//$this->db->where('tanggal_pembayaran', '3');
			//$this->db->where_in('tanggal_pembayaran', $g);

			$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_j_pembayaran(){

			$this->db->from('jenis_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_j_pembayaran_dana_keg(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'Dana Kegiatan');
			$query=$this->db->get();
			return $query->row();
		}

		public function read_j_pembayaran_psg(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'PSG');
			$query=$this->db->get();
			return $query->row();
		}

		public function read_j_pembayaran_ukk(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'UKK');
			$query=$this->db->get();
			return $query->row();
		}

		public function read_j_pembayaran_dana_uts(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'Ujian UTS');
			$query=$this->db->get();
			return $query->row();
		}

		public function read_j_pembayaran_dana_uas(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'Ujian UAS');
			$query=$this->db->get();
			return $query->row();
		}


		public function read_j_pembayaran_dana_akhir(){

			$this->db->from('jenis_pembayaran');
			$this->db->where('jenis_pembayaran', 'Dana Akhir Kelas 12');
			$query=$this->db->get();
			return $query->row();
		}
		
		public function read_pembayaran_by_nama($nama, $tgl){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			$this->db->where('nama_siswa', $nama);
			//$this->db->where('tanggal_pembayaran', $tgl);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_pembayaran_by_tgl($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			//$this->db->where('nama_siswa', $nama);
			$this->db->where('tanggal_pembayaran >=', $tgl);
			$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_pembayaran_by_tgl_awal($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			//$this->db->where('nama_siswa', $nama);
			$this->db->where('tanggal_pembayaran >=', $tgl);
			//$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_pembayaran_by_tgl_akhir($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			//$this->db->where('nama_siswa', $nama);
			$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function update_jenis_pembayaran($where, $data)
		{
			$this->db->update('jenis_pembayaran', $data, $where);
			return $this->db->affected_rows();
		}
		
		public function read_pembayaran_by_all($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			$this->db->where('nama_siswa', $nama);
			$this->db->where('tanggal_pembayaran >=', $tgl);
			$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_pembayaran_by_nama_awal($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			$this->db->where('nama_siswa', $nama);
			$this->db->where('tanggal_pembayaran >=', $tgl);
			//$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function read_pembayaran_by_nama_akhir($nama, $tgl, $tglakhir){

			//$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn");
			$this->db->from('tb_pembayaran');
			$this->db->where('nama_siswa', $nama);
			//$this->db->where('tanggal_pembayaran >=', $tgl);
			$this->db->where('tanggal_pembayaran <=', $tglakhir);
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_pembayaran_all(){

			$this->db->from('tb_pembayaran');
			$this->db->group_by('nama_siswa');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function read_data_pembayaran(){

			$this->db->from('tb_pembayaran');
			//$this->db->group_by('nama_siswa');
			$query=$this->db->get();
			return $query->result();
		}

		public function tampil_data_jurusan(){

			$this->db->from('tb_kelas');
			$query=$this->db->get();
			return $query->result();
		}

		public function kelas_by_id($jurusan){
		$this->db->where('jurusan', $jurusan);
		$result = $this->db->get('tb_kelas')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
		}

		public function siswa_by_id($jurusan){
		$this->db->where('jurusan', $jurusan);
		$result = $this->db->get('tb_datasiswa')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
		}

		public function get_by_tgl($tgl){
		$this->db->where('tanggal_pembayaran', $tgl);
		$result = $this->db->get('tb_pembayaran')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
		}

		public function get_by_idsiswa_all($idsiswa){
		$this->db->where('id_siswa', $idsiswa);
		$result = $this->db->get('tb_pembayaran')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		return $result; 
		}

		public function get_by_idsiswa($idsiswa, $smstr){

		$this->db->select("SUM(jumlah) as jumtot, tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn, keterangan as ket");
			$this->db->from('tb_pembayaran');
			$this->db->where('id_siswa', $idsiswa);
			$this->db->where('semester', $smstr);
			//$this->db->where('tanggal_pembayaran', '3');
			//$this->db->where_in('tanggal_pembayaran', $g);

			$this->db->group_by('nisn');
			$query=$this->db->get();
			return $query->result();
		}

		public function get_jenis_pembayaran($id){

		$this->db->from('jenis_pembayaran');
		$this->db->where('id_jenis_pembayaran', $id);
			$query=$this->db->get();
			return $query->row();
		}

		public function get_by_idsiswa_nogroup($idsiswa, $smstr){

		$this->db->select("tanggal_pembayaran as tgl, id_siswa as idsis, nama_siswa as namasiswa, nisn as nisn, keterangan as ket, jumlah as jum");
			$this->db->from('tb_pembayaran');
			$this->db->where('id_siswa', $idsiswa);
			$this->db->where('semester', $smstr);
			//$this->db->where('tanggal_pembayaran', '3');
			//$this->db->where_in('tanggal_pembayaran', $g);

			//$this->db->group_by('tanggal_pembayaran');
			$query=$this->db->get();
			return $query->result();
		}

		public function get_by_idsiswa_status($idsiswa, $smstr){

		//$this->db->select("tanggal_pembayaran as tgl, nama_siswa as namasiswa, nisn as nisn, keterangan as ket, jumlah as jum");
			$this->db->from('tb_pembayaran');
			$this->db->where('id_siswa', $idsiswa);
			$this->db->where('semester', $smstr);
			$query = $this->db->get();
			return $query->row();

		}

		public function hapus_jenis_pembayaran($id)
		{
			$this->db->where('id_jenis_pembayaran', $id);
			$this->db->delete('jenis_pembayaran');
		}

		//untuk autocomplete
		function cari($id){
        $query= $this->db->get_where('tb_datasiswa',array('id_siswa'=>$id));
        return $query;
    	}

		
}

?>
