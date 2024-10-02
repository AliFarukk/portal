<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
	} //end function

	/**
	 * login
	 *
	 * @return void
	 */
	public function login()
	{
		// if already logged in
		if (@$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'dashboard');
		}
		//end

		$data['page_title'] = "Portal | Login";

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['auth_errors'] = validation_errors();
			$this->load->view('auth/index', $data);
		} else {
			$email = trim(html_escape($this->input->post('email')));
			$password = trim(html_escape(md5($this->input->post('password'))));
			$response = $this->auth_model->login($email, $password);
			if ($response) {
				$response->logged_in = true;
				$this->session->set_userdata('user_session', $response);

				redirect(BASE_URL . 'dashboard');
			} else {
				$this->session->set_flashdata('login_failed', 'Please login with correct email & password');
				redirect(BASE_URL . 'auth/login');
			}
		}
	}
	//function end

	/**
	 * logout
	 *
	 * @return void
	 */
	public function logout()
	{
		unset($_SESSION['user_session']);
		redirect(BASE_URL . 'auth/login');
	} //function end
	// all users
	public function users()
	{
		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = 'All users';
			$data['users'] = $this->auth_model->users();
			$this->load->view('admin_dashboard/auth/all_users', $data);
		} else {
			redirect(BASE_URL . 'dashboard');
		}
	}

	// add user
	public function add_user()
	{
		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = 'Add user';
			$data['roles'] = $this->auth_model->get_roles();
			$this->load->view('admin_dashboard/auth/add_user', $data);
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}
	// save user
	public function save_user()
	{
		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
		if ($this->session->userdata('user_session')->role_id == 1) {

			$role = trim(html_escape($this->input->post('role', TRUE)));
			$name = trim(html_escape($this->input->post('name', TRUE)));
			$email = trim(html_escape($this->input->post('email', TRUE)));
			$password = trim(html_escape($this->input->post('password', TRUE)));
			$confrim_password = trim(html_escape($this->input->post('confirm_password', TRUE)));

			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				$errors['errors'] = validation_errors();
				$this->session->set_flashdata($errors);
				return redirect(BASE_URL . 'auth/add_user');
			} else if ($password !== $confrim_password) {
				$this->session->set_flashdata('password', "Password and Confirm Password do not match.");
				return redirect(BASE_URL . 'auth/add_user');
			} else if ($this->auth_model->email_exist($email)) {
				$this->session->set_flashdata('email', "Email already exists.");
				return redirect(BASE_URL . 'auth/add_user');
			} else {
				$user = array(
					"role_id" => $role,
					"name" => $name,
					"email" => $email,
					"password" => md5($password)
				);


				if ($this->auth_model->save($user)) {
					$this->session->set_flashdata('success', "User added successfully.");
					return redirect(BASE_URL . "auth/users");
				} else {
					$this->session->set_flashdata('errors', "Something went wrong. Please try agin.");
					return redirect(BASE_URL . 'auth/add_user');
				}
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// delete user
	public function delete($id)
	{

		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['user'] = $this->auth_model->delete($id);
			if ($data['user'] == false) {
				$this->session->set_flashdata('e404', "User delete error ");
				return redirect(BASE_URL . 'auth/users');
			} else {
				$this->session->set_flashdata('delete', "User deleted successfully ");
				return redirect(BASE_URL . 'auth/users');
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// logged user edit profile
	public function edit_profile()
	{
		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}

		$data['page_title'] = "Account";
		$data['user'] = $this->auth_model->logged_user();
		$this->load->view('admin_dashboard/auth/edit_profile', $data);
	}
	// update logged user profile
	public function update_profile()
	{
		// if user not logged in
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
		
		$name = trim(html_escape($this->input->post('name', TRUE)));
		$email = trim(html_escape($this->input->post('email', TRUE)));
		$password = trim(html_escape($this->input->post('password', TRUE)));
		$confrim_password = trim(html_escape($this->input->post('confirm_password', TRUE)));

		if (($password == null) && ($confrim_password == null)) {
			if(($this->auth_model->email_exist($email)) && ($this->session->userdata('user_session')->email != $email)){
				$this->session->set_flashdata('email_exist', "Email already exists.");
				return redirect(BASE_URL . 'auth/edit_profile');
			}else{
				$user = array(
					'name' => $name,
					'email' => $email
				);
				if ($this->auth_model->update_user($user)) {
					$this->session->set_flashdata('success', "Profile updated successfully.");
					return redirect(BASE_URL . 'auth/edit_profile');
				}
			}
			
		} elseif (($password != null) && ($confrim_password != null)) {
			if ($password == $confrim_password) {
				$user = array(
					'name' => $name,
					'email' => $email,
					'password' => md5($password)
				);
				if ($this->auth_model->update_user($user)) {
					$this->session->set_flashdata('success', "Profile updated successfully.");
					return redirect(BASE_URL . 'auth/edit_profile');
				}
			} else {
				$this->session->set_flashdata('password', "Password and confirm password dont match.");
				return redirect(BASE_URL . 'auth/edit_profile');
			}
		} elseif ((($password != null) && ($confrim_password == null)) || (($password == null) && ($confrim_password != null))) {
			$this->session->set_flashdata('password', "Password and confirm password both required.");
			return redirect(BASE_URL . 'auth/edit_profile');
		}
	}
}
