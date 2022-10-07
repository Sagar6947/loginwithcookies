<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (sessionId('user_id') != "") {
			redirect("dashboard");
		}
	}
	public function index()
	{

		if (sessionId('user_id') != "") {
			redirect("dashboard");
		} else if (get_cookie('user_id') != "") {

			$this->empAutoLogin();
		}


		$data['title'] = 'Admin login  ';
		$data['projectTitle'] = 'ANGC CRM';
		$this->load->view('admin_login', $data);
	}

	private function empAutoLogin()
	{
		$get = $this->CommonModal->getRowById('tbl_employee', 'admin_id', decryptId(get_cookie('user_id')));


		if ($get) {

			if ($get[0]['web_unique_token'] != get_cookie('web_unique_token')) {
				$hash = date('dm') . round(microtime(true) * 1000);
				$post['web_unique_token'] = $hash;
				$update = $this->CommonModal->updateRowById('tbl_employee', 'admin_id', $get[0]['admin_id'], $post);
			} else {
				$hash = get_cookie('web_unique_token');
			}

			$array = array(
				'user_id' => $get[0]['admin_id'],
				'name' => $get[0]['admin_name'],
				'contact_no' => $get[0]['admin_contact'],
				'email' => $get[0]['admin_email'],
				'user_type' => $get[0]['admin_type']

			);

			set_cookie('web_unique_token', $hash, '3600' * '60' * '60');
			set_cookie('user_id', encryptId($get[0]['admin_id']), '3600' * '60' * '60');
			set_cookie('user_type', $get[0]['admin_type'], '3600' * '60' * '60');
			$this->session->set_userdata($array);

			redirect('dashboard');
		} else {
			delete_cookie('user_id');
			delete_cookie('user_type');
			delete_cookie('web_unique_token');
			redirect(base_url());
		}
	}


	public function validatelogin()
	{

		if (count($_POST) > 0) {
			$hash = date('dm') . round(microtime(true) * 1000);

			$admin_email = $this->input->post('admin_email');
			$admin_password = $this->input->post('admin_password');
			$user_id = $this->CommonModal->getRowById('tbl_employee', 'admin_email', $admin_email);

			if ($user_id) {
				if ($user_id[0]['admin_password'] == $admin_password) {
					$this->session->set_userdata('user_id', $user_id[0]['admin_id']);
					$this->session->set_userdata('user_type', $user_id[0]['admin_type']);

					set_cookie('web_unique_token', $hash, '3600' * '60' * '60');
					set_cookie('user_id', encryptId($user_id[0]['admin_id']), '3600' * '60' * '60');
					set_cookie('user_type', $user_id[0]['admin_type'], '3600' * '60' * '60');

					redirect('dashboard');
				} else {

					flashData('msg', '<div class="alert alert-danger">Invalid Password</div>');
				}
			} else {

				flashData('msg', '<div class="alert alert-danger">Invalid username</div>');
			}
			redirect(base_url());
		} else {

			flashData('msg', '<div class="alert alert-danger">Server Error</div>');
			redirect(base_url());
		}
	}
}

sagar
