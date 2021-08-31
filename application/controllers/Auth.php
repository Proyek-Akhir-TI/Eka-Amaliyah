<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model'); //call model
		$this->load->library(array('form_validation','upload','session'));
        $this->load->helper(array('url','form'));
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Tidak Boleh Kosong'));

		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Tidak Boleh Kosong'));

		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('data', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon Periksa Kembali Username Dan Password Anda.</strong>
                            </div>');
			$this->load->view('login');
		}


		if ($this->form_validation->run() == TRUE)
		{

		$data = array('username' => $this->input->post('username'),
					'password' => (md5($this->input->post('password')))
			);
		$hasil = $this->user_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')==1) {
				//redirect('dashboard1?distributor=all');
				redirect('Bendahara/');
			}

			elseif ($this->session->userdata('level')==2) {


				redirect('Kepsek/');
			}


		}
		else {

			$this->session->set_flashdata('data', '<div class="alert alert-danger" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                <strong>Mohon periksa kembali username dan password anda.</strong>
                            </div>');
			$this->load->view('login');
			//echo "<script>alert('Mohon cek kembali username dan password anda');history.go(-1);</script>";
		}

			}

                //redirect('dashboard1');
	}

    public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('Auth');
	}
}
