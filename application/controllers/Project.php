<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_session')->logged_in) {
			redirect(BASE_URL . 'auth/login');
		}
	} //end function

	public function index()
	{
		$data['page_title'] = "Projects";
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['projects'] = $this->project_model->projects();
		} elseif ($this->session->userdata('user_session')->role_id == 2) {
			// get the project for which client has access only
			$data['projects'] = $this->project_model->project_detail();
		}
		$this->load->view('admin_dashboard/projects/all_projects', $data);
	}

	//add project
	public function add_project()
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Add Project";
			$data['status'] = $this->project_model->get_status();
			$this->load->view('admin_dashboard/projects/add_project', $data);
		} else {
			redirect(BASE_URL . 'dashboard');
		}
	}

	// save project

	public function save_project()
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Add Project";
			$this->form_validation->set_rules('name', 'Project Name', 'required');
			$this->form_validation->set_rules('status', 'Project Status', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin_dashboard/projects/add_project', $data);
			} else {
				$project = array(
					"project_name" => trim(html_escape($this->input->post('name', TRUE))),
					"status_id" => trim(html_escape($this->input->post('status', TRUE))),
				);

				// dd(gettype((int)$product['price']));
				if ($this->project_model->save($project)) {
					$this->session->set_flashdata('success', "Project added successfully.");
					return redirect(BASE_URL . "project");
				}
			}
		} else {
			return redirect(BASE_URL . "dashboard");
		}
	}

	// edit project
	public function edit_project($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Edit Project";
			$data['project'] = $this->project_model->edit($id);
			$data['status'] = $this->project_model->get_status();
			if ($data['project'] == false) {
				$this->session->set_flashdata('e404', "Nothing found");
				return redirect(BASE_URL . 'project');
			} else {
				$this->load->view("admin_dashboard/projects/edit_project", $data);
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// update project
	public function update($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$this->form_validation->set_rules('name', 'Project Name', 'required');
			$this->form_validation->set_rules('status', 'Project Status', 'required');

			if ($this->form_validation->run() == FALSE) {
				$errors['errors'] = validation_errors();
				$this->session->set_flashdata($errors);
				return redirect(BASE_URL . 'project/edit_project/' . $id);
			} else {
				$project = array(
					"project_name" => trim(html_escape($this->input->post('name', TRUE))),
					"status_id" => trim(html_escape($this->input->post('status', TRUE))),
				);

				if ($this->project_model->update($id, $project)) {
					$this->session->set_flashdata('success', "Project updated successfully.");
					return redirect(BASE_URL . "project");
				}
			}
		} else {
			return redirect(BASE_URL . "dashboard");
		}
	}

	// delete project
	public function delete($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['product'] = $this->project_model->delete($id);
			if ($data['product'] == false) {
				$this->session->set_flashdata('delete', "Project delete error ");
				return redirect(BASE_URL . 'project');
			} else {
				$this->session->set_flashdata('delete', "Project deleted successfully ");
				return redirect(BASE_URL . 'project');
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}

	// add client in project
	public function add_client()
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Add Client";
			$data['projects'] = $this->project_model->projects();
			$data['users'] = $this->auth_model->clients();
			$this->load->view("admin_dashboard/projects/add_client", $data);
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}
	// save client project in permissions table
	public function save_client()
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Save Project";
			$this->form_validation->set_rules('project', 'Project', 'required');
			$this->form_validation->set_rules('user', 'User', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				return redirect(BASE_URL . 'project/add_client');
			} else {
				$client_project = array(
					"project_id" => trim(html_escape($this->input->post('project', TRUE))),
					"user_id" => trim(html_escape($this->input->post('user', TRUE))),
				);

				if ($this->project_model->save_client($client_project)) {
					$this->session->set_flashdata('success', "Client added successfully.");
					return redirect(BASE_URL . "project");
				}
			}
		} else {
			return redirect(BASE_URL . "dashboard");
		}
	}
	// view clients with their permission in projects
	public function client_permissions($user_id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['page_title'] = "Project Permissions";
			$data['permissions'] = $this->project_model->permissions($user_id);
			$this->load->view("admin_dashboard/projects/client_permission", $data);
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}
	// delete project permission for client
	public function delete_permission($id)
	{
		if ($this->session->userdata('user_session')->role_id == 1) {
			$data['permission'] = $this->project_model->delete_permission($id);
			if ($data['permission'] == false) {
				$this->session->set_flashdata('delete', "Permission delete error ");
				return redirect(BASE_URL . 'auth/users');
			} else {
				$this->session->set_flashdata('success', "Permission deleted successfully ");
				return redirect(BASE_URL . 'auth/users');
			}
		} else {
			return redirect(BASE_URL . 'dashboard');
		}
	}
}
