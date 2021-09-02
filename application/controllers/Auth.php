<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Travelind | Sign In';
		$this->load->view('Templates/Auth/Header', $data);
		$this->load->view('Auth/Login');
		$this->load->view('Templates/Auth/Footer');
	}

	public function login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$user = $this->db->get_where('t_user', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id_user' => $user['id_user'],
					'fullname' => $user['fullname'],
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				if ($username == 'admin' && $password = password_verify($password, $user['password'])) {
					echo 'post';
				} else {
					echo 'home';
				}
			} else {
				echo 'error';
			}
		} else {
			echo 'error';
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
