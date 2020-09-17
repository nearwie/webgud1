<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model', 'barangm');
		
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		
	}



	public function index ()
	{
		$data['title'] = 'Home Si-GUDANG';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
		
		$this->load->view('user/index', $data);
		
	}

	public function editprofile ()
	{
		$data['title'] = 'My Profile';
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

		// // QUERY NAMA
		// $data['name'] = $this->db->get('user') -> result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		if ($this->form_validation->run() == false ) {
		
		
		$this->load->view('user/profile', $data);
	
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

				
				// cek jk ada gambar
				$upload_image = $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']     = '2048';
					$config['upload_path'] = './assets/img/profile/';

					$this->load->library('upload', $config);
					// $this->load->initialize($config);

					if ($this->upload->do_upload('image')) {
						$old_image = $data['user']['image'];
						if ($old_image != 'default.jpg') {
							unlink(FCPATH. 'assets/img/profile/'. $old_image);
						}
						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
					} else {
						echo $this->upload->display_errors();

					}
				}
			$this->db->set('name', $name);
			$this->db->where('email', $email);

			$this->db->update('user') ;
			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil memperbarui profile</div>');
	 				redirect('profile');

		}
	}


}